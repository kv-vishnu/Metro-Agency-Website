<?php class Gallery extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		//$this->load->model('admin/Brand_Associates_model');
	}

    public function save()
    {

        // Handle Image Upload
        if (!empty($_FILES['galleryImage']['name'])) 
        {
            $config['upload_path'] = './uploads/gallery/';
            $config['allowed_types'] = 'webp|avif|svg';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('galleryImage')) {
                echo json_encode([
                    'status' => 'error',
                    'errors' => ['galleryImage' => $this->upload->display_errors('', '')]
                ]);
                return;
            }

            $upload_data = $this->upload->data();
            $image_name = $upload_data['file_name'];
        } 
        else 
        {
            echo json_encode([
                'status' => 'error',
                'errors' => ['galleryImage' => 'Gallery image is required.']
            ]);
            return;
        }

        // Prepare insert
        $data = [
            'image' => $image_name,
            'img_alt' => $this->input->post('alt', TRUE)
        ];

        $insert = $this->db->insert('gallery', $data);
        echo json_encode(['status' => 'success', 'message' => 'Galley Image added successfully.']);
    }

    public function update()
    {
        $edit_id   = $this->input->post('edit_id', TRUE);
        $old_image = $this->input->post('old_image_gallery', TRUE); // old image name
        $image_name = $old_image; // default

        // Handle Image Upload
        if (!empty($_FILES['galleryImage_update']['name'])) 
        {
            $config['upload_path']   = './uploads/gallery/';
            $config['allowed_types'] = 'webp|avif|svg';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = FALSE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('galleryImage_update')) {
                echo json_encode([
                    'status' => 'error',
                    'errors' => ['galleryImage_update' => $this->upload->display_errors('', '')]
                ]);
                return;
            }

            $upload_data = $this->upload->data();
            $image_name  = $upload_data['file_name'];

            // ✅ Delete old image only if new one is uploaded
            if (!empty($old_image)) {
                delete_old_image('./uploads/gallery/', $old_image);
            }
        }

        // Prepare data
        $data = [
            'image'   => $image_name,
            'img_alt' => $this->input->post('alt', TRUE)
        ];

        // Ensure only 1 row is updated
        $this->db->where('id', $edit_id);
        $updated = $this->db->update('gallery', $data);

        if ($updated) {
            echo json_encode(['status' => 'success', 'message' => 'Gallery updated successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Update failed.']);
        }
}




    public function delete() 
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->db->where('id', $id);
            $this->db->delete('gallery');
            echo json_encode(['status' => 'success','message' => 'Gallery Deleted successfully.']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }


    private function _resize_gd_width($source_path, $dest_path, $target_width)
    {
        list($width, $height, $type) = getimagesize($source_path);
        $ratio = $height / $width;
        $target_height = $target_width * $ratio;

        switch ($type) {
            case IMAGETYPE_JPEG:
                $src = imagecreatefromjpeg($source_path);
                break;
            case IMAGETYPE_PNG:
                $src = imagecreatefrompng($source_path);
                break;
            case IMAGETYPE_GIF:
                $src = imagecreatefromgif($source_path);
                break;
            default:
                return false;
        }

        $dst = imagecreatetruecolor($target_width, $target_height);

        // Preserve transparency for PNG and GIF
        if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
            imagecolortransparent($dst, imagecolorallocatealpha($dst, 0, 0, 0, 127));
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
        }

        imagecopyresampled($dst, $src, 0, 0, 0, 0, $target_width, $target_height, $width, $height);

        switch ($type) {
            case IMAGETYPE_JPEG:
                imagejpeg($dst, $dest_path, 90);
                break;
            case IMAGETYPE_PNG:
                imagepng($dst, $dest_path);
                break;
            case IMAGETYPE_GIF:
                imagegif($dst, $dest_path);
                break;
        }

        imagedestroy($src);
        imagedestroy($dst);
    }
   private function _resize_gd_width_height($source_path, $target_path, $max_width, $max_height)
{
    list($orig_width, $orig_height, $image_type) = getimagesize($source_path);

    // Calculate new dimensions while preserving aspect ratio
    $ratio = $orig_width / $orig_height;

    if ($max_width / $max_height > $ratio) {
        $new_height = $max_height;
        $new_width = $max_height * $ratio;
    } else {
        $new_width = $max_width;
        $new_height = $max_width / $ratio;
    }

    // Cast dimensions to integers once
    $new_width = (int)round($new_width);
    $new_height = (int)round($new_height);

    // Create a new true color image
    $new_image = imagecreatetruecolor($new_width, $new_height);

    // Create image from source
    switch ($image_type) {
        case IMAGETYPE_JPEG:
            $source_image = imagecreatefromjpeg($source_path);
            break;
        case IMAGETYPE_PNG:
            $source_image = imagecreatefrompng($source_path);
            imagealphablending($new_image, false);
            imagesavealpha($new_image, true);
            break;
        case IMAGETYPE_GIF:
            $source_image = imagecreatefromgif($source_path);
            break;
        default:
            return false;
    }

    // Resize
    imagecopyresampled($new_image, $source_image, 0, 0, 0, 0, 
        $new_width, $new_height, $orig_width, $orig_height);

    // Save resized image
    switch ($image_type) {
        case IMAGETYPE_JPEG:
            imagejpeg($new_image, $target_path, 90);
            break;
        case IMAGETYPE_PNG:
            imagepng($new_image, $target_path);
            break;
        case IMAGETYPE_GIF:
            imagegif($new_image, $target_path);
            break;
    }

    // Cleanup
    imagedestroy($source_image);
    imagedestroy($new_image);

    return true;
}

}

?>
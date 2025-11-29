<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('delete_old_image')) {
    function delete_old_image($upload_path, $old_image)
    {
        if (!empty($old_image)) {
            $file_path = FCPATH . $upload_path . $old_image;
            if (file_exists($file_path)) {
                unlink($file_path);
                return true;
            }
        }
        return false;
    }
}

<?php
class PageBuilder_model extends CI_Model {

    public function getAllPages()
    {
        // $this->db->where('is_active', 0);
        return $this->db->get('pages')->result_array();
    }


    public function getAllPagesList() {
        $this->db->where('is_active', 0);
        return $this->db->get('pages')->result_array();
    }

        public function getCareersList() {
        $this->db->where('is_active', 0);
        return $this->db->get('tbl_career')->result_array();
    }


   


    public function getAboutuscontent($id)
    {
        return $this->db->where('page_id', $id)->get('pages')->result_array();
    }

        public function getCareerscontent($id)
    {
        return $this->db->where('page_id', $id)->get('pages')->result_array();
    }

   public function getContactcontent($id)
    {
        return $this->db->where('page_id', $id)->get('pages')->result_array();
    }

      public function getManfacturingcontent($id)
    {
        return $this->db->where('page_id', $id)->get('pages')->result_array();
    }

    public function getInfrastructurecontent($id)
    {
        return $this->db->where('page_id', $id)->get('pages')->result_array();
    }

       public function getAboutcontent($id)
    {
        return $this->db->where('page_id', $id)->get('pages')->result_array();
    }

    public function getProductcontent($id)
    {
        return $this->db->where('page_id', $id)->get('pages')->result_array();
    }


    public function getSlugById($table, $id)
    {
        $this->db->select('slug');
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        $result = $query->row_array();

        return $result ? $result['slug'] : '';
    }


    public function getGallery($limit = null) {
        $this->db->select('*');
        $this->db->from('gallery');
        if ($limit !== null) {
            $this->db->limit($limit,0);
        }
        return $this->db->get()->result_array();
    }
 


   
   
    
    public function getCategory() {
        return $this->db->get('product_category')->result_array();
    }

        public function getInfrastructure() {
        return $this->db->get('tbl_infrastructure')->result_array();
    }

    public function getCareers() {
        return $this->db->get('tbl_career')->result_array();
    }

        public function getManagement() {
        return $this->db->get('tbl_management')->result_array();
    }

        public function getManagementList() {
        $this->db->where('is_active', 0);
        return $this->db->get('tbl_management')->result_array();
    }

    public function getProduct() {
        return $this->db->get('tbl_product')->result_array();
    }

        public function getCategoryList() {
        $this->db->where('is_active', 0);
        return $this->db->get('product_category')->result_array();
    }

        public function getProductList() {
        $this->db->where('is_active', 0);
        return $this->db->get('tbl_product')->result_array();
    }
    public function getSlider() {
        return $this->db->get('tbl_slider')->result_array();
    }

    public function getRecruitment() {
        return $this->db->get('tbl_recruitment')->result_array();
    }

    public function getSliderList() {
        $this->db->where('is_active', 0);
        return $this->db->get('tbl_slider')->result_array();
    }

    public function getSettings() {
        return $this->db->get('tbl_settings')->result_array();
    }

    public function getContactus() {
        return $this->db->get('contact_us')->result_array();
    }


    public function getActiveCertifications() {
        return $this->db->where('is_active', 1)->order_by('order', 'ASC')->get('product_category')->result_array();
    }






 
    public function getWidgets()
    {
        return $this->db->get('widgets')->result_array();
    }

    public function getAllUpcomingBatches() {
        return $this->db->get('tbl_batches')->result_array();
    }


    public function getPage($page_id)
    {
        return $this->db->where('page_id', $page_id)->get('pages')->row_array();
    }


  




  
  
    public function getCategoryDetails($category_id)
    {
        return $this->db->where('id', $category_id)->get('product_category')->row_array();
    }

        public function getInfrastructureDetails($id)
    {
        return $this->db->where('id', $id)->get('tbl_infrastructure')->row_array();
    }




     public function getManagementDetails($id)
    {
        return $this->db->where('id', $id)->get('tbl_management')->row_array();
    }


     public function getCareersDetails($id)
    {
        return $this->db->where('id', $id)->get('tbl_career')->row_array();
    }


        public function getProductDetails($id)
    {
        return $this->db->where('id', $id)->get('tbl_product')->row_array();
    }


            public function getProductDetailsList($id)
    {
        return $this->db->where('id', $id)->get('tbl_product')->result_array();
    }





    public function getProductIdBySlug($slug)
{
    $this->db->select('id');
    $this->db->from('tbl_product');
    $this->db->where('slug', $slug);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row()->id;  // return only the ID
    } else {
        return false; // or null
    }
}

        public function getSettingsDetails($id)
    {
        return $this->db->where('id', $id)->get('tbl_settings')->row_array();
    }

    public function getSliderDetails($certificate_id)
    {
        return $this->db->where('id', $certificate_id)->get('tbl_slider')->row_array();
    }


 



   
    public function getCommonContents($table, $field , $where, $id)
    {
        $this->db->select($field);
        $this->db->from($table);
        $this->db->where($where, $id);
        $query = $this->db->get();
        return $query->result_array();
    }

 
   

    public function check_slug_exists($slug)
    {
        // Check in category table

        $pages = $this->db->get_where('pages', ['slug' => $slug])->row();
        if ($pages) {
            return ['table' => 'pages','type' => 'page', 'data' => $pages];
        }

       

        // Not found in either
        return false;
    }


 
  

    // MENUS
    public function getMenuItems($menuID)
    {
        $menuItems = $this->db
        ->where('parent_id', 0)
        ->order_by('sort_order', 'ASC')
        ->get('pages')
        ->result_array();
        return $menuItems;
    }




 









public function get_counts()
{
    $data = [];
    $data['pages']         = $this->db->count_all('pages');
    $data['categories']    = $this->db->count_all('product_category');
    $data['product'] = $this->db->count_all('tbl_product');
    $data['contactus']       = $this->db->count_all('contact_us');

    return $data;
}


public function updateCategoryStatus($id, $is_active)
{
    $this->db->where('id', $id);
    return $this->db->update('product_category', ['is_active' => $is_active]);
}

public function updateInfrastructureStatus($id, $is_active)
{
    $this->db->where('id', $id);
    return $this->db->update('tbl_infrastructure', ['is_active' => $is_active]);
}


    public function search_category($search_term) {
        $this->db->like('category_title', $search_term);
        return $this->db->get('product_category')->result_array();
    }

    public function update_recruitment_status($status) {
        $this->db->like('status', $status);
        return $this->db->get('tbl_recruitment')->result_array();
    }

    public function update_contact_status($status) {
        $this->db->like('status', $status);
        return $this->db->get('contact_us')->result_array();
    }


public function updateCareerStatus($id, $is_active)
{
    $this->db->where('id', $id);
    return $this->db->update('tbl_career', ['is_active' => $is_active]);
}

public function updateManagementStatus($id, $is_active)
{
    $this->db->where('id', $id);
    return $this->db->update('tbl_management', ['is_active' => $is_active]);
}



public function updatePageStatus($id, $is_active)
{
    $this->db->where('page_id', $id);
    return $this->db->update('pages', ['is_active' => $is_active]);
}

public function updateSliderStatus($id, $is_active)
{
    $this->db->where('id', $id);
    return $this->db->update('tbl_slider', ['is_active' => $is_active]);
}




//search
public function searchPages($term)
{
    return $this->db->like('title', $term)->get('pages')->result_array();
}
public function searchCertifications($term)
{
    return $this->db->like('name', $term)->get('certification-training')->result_array();
}







public function getPagedetails($id)
{
    return $this->db->where('page_id', $id)->get('pages')->row_array();
}

public function getPageContents($tablename)
{
    return $this->db->get($tablename)->row_array();
}






}
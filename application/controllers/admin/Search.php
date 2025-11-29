<?php class Search extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/PageBuilder_model');
        $this->load->model('admin/Enquiry_model');
        $this->load->model('admin/Location_courses_model');
	}
    public function index()
    {
        $search_term = $this->input->post('search_term');
        $search_type = $this->input->post('search_type');

        // echo $search_type;echo $search_term;exit;

        $data['pages'] = $this->PageBuilder_model->searchPages($search_term);
        $data['categories'] = $this->PageBuilder_model->searchCertifications($search_term);
        $data['subcategories'] = $this->PageBuilder_model->searchSubcategories($search_term);
        $data['subsubcategories'] = $this->PageBuilder_model->searchSubSubcategories($search_term);
        //print_r($data['subsubcategories']);exit;
        $data['courses'] = $this->PageBuilder_model->searchCourses($search_term);
        if($search_type == 'page')
        {
            $this->load->view('admin/template/header');
            $this->load->view('admin/pages/list', $data);
            $this->load->view('admin/template/footer');
        }
        if($search_type == 'category')
        {
            $this->load->view('admin/template/header');
            $this->load->view('admin/categories/list', $data);
            $this->load->view('admin/template/footer');
        }
        if($search_type == 'course')
        {
            $this->load->view('admin/template/header');
            $this->load->view('admin/courses/list', $data);
            $this->load->view('admin/template/footer');
        }
        if($search_type == 'subcategory')
        {
            $this->load->view('admin/template/header');
            $this->load->view('admin/subcategories/list', $data);
            $this->load->view('admin/template/footer');
        }
        // if($search_type == 'subsubcategory')
        // {
        //     $this->load->view('admin/template/header');
        //     $this->load->view('admin/sub_subcategories/list', $data);
        //     $this->load->view('admin/template/footer');
        // }
    }

    public function search_category(){
        $search_term = $this->input->post('search_term');
        $data['categories'] = $this->PageBuilder_model->search_category($search_term);
        $this->load->view('admin/template/header');
        $this->load->view('admin/categories/list',$data);
        $this->load->view('admin/template/footer');
    }
    public function search_enquiry()
    {
            $search_term = $this->input->post('enquiryDate');//echo $search_term;exit;
            $data['enquiries'] = $this->Enquiry_model->search_enquiries($search_term);
            $this->load->view('admin/template/header');
            $this->load->view('admin/enquiry/list', $data);
            $this->load->view('admin/template/footer');
    }

    public function location_search()
    {
            $location = $this->input->post('location');
            $certification = $this->input->post('certification');
            $data['locations'] = $this->Location_courses_model->list_locations();
            $data['courses'] = $this->Location_courses_model->search_location_courses($location, $certification);
            $data['certifications'] = $this->PageBuilder_model->getActiveCertifications();
            $this->load->view('admin/template/header');
            $this->load->view('admin/courses/location_courses', $data); 
            $this->load->view('admin/template/footer');
    }

}
?>
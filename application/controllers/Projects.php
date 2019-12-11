<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('projects_model');
    $this->load->helper('url_helper');
  }

	public function index()
	{
    $data['projects'] = $this->projects_model->get_project();
		$this->load->view("templates/header");
		$this->load->view("master/project/index", $data);
		$this->load->view("templates/footer");
	}

  public function view($id = null)
	{
    $data['project_detail'] = $this->projects_model->get_project($id);
		$this->load->view("templates/header");
		$this->load->view("master/project/detail", $data);
		$this->load->view("templates/footer");
	}

  public function add()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('custproject', 'Cust project', 'required|is_unique[tbl_project.custproject]');
    $this->form_validation->set_rules('custname', 'Cust name', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');
    $this->form_validation->set_rules('province', 'Province', 'required');
    $this->form_validation->set_rules('city', 'City name', 'required');
    $this->form_validation->set_rules('district', 'District', 'required');
    $this->form_validation->set_rules('country', 'Country name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('phone', 'project name', 'required');
    $this->form_validation->set_rules('contactperson', 'Contact person', 'required');

    $data = array(
      'custproject' => $this->input->post('custproject'),
      'custname' => $this->input->post('custname'),
      'address' => $this->input->post('address'),
      'province' => $this->input->post('province'),
      'city' => $this->input->post('city'),
      'district' => $this->input->post('district'),
      'subdistrict' => $this->input->post('subdistrict'),
      'country' => $this->input->post('country'),
      'postalcode' => $this->input->post('postalcode'),
      'email' => $this->input->post('email'),
      'phone' => $this->input->post('phone'),
      'contactperson' => $this->input->post('contactperson')
    );

    if ($this->form_validation->run() === FALSE) {
      $this->load->view("templates/header");
  		$this->load->view("master/project/add", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->projects_model->set_projects();
      redirect('projects');
    }

  }

  public function update($id)
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('custname', 'Cust name', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');
    $this->form_validation->set_rules('province', 'Province', 'required');
    $this->form_validation->set_rules('city', 'City name', 'required');
    $this->form_validation->set_rules('district', 'District', 'required');
    $this->form_validation->set_rules('country', 'Country name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('phone', 'project name', 'required');
    $this->form_validation->set_rules('contactperson', 'Contact person', 'required');

    $data['set_val'] = array(
      'custproject' => $this->input->post('custproject'),
      'custname' => $this->input->post('custname'),
      'address' => $this->input->post('address'),
      'province' => $this->input->post('province'),
      'city' => $this->input->post('city'),
      'district' => $this->input->post('district'),
      'subdistrict' => $this->input->post('subdistrict'),
      'country' => $this->input->post('country'),
      'postalcode' => $this->input->post('postalcode'),
      'email' => $this->input->post('email'),
      'phone' => $this->input->post('phone'),
      'contactperson' => $this->input->post('contactperson')
    );

    if ($this->form_validation->run() === FALSE) {
      $data['projects'] =$this->projects_model->get_project($id);
      $this->load->view("templates/header");
  		$this->load->view("master/project/update", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->projects_model->update_projects($id);
      redirect('projects');
    }

  }


}

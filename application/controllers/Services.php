<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('authenticated') != 1){
			redirect(base_url("auth"));
		}
    $this->load->model('services_model');
    $this->load->helper('url_helper');
  }

	public function index()
	{
    $data['services'] = $this->services_model->get_service();
		$this->load->view("templates/header");
		$this->load->view("master/service/index", $data);
		$this->load->view("templates/footer");
	}

  public function view($id = null)
	{
    $data['service_detail'] = $this->services_model->get_service($id);
		$this->load->view("templates/header");
		$this->load->view("master/service/detail", $data);
		$this->load->view("templates/footer");
	}

  public function add()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('service_id', 'service id', 'required|is_unique[tbl_service.service_id]');
    $this->form_validation->set_rules('service_name', 'Service name', 'required');

    $data = array(
      'service_id' => $this->input->post('service_id'),
      'service_name' => $this->input->post('service_name')
    );

    if ($this->form_validation->run() === FALSE) {
      $this->load->view("templates/header");
  		$this->load->view("master/service/add", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->services_model->set_services();
      redirect('services');
    }

  }

  public function update($id)
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('service_name', 'Service name', 'required');

    $data['set_val'] = array(
      'service_name' => $this->input->post('service_name')
    );

    if ($this->form_validation->run() === FALSE) {
      $data['services'] =$this->services_model->get_service($id);
      $this->load->view("templates/header");
  		$this->load->view("master/service/update", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->services_model->update_services($id);
      redirect('services');
    }

  }


}

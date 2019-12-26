<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userprojects extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('userprojects_model');
    $this->load->model('Users_model');
    $this->load->model('Projects_model');
    $this->load->helper('url_helper');
  }

	public function index()
	{
    $data['userprojects'] = $this->userprojects_model->get_userproject();
		$this->load->view("templates/header");
		$this->load->view("master/userproject/index", $data);
		$this->load->view("templates/footer");
	}

  public function view($id = null, $id2 = null)
	{
    $data['userproject_detail'] = $this->userprojects_model->get_userproject($id,$id2);
		$this->load->view("templates/header");
		$this->load->view("master/userproject/detail", $data);
		$this->load->view("templates/footer");
	}

  public function add()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('custproject', 'cust project', 'required');
    $this->form_validation->set_rules('statususer', 'statususer', 'required');

    $data = array(
      'userproject_id' => $this->input->post('userproject_id'),
      'userproject_name' => $this->input->post('userproject_name')
    );

    if ($this->form_validation->run() === FALSE) {
      $data['users'] = $this->Users_model->get_user();
      $data['projects'] = $this->Projects_model->get_project();
      $this->load->view("templates/header");
  		$this->load->view("master/userproject/add", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->userprojects_model->set_userprojects();
      redirect('userprojects');
    }

  }

  public function update($id = null, $id2 = null)
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('custproject', 'cust project', 'required');
    $this->form_validation->set_rules('statususer', 'statususer', 'required');

    $data['set_val'] = array(
      'username' => $this->input->post('username'),
      'custproject' => $this->input->post('custproject'),
      'statususer' => $this->input->post('statususer')
    );

    if ($this->form_validation->run() === FALSE) {
      $data['userprojects'] =$this->userprojects_model->get_userproject($id,$id2);
      $data['users'] = $this->Users_model->get_user();
      $data['projects'] = $this->Projects_model->get_project();

      $this->load->view("templates/header");
  		$this->load->view("master/userproject/update", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->userprojects_model->update_userprojects($id,$id2);
      redirect('users/detail/'.$id);
    }

  }


}

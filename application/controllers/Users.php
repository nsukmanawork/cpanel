<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('projects_model');
    $this->load->model('userprojects_model');
    $this->load->helper('url_helper');
  }

	public function index()
	{
    $data['users'] = $this->users_model->get_user();
		$this->load->view("templates/header");
		$this->load->view("master/user/user", $data);
		$this->load->view("templates/footer");
	}

  public function view($id = null)
	{
    $data['user_detail'] = $this->users_model->get_user($id);
    $data['userprojects'] = $this->userprojects_model->get_userproject2($id);
		$this->load->view("templates/header");
		$this->load->view("master/user/detail", $data);
		$this->load->view("templates/footer");
	}

  public function add()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('username', 'username', 'required|is_unique[tbl_user.username]');
    $this->form_validation->set_rules('password', 'password', 'required');
    $this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('custproject', 'custproject', 'required');
    $this->form_validation->set_rules('level', 'level', 'required');
    $this->form_validation->set_rules('projects[]', 'projects', 'required');

    $data = array(
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password'),
      'name' => $this->input->post('name'),
      'custproject' => $this->input->post('custproject'),
      'level' => $this->input->post('level'),
      'projects' => $this->input->post('projects')
    );

    if ($this->form_validation->run() === FALSE) {
      $data['projects'] = $this->projects_model->get_project();
      $this->load->view("templates/header");
  		$this->load->view("master/user/add", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->userprojects_model->set_userprojects2($data);
      $this->users_model->set_users();
      redirect('users');
    }

  }

  public function update($id)
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('custproject', 'custproject', 'required');
    $this->form_validation->set_rules('level', 'level', 'required');

    $data['set_val'] = array(
      'name' => $this->input->post('name'),
      'custproject' => $this->input->post('custproject'),
      'level' => $this->input->post('level')
    );

    if ($this->form_validation->run() === FALSE) {
      $data['users'] =$this->users_model->get_user($id);
      $this->load->view("templates/header");
  		$this->load->view("master/user/update", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->users_model->update_users($id);
      redirect('users');
    }

  }


}

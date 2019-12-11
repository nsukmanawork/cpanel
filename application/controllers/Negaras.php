<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Negaras extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('negaras_model');
    $this->load->helper('url_helper');
  }

	public function index()
	{
    $data['negaras'] = $this->negaras_model->get_negara();
		$this->load->view("templates/header");
		$this->load->view("master/negara/index", $data);
		$this->load->view("templates/footer");
	}

  public function view($id = null)
	{
    $data['negara_detail'] = $this->negaras_model->get_negara($id);
		$this->load->view("templates/header");
		$this->load->view("master/negara/detail", $data);
		$this->load->view("templates/footer");
	}

  public function add()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('KdEdi', 'Kode Negara', 'required|is_unique[tblnegara.KdEdi]');
    $this->form_validation->set_rules('UrEdi', 'Nama Negara', 'required');

    $data = array(
      'KdEdi' => $this->input->post('KdEdi'),
      'UrEdi' => $this->input->post('UrEdi')
    );

    if ($this->form_validation->run() === FALSE) {
      $this->load->view("templates/header");
  		$this->load->view("master/negara/add", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->negaras_model->set_negaras();
      redirect('negaras');
    }

  }

  public function update($id)
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('UrEdi', 'negara name', 'required');

    $data['set_val'] = array(
      'UrEdi' => $this->input->post('UrEdi')
    );

    if ($this->form_validation->run() === FALSE) {
      $data['negaras'] =$this->negaras_model->get_negara($id);
      $this->load->view("templates/header");
  		$this->load->view("master/negara/update", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->negaras_model->update_negaras($id);
      redirect('negaras');
    }

  }


}

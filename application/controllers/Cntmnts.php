<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cntmnts extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('cntmnts_model');
    $this->load->helper('url_helper');
  }

	public function index()
	{
    $data['cntmnts'] = $this->cntmnts_model->get_cntmnt();
		$this->load->view("templates/header");
		$this->load->view("master/cntmnt/index", $data);
		$this->load->view("templates/footer");
	}

  public function view($id = null)
	{
    $data['cntmnt_detail'] = $this->cntmnts_model->get_cntmnt($id);
		$this->load->view("templates/header");
		$this->load->view("master/cntmnt/detail", $data);
		$this->load->view("templates/footer");
	}

  public function add()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('sgcode', 'Sg Code', 'required|is_unique[tbl_cntmnt.sgcode]');
    $this->form_validation->set_rules('cntyear', 'Cnt year', 'required');

    $data = array(
      'sgcode' => $this->input->post('sgcode'),
      'cntyear' => $this->input->post('cntyear'),
      'counter' => $this->input->post('counter')
    );

    if ($this->form_validation->run() === FALSE) {
      $this->load->view("templates/header");
  		$this->load->view("master/cntmnt/add", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->cntmnts_model->set_cntmnts();
      redirect('cntmnts');
    }

  }

  public function update($id)
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('cntyear', 'Cnt year', 'required');

    $data['set_val'] = array(
      'sgcode' => $this->input->post('sgcode'),
      'cntyear' => $this->input->post('cntyear'),
      'counter' => $this->input->post('counter')
    );

    if ($this->form_validation->run() === FALSE) {
      $data['cntmnts'] =$this->cntmnts_model->get_cntmnt($id);
      $this->load->view("templates/header");
  		$this->load->view("master/cntmnt/update", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->cntmnts_model->update_cntmnts($id);
      redirect('cntmnts');
    }

  }


}

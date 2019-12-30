<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('authenticated') != 1){
			redirect(base_url("auth"));
		}
  }

	public function index()
	{
		$this->load->view("templates/header");
		$this->load->view("index");
		$this->load->view("templates/footer");
	}
}

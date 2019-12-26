<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarifs extends CI_Controller {

  private $filename = "import_data_tarif";

  public function __construct()
  {
    parent::__construct();
    $this->load->model('tarifs_model');
    $this->load->helper('url_helper');
  }

	public function index()
	{
    $data['tarifs'] = $this->tarifs_model->get_tarif();
		$this->load->view("templates/header");
		$this->load->view("master/tarif/index", $data);
		$this->load->view("templates/footer");
	}

  public function view($id = null)
	{
    $data['tarif_detail'] = $this->tarifs_model->get_tarif($id);
		$this->load->view("templates/header");
		$this->load->view("master/tarif/detail", $data);
		$this->load->view("templates/footer");
	}

  public function add()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('origin_city_code', 'origin city code', 'required');
    $this->form_validation->set_rules('origin_city_name', 'origin city name', 'required');
    $this->form_validation->set_rules('origin_province', 'origin province', 'required');
    $this->form_validation->set_rules('origin_district', 'origin district', 'required');
    $this->form_validation->set_rules('origin_sub_district', 'origin sub district', 'required');
    $this->form_validation->set_rules('dest_city_code', 'dest city code', 'required');
    $this->form_validation->set_rules('dest_city_name', 'dest city name', 'required');
    $this->form_validation->set_rules('dest_province', 'dest province', 'required');
    $this->form_validation->set_rules('dest_district', 'dest district', 'required');
    $this->form_validation->set_rules('dest_sub_district', 'dest sub district', 'required');
    $this->form_validation->set_rules('service', 'service', 'required');
    $this->form_validation->set_rules('sla', 'sla', 'required');
    $this->form_validation->set_rules('currency', 'currency', 'required');
    $this->form_validation->set_rules('publish', 'publish', 'required');

    $data = array(
      'origin_city_code' => $this->input->post('origin_city_code'),
      'origin_city_name' => $this->input->post('origin_city_name'),
      'origin_province' => $this->input->post('origin_province'),
      'origin_district' => $this->input->post('origin_district'),
      'origin_sub_district' => $this->input->post('origin_sub_district'),
      'dest_city_code' => $this->input->post('dest_city_code'),
      'dest_city_name' => $this->input->post('dest_city_name'),
      'dest_province' => $this->input->post('dest_province'),
      'dest_district' => $this->input->post('dest_district'),
      'dest_sub_district' => $this->input->post('dest_sub_district'),
      'service' => $this->input->post('service'),
      'sla' => $this->input->post('sla'),
      'currency' => $this->input->post('currency'),
      'publish' => $this->input->post('publish')
    );

    if ($this->form_validation->run() === FALSE) {
      $this->load->view("templates/header");
  		$this->load->view("master/tarif/add", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->tarifs_model->set_tarifs();
      redirect('tarifs');
    }

  }

  public function update($id)
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('tarif_name', 'tarif name', 'required');

    $data['set_val'] = array(
      'tarif_name' => $this->input->post('tarif_name')
    );

    if ($this->form_validation->run() === FALSE) {
      $data['tarifs'] =$this->tarifs_model->get_tarif($id);
      $this->load->view("templates/header");
  		$this->load->view("master/tarif/update", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->tarifs_model->update_tarifs($id);
      redirect('tarifs');
    }

  }

  public function form(){
    $data = array(); // Buat variabel $data sebagai array

    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di tarifs_model.php
      $upload = $this->tarifs_model->upload_file($this->filename);

      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet;
      }else{ // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }

    $this->load->view("templates/header");
    $this->load->view("master/tarif/form", $data);
    $this->load->view("templates/footer");
  }

  public function import(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';

    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();

    $numrow = 1;
    foreach($sheet as $row){
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Kita push (add) array data ke variabel data
        array_push($data, array(
          "origin_city_code" => $row['A'],
          "origin_city_name" => $row['B'],
          "origin_province" => $row['C'],
          "origin_district" => $row['D'],
          "origin_sub_district" => $row['E'],
          "dest_city_code" => $row['F'],
          "dest_city_name" => $row['G'],
          "dest_province" => $row['H'],
          "dest_district" => $row['I'],
          "dest_sub_district" => $row['J'],
          "service" => $row['K'],
          "sla" => $row['L'],
          "currency" => $row['M'],
          "publish" => $row['N']
        ));
      }

      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->tarifs_model->insert_multiple($data);

    redirect("tarifs"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }

  public function downloadexcel(){
    $this->load->helper('download');
    $data = file_get_contents('excel/format_ci.xlsx');
    force_download('format_ci.xlsx', $data);
	}


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stockreffs extends CI_Controller {
  private $filename = "import_data";

  public function __construct()
  {
    parent::__construct();
    $this->load->model('stockreffs_model');
    $this->load->helper('url_helper');
    // $this->load->helper(array('url','download'));
  }

	public function index()
	{
    $data['stockreffs'] = $this->stockreffs_model->get_stockreff();
		$this->load->view("templates/header");
		$this->load->view("master/stockreff/index", $data);
		$this->load->view("templates/footer");
	}

  public function view($id = null)
	{
    $data['stockreff_detail'] = $this->stockreffs_model->get_stockreff($id);
		$this->load->view("templates/header");
		$this->load->view("master/stockreff/detail", $data);
		$this->load->view("templates/footer");
	}

  public function add()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('reffno', 'Reff No', 'required|is_unique[tbl_stock_reffno.reffno]');
    $this->form_validation->set_rules('usestatus', 'use status', 'required');

    $data = array(
      'reffno' => $this->input->post('reffno'),
      'usestatus' => $this->input->post('usestatus')
    );

    if ($this->form_validation->run() === FALSE) {
      $this->load->view("templates/header");
  		$this->load->view("master/stockreff/add", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->stockreffs_model->set_stockreffs();
      redirect('stockreffs');
    }

  }

  public function update($id)
	{
    $this->load->helper('form');
    $this->load->library('form_validation');
    // var_dump($this->input->post());

    $this->form_validation->set_rules('usestatus', 'Use status', 'required');

    $data['set_val'] = array(
      'usestatus' => $this->input->post('usestatus')
    );

    if ($this->form_validation->run() === FALSE) {
      $data['stockreffs'] =$this->stockreffs_model->get_stockreff($id);
      $this->load->view("templates/header");
  		$this->load->view("master/stockreff/update", $data);
  		$this->load->view("templates/footer");
    }else {
      $this->stockreffs_model->update_stockreffs($id);
      redirect('stockreffs');
    }

  }

  public function form(){
    $data = array(); // Buat variabel $data sebagai array

    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di stockreffs_model.php
      $upload = $this->stockreffs_model->upload_file($this->filename);

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
    $this->load->view("master/stockreff/form", $data);
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
          'reffno'=>$row['A'], // Insert data nis dari kolom A di excel
          'usestatus'=>0
        ));
      }

      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->stockreffs_model->insert_multiple($data);

    redirect("stockreffs"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }

  public function downloadexcel(){
    $this->load->helper('download');
    $data = file_get_contents('excel/format_ci.xlsx');
    force_download('format_ci.xlsx', $data);
	}


}

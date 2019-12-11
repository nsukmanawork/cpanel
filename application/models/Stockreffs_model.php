<?php
class Stockreffs_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_stockreff($id = FALSE)
  {
    if ($id === FALSE) {
      $query = $this->db->get('tbl_stock_reffno');
      return $query->result_array();
    }

    $query = $this->db->get_where('tbl_stock_reffno', array('reffno' => $id));
    return $query->row_array();
  }

  public function set_stockreffs()
  {
    $data = array(
      'reffno' => $this->input->post('reffno'),
      'usestatus' => $this->input->post('usestatus')
    );

    return $this->db->insert('tbl_stock_reffno', $data);
  }

  public function update_stockreffs($id)
  {
    $data = array(
      'usestatus' => $this->input->post('usestatus')
    );
    $this->db->where('reffno', $id);
    return $this->db->update('tbl_stock_reffno', $data);
  }

  public function upload_file($filename){
    $this->load->library('upload'); // Load librari upload

    $config['upload_path'] = './excel/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size']  = '2048';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;

    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }

  // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  public function insert_multiple($data){
    $this->db->insert_batch('tbl_stock_reffno', $data);
  }
}

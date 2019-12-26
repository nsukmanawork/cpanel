<?php
class tarifs_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_tarif($id = FALSE)
  {
    if ($id === FALSE) {
      $query = $this->db->get('tbl_tarrif');
      return $query->result_array();
    }

    $query = $this->db->get_where('tbl_tarrif', array('tarrif_id' => $id));
    return $query->row_array();
  }

  public function set_tarifs()
  {
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

    return $this->db->insert('tbl_tarrif', $data);
  }

  public function update_tarifs($id)
  {
    $data = array(
      'tarrif_name' => $this->input->post('tarrif_name')
    );
    $this->db->where('tarrif_id', $id);
    return $this->db->update('tbl_tarrif', $data);
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
    $this->db->insert_batch('tbl_tarrif', $data);
  }

}

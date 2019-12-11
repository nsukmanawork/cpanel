<?php
class Services_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_service($id = FALSE)
  {
    if ($id === FALSE) {
      $query = $this->db->get('tbl_service');
      return $query->result_array();
    }

    $query = $this->db->get_where('tbl_service', array('service_id' => $id));
    return $query->row_array();
  }

  public function set_services()
  {
    $data = array(
      'service_id' => $this->input->post('service_id'),
      'service_name' => $this->input->post('service_name')
    );

    return $this->db->insert('tbl_service', $data);
  }

  public function update_services($id)
  {
    $data = array(
      'service_name' => $this->input->post('service_name')
    );
    $this->db->where('service_id', $id);
    return $this->db->update('tbl_service', $data);
  }
}

<?php
class Cntmnts_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_cntmnt($id = FALSE)
  {
    if ($id === FALSE) {
      $query = $this->db->get('tbl_cntmnt');
      return $query->result_array();
    }

    $query = $this->db->get_where('tbl_cntmnt', array('sgcode' => $id));
    return $query->row_array();
  }

  public function set_cntmnts()
  {
    $data = array(
      'sgcode' => $this->input->post('sgcode'),
      'cntyear' => $this->input->post('cntyear'),
      'counter' => $this->input->post('counter')
    );

    return $this->db->insert('tbl_cntmnt', $data);
  }

  public function update_cntmnts($id)
  {
    $data = array(
      'cntyear' => $this->input->post('cntyear'),
      'counter' => $this->input->post('counter')
    );
    $this->db->where('sgcode', $id);
    return $this->db->update('tbl_cntmnt', $data);
  }
}

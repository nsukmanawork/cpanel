<?php
class Negaras_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_negara($id = FALSE)
  {
    if ($id === FALSE) {
      $query = $this->db->get('tblnegara');
      return $query->result_array();
    }

    $query = $this->db->get_where('tblnegara', array('KdEdi' => $id));
    return $query->row_array();
  }

  public function set_negaras()
  {
    $data = array(
      'KdEdi' => $this->input->post('KdEdi'),
      'UrEdi' => $this->input->post('UrEdi')
    );

    return $this->db->insert('tblnegara', $data);
  }

  public function update_negaras($id)
  {
    $data = array(
      'UrEdi' => $this->input->post('UrEdi')
    );
    $this->db->where('KdEdi', $id);
    return $this->db->update('tblnegara', $data);
  }
}

<?php
class Users_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_user($id = FALSE)
  {
    if ($id === FALSE) {
      $query = $this->db->get('tbl_user');
      return $query->result_array();
    }

    $query = $this->db->get_where('tbl_user', array('username' => $id));
    return $query->row_array();
  }

  public function set_users()
  {
    $data = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password')),
      'name' => $this->input->post('name'),
      'custproject' => $this->input->post('custproject'),
      'level' => $this->input->post('level')
    );

    return $this->db->insert('tbl_user', $data);
  }

  public function update_users($id)
  {
    $data = array(
      'name' => $this->input->post('name'),
      'custproject' => $this->input->post('custproject'),
      'level' => $this->input->post('level')
    );
    $this->db->where('username', $id);
    return $this->db->update('tbl_user', $data);
  }
}

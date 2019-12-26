<?php
class Userprojects_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_userproject($id = FALSE, $id2 = FALSE)
  {
    if ($id === FALSE && $id2 === FALSE) {
      $query = $this->db->get('tbl_userproject');
      return $query->result_array();
    }

    $query = $this->db->get_where('tbl_userproject', array('username' => $id, 'custproject' => $id2));
    return $query->row_array();
  }

  public function get_userproject2($id = FALSE)
  {
    $query = $this->db->get_where('tbl_userproject', array('username' => $id));
    return $query->result_array();
  }

  public function set_userprojects()
  {
    $data = array(
      'username' => $this->input->post('username'),
      'custproject' => $this->input->post('custproject'),
      'statususer' => $this->input->post('statususer')
    );

    return $this->db->insert('tbl_userproject', $data);
  }

  public function set_userprojects2($data)
  {
    $arr = array();
    foreach ($data['projects'] as $pro) {
      $arr2 = array(
        'username' => $data['username'],
        'custproject' => $pro,
        'statususer' => 0
      );
      $arr[] = $arr2;
    }
    // die(print_r($arr));
    return $this->db->insert_batch('tbl_userproject', $arr);
  }

  public function update_userprojects($id,$id2)
  {
    $data = array(
      'custproject' => $this->input->post('custproject'),
      'statususer' => $this->input->post('statususer')
    );
    // die($data);
    $array = array('username' => $id, 'custproject' => $id2);
    $this->db->where($array);
    return $this->db->update('tbl_userproject', $data);
  }
}

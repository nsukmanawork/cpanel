<?php
class Projects_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_project($id = FALSE)
  {
    if ($id === FALSE) {
      $query = $this->db->get('tbl_project');
      return $query->result_array();
    }

    $query = $this->db->get_where('tbl_project', array('custproject' => $id));
    return $query->row_array();
  }

  public function set_projects()
  {
    $data = array(
      'custproject' => $this->input->post('custproject'),
      'custname' => $this->input->post('custname'),
      'address' => $this->input->post('address'),
      'province' => $this->input->post('province'),
      'city' => $this->input->post('city'),
      'district' => $this->input->post('district'),
      'subdistrict' => $this->input->post('subdistrict'),
      'country' => $this->input->post('country'),
      'postalcode' => $this->input->post('postalcode'),
      'email' => $this->input->post('email'),
      'phone' => $this->input->post('phone'),
      'contactperson' => $this->input->post('contactperson')
    );

    return $this->db->insert('tbl_project', $data);
  }

  public function update_projects($id)
  {
    $data = array(
      'custname' => $this->input->post('custname'),
      'address' => $this->input->post('address'),
      'province' => $this->input->post('province'),
      'city' => $this->input->post('city'),
      'district' => $this->input->post('district'),
      'subdistrict' => $this->input->post('subdistrict'),
      'subdistrict' => $this->input->post('subdistrict'),
      'country' => $this->input->post('country'),
      'postalcode' => $this->input->post('postalcode'),
      'email' => $this->input->post('email'),
      'phone' => $this->input->post('phone'),
      'contactperson' => $this->input->post('contactperson')
    );
    $this->db->where('custproject', $id);
    return $this->db->update('tbl_project', $data);
  }
}

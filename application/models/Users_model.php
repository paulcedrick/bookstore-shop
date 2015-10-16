<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function validateUserCredential($username, $password)
    {
        $query = $this->db->get_where('user', array('username' => $username, 'password' => $password));

        return $query->row_array();
    }

    public function addNewUser($arr)
    {
        $this->db->insert('user', $arr);

        return $this->db->affected_rows() > 0;
    }

}

/* End of file Users.php */
/* Location: ./application/models/Users.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getAllBooks()
    {
        $query = $this->db->get('books');

        return $query->result_array();
    }

    public function insertBook($arr)
    {
        $this->db->insert('books', $arr);

        return $this->db->affected_rows() > 0;
    }

    public function updateBook($id, $arr)
    {
        $this->db->set($arr);
        $this->db->where('id', $id);
        $this->db->update('books');

        return $this->db->affected_rows() > 0;
    }

    public function deleteBook($id)
    {
        $this->db->set(array(
            'is_deleted' => '1'
        ));
        $this->db->where('id', $id);
        $this->db->update('books');

        return $this->db->affected_rows() > 0;
    }

}

/* End of file Books_model.php */
/* Location: ./application/models/Books_model.php */
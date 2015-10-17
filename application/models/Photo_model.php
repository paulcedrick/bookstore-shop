<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getImage($id) 
    {
        $query = $this->db->get_where('photos', array('id' => $id));

        return $query->result_array();
    }

    public function addImage($data)
    {
        $this->db->insert('photos', $data);

        return $this->db->affected_rows() > 0;
    }

    public function deleteImage($id)
    {
        $data = $this->getImage($id);

        $this->db->delete('photos', array('id' => $id));

        return array(
            'is_successful' => $this->db->affected_rows() > 0,
            'image' => $data
        );
    }

}

/* End of file Photo_model.php */
/* Location: ./application/models/Photo_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getAllOrders()
    {
        $query = $this->db->get_where('orders', array('is_viewable' => 0));

        return $query->result_array();
    }

    public function addOrder($arr)
    {
        $this->db->insert('orders', $arr);

        return $this->db->affected_rows() > 0;
    }

    public function updateOrder($id, $arr)
    {
        $this->db->set($arr);
        $this->db->where('id', $id);
        $this->db->update('orders');

        return $this->db->affected_rows() > 0;
    }

}

/* End of file Orders_model.php */
/* Location: ./application/models/Orders_model.php */
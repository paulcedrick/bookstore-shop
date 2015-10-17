<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('orders_model');
    }

    // List all your items
    public function index( $offset = 0 )
    {
        $data = $this->orders_model->getAllOrders();

        echo json_encode($data);
    }

    // Add a new item
    public function add()
    {
        $data = $this->input->post(null);

        $flag = $this->orders_model->addOrder($data);

        echo json_encode(array(
            'is_successful' => $flag
        ));
    }

    //Update one item
    public function update( $id = NULL )
    {
        $data = $this->input->post(null);

        $flag = $this->orders_model->updateOrder($id, $data);

        echo json_encode(array(
            'is_successful' => $flag
        ));
    }

    //Delete one item
    public function delete( $id = NULL )
    {
        $data['is_viewable'] = '1';

        $flag = $this->orders_model->updateOrder($id, $data);

        echo json_encode(array(
            'is_successful' => $flag
        ));
    }
}

/* End of file Orders.php */
/* Location: ./application/controllers/Orders.php */

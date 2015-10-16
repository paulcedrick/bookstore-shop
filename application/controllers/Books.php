<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

        $this->load->model('books_model');
    }

    // List all your items
    public function index( $offset = 0 )
    {
        $data = $this->books_model->getAllBooks();

        echo json_encode($data);
    }

    // Add a new item
    public function add()
    {
        $data = $this->input->post(null);

        $flag = $this->books_model->insertBook($data);

        echo json_encode(array(
            'is_successful' => $flag
        ));
    }

    //Update one item
    public function update( $id = NULL )
    {
        $data = $this->input->post(null);

        $flag = $this->books_model->updateBook($id, $data);

        echo json_encode(array(
            'is_successful' => $flag
        ));
    }

    //Delete one item
    public function delete( $id = NULL )
    {
        $flag = $this->books_model->deleteBook($id);

        echo json_encode(array(
            'is_successful' => $flag
        ));
    }

    public function approveBook($id = NULL)
    {
        $data['is_available'] = '1';

        $flag = $this->books_model->updateBook($id, $data);

        echo json_encode(array(
            'is_successful' => $flag
        ));
    }
}

/* End of file Books.php */
/* Location: ./application/controllers/Books.php */

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->helper('file');
        $this->load->model('photo_model');
    }

    // Get specific item
    public function index( $id = NULL ) 
    {
        $data = $this->photo_model->getImage($id);

        echo json_encode($data);
    }

    // Add a new item
    public function add()
    {
        $data = $this->input->post(null);

        // Upload configuration
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
            $message = $this->upload->display_errors("'", "'");
            
            echo json_encode(array(
                'is_successful' => false,
                'message' => $message
            ));
        }
        else
        {
            $img = $this->upload->data();
            $data = array('url' => $img['full_path']);
            $data['type'] = $this->input->post('type');
            $flag = $this->photo_model->addImage($data);

            echo json_encode(array(
                'is_successful' => $flag,
                'message' => 'succcesfully uploaded'
            ));
        }
    }

    //Update one item
    public function update( $id = NULL )
    {

    }

    //Delete one item
    public function delete( $id = NULL )
    {
        $arr = $this->photo_model->deleteImage($id);

        if (unlink($arr['image'][0]['url'])) {
            echo json_encode(array(
                'is_successful' => true
            ));
        }
        else {
            echo json_encode(array(
                'is_successful' => false
            ));
        }


    }
}

/* End of file Photo.php */
/* Location: ./application/controllers/Photo.php */

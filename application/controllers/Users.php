<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
    }

    public function index()
    {
        echo 'Hello';
    }

    public function login() 
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $flag = $this->users_model->validateUserCredential($username, $password);

        if ($flag == false) {
            echo json_encode(array(
                'is_valid' => false
            ));
        }
        else {
            echo json_encode(array(
                'is_valid' => true
            ));
        }

    }

    public function signup() 
    {
        $data['id'] = null;
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $data['first_name'] = $this->input->post('first_name');
        $data['last_name'] = $this->input->post('last_name');
        $data['mobile_number'] = $this->input->post('mobile_number');
        $data['email_address'] = $this->input->post('email_address');
        $data['type'] = $this->input->post('type');
        $data['gender'] = $this->input->post('gender');
        $data['street'] = $this->input->post('street');
        $data['city'] = $this->input->post('city');

        $flag = $this->users_model->addNewUser($data);

        echo json_encode(array(
            'is_successful' => $flag
        ));
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
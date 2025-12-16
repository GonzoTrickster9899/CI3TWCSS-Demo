<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(['form', 'url']);
    }

    public function login() {
        if ($this->session->userdata('logged_in')) {
            redirect('posts');
        }

        if ($this->input->post()) {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);

            $users = json_decode(
                file_get_contents(APPPATH . 'data/users.json'),
                true
            );

            foreach ($users as $user) {
                if (
                    $user['username'] === $username &&
                    $user['password'] === $password
                ) {
                    // SET SESSION
                    $this->session->set_userdata([
                        'username'  => $username,
                        'logged_in' => TRUE
                    ]);

                    redirect('posts');
                }
            }

            $data['error'] = 'Invalid username or password';
        }

        $this->load->view('auth/login', isset($data) ? $data : NULL);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}

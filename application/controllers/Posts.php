<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Post_model');
    }

    public function index() {
        $data['posts'] = $this->Post_model->getAll();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('posts/index', $data);
        $this->load->view('layout/footer');
    }

    public function create() {

        $data['title'] = "Create Post";
        $data['errors'] = [];

        if ($_POST) {
            // Simple manual validation
            if (empty($_POST['title'])) {
                $data['errors'][] = "Title is required.";
            }

            if (empty($_POST['content'])) {
                $data['errors'][] = "Content is required.";
            }

            if (empty($data['errors'])) {
                $this->Post_model->create([
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content')
                ]);
                redirect('posts?success=Post Created Successfully');
            }
        }
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('posts/create', $data);
        $this->load->view('layout/footer');
    }

    public function edit($id) {
            $data['post'] = $this->Post_model->getById($id);
            $data['title'] = "Edit Post";
            $data['errors'] = [];

            if ($_POST) {
                if (empty($_POST['title'])) {
                $data['errors'][] = "Title is required.";
            }

            if (empty($_POST['content'])) {
                $data['errors'][] = "Content is required.";
            }

            if (empty($data['errors'])) {
                $this->Post_model->update($id, [
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content')
                ]);
                redirect('posts?success=Post Updated Successfully');
            }
        }

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('posts/edit', $data);
        $this->load->view('layout/footer');
    }

    public function delete($id) {
        $this->Post_model->delete($id);
        redirect('posts?success=Post Deleted Successfully');
    }
}

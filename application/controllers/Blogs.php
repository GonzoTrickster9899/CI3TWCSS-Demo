<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Blog_model');
    }

    public function index() {
        $data['blogs'] = $this->Blog_model->getAll();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('blogs/index', $data);
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
                $this->Blog_model->create([
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content')
                ]);
                redirect('blogs?success=Post Created Successfully');
            }
        }
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('blogs/create', $data);
        $this->load->view('layout/footer');
    }

    public function edit($id) {
            $data['post'] = $this->Blog_model->getById($id);
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
                $this->Blog_model->update($id, [
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content')
                ]);
                redirect('blogs?success=Post Updated Successfully');
            }
        }

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('blogs/edit', $data);
        $this->load->view('layout/footer');
    }

    public function delete($id) {
        $this->Blog_model->delete($id);
        redirect('blogs?success=Post Deleted Successfully');
    }
}

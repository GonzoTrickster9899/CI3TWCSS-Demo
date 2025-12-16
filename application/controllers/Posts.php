<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    private $json_file;

    public function __construct() {
        parent::__construct();

        
        $this->load->library('session');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $this->json_file = APPPATH . 'data/posts.json';
        
        // Create data directory if it doesn't exist
        if (!is_dir(APPPATH . 'data')) {
            mkdir(APPPATH . 'data', 0755, true);
        }
        
        // Create posts.json if it doesn't exist
        if (!file_exists($this->json_file)) {
            file_put_contents($this->json_file, json_encode([]));
        }
    }

    public function index() {
        $posts = $this->get_posts();
        $data['posts'] = $posts;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('posts/index', $data);
        $this->load->view('layout/footer');
    }

    public function create() {
        if ($this->input->post()) {
            $posts = $this->get_posts();
            
            // Generate new ID
            $new_id = empty($posts) ? 1 : max(array_column($posts, 'id')) + 1;
            
            // Create new post
            $new_post = [
                'id' => $new_id,
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            // Add to posts array
            $posts[] = $new_post;
            
            // Save to JSON file
            $this->save_posts($posts);
            
            // Return JSON response for AJAX
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Post created successfully']);
            exit;
        }
    }

    public function edit($id) {
        if ($this->input->post()) {
            $posts = $this->get_posts();
            
            // Find and update the post
            $updated = false;
            foreach ($posts as $key => $post) {
                if ($post['id'] == $id) {
                    $posts[$key]['title'] = $this->input->post('title');
                    $posts[$key]['content'] = $this->input->post('content');
                    $posts[$key]['updated_at'] = date('Y-m-d H:i:s');
                    $updated = true;
                    break;
                }
            }
            
            if ($updated) {
                // Save to JSON file
                $this->save_posts($posts);
                
                // Return JSON response for AJAX
                header('Content-Type: application/json');
                echo json_encode(['success' => true, 'message' => 'Post updated successfully']);
            } else {
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Post not found']);
            }
            exit;
        }
    }

    public function delete($id) {
        $posts = $this->get_posts();
        
        // Count posts before deletion
        $initial_count = count($posts);
        
        // Filter out the post to delete
        $posts = array_filter($posts, function($post) use ($id) {
            return $post['id'] != $id;
        });
        
        // Check if post was deleted
        $deleted = count($posts) < $initial_count;
        
        if ($deleted) {
            // Re-index array
            $posts = array_values($posts);
            
            // Save to JSON file
            $this->save_posts($posts);
            
            // Return JSON response for AJAX
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Post deleted successfully']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Post not found']);
        }
        exit;
    }

    // Helper function to get posts from JSON
    private function get_posts() {
        $json_data = file_get_contents($this->json_file);
        return json_decode($json_data, true) ?: [];
    }

    // Helper function to save posts to JSON
    private function save_posts($posts) {
        file_put_contents($this->json_file, json_encode($posts, JSON_PRETTY_PRINT));
    }
}
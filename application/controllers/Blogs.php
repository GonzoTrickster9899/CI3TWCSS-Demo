<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

    private $json_file;

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->json_file = APPPATH . 'data/blogs.json';
        
        // Create data directory if it doesn't exist
        if (!is_dir(APPPATH . 'data')) {
            mkdir(APPPATH . 'data', 0755, true);
        }
        
        // Create blogs.json if it doesn't exist
        if (!file_exists($this->json_file)) {
            file_put_contents($this->json_file, json_encode([]));
        }
    }

    public function index() {
        $blogs = $this->get_blogs();
        $data['blogs'] = $blogs;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('blogs/index', $data);
        $this->load->view('layout/footer');
    }

    public function create() {
        if ($this->input->post()) {
            $blogs = $this->get_blogs();
            
            // Generate new ID
            $new_id = empty($blogs) ? 1 : max(array_column($blogs, 'id')) + 1;
            
            // Create new blog
            $new_blog = [
                'id' => $new_id,
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            // Add to blogs array
            $blogs[] = $new_blog;
            
            // Save to JSON file
            $this->save_blogs($blogs);
            
            // Return JSON response for AJAX
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Blog created successfully']);
            exit;
        }
    }

    public function edit($id) {
        if ($this->input->post()) {
            $blogs = $this->get_blogs();
            
            // Find and update the blog
            $updated = false;
            foreach ($blogs as $key => $blog) {
                if ($blog['id'] == $id) {
                    $blogs[$key]['title'] = $this->input->post('title');
                    $blogs[$key]['content'] = $this->input->post('content');
                    $blogs[$key]['updated_at'] = date('Y-m-d H:i:s');
                    $updated = true;
                    break;
                }
            }
            
            if ($updated) {
                // Save to JSON file
                $this->save_blogs($blogs);
                
                // Return JSON response for AJAX
                header('Content-Type: application/json');
                echo json_encode(['success' => true, 'message' => 'blog updated successfully']);
            } else {
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'blog not found']);
            }
            exit;
        }
    }

    public function delete($id) {
        $blogs = $this->get_blogs();
        
        // Count blogs before deletion
        $initial_count = count($blogs);
        
        // Filter out the blog to delete
        $blogs = array_filter($blogs, function($blog) use ($id) {
            return $blog['id'] != $id;
        });
        
        // Check if blog was deleted
        $deleted = count($blogs) < $initial_count;
        
        if ($deleted) {
            // Re-index array
            $blogs = array_values($blogs);
            
            // Save to JSON file
            $this->save_blogs($blogs);
            
             // Return JSON response for AJAX
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Post deleted successfully']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Post not found']);
        }
        exit;
    }

    // Helper function to get blogs from JSON
    private function get_blogs() {
        $json_data = file_get_contents($this->json_file);
        return json_decode($json_data, true) ?: [];
    }

    // Helper function to save blogs to JSON
    private function save_blogs($blogs) {
        file_put_contents($this->json_file, json_encode($blogs, JSON_PRETTY_PRINT));
    }
}
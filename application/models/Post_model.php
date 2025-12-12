<?php

class Post_model extends CI_Model {

    private $file_path;

    public function __construct() {
        parent::__construct();
        $this->file_path = FCPATH . "data/posts.json";
    }

    private function loadData() {
        $json = file_get_contents($this->file_path);
        return json_decode($json, true);
    }

    private function saveData($data) {
        file_put_contents($this->file_path, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function getAll() {
        return $this->loadData();
    }

    public function getById($id) {
        $posts = $this->loadData();
        foreach ($posts as $post) {
            if ($post['id'] == $id) {
                return $post;
            }
        }
        return null;
    }

    public function create($data) {
        $posts = $this->loadData();
        $data['id'] = time(); // unique ID
        $posts[] = $data;
        $this->saveData($posts);
    }

    public function update($id, $newData) {
        $posts = $this->loadData();
        foreach ($posts as &$post) {
            if ($post['id'] == $id) {
                $post['title'] = $newData['title'];
                $post['content'] = $newData['content'];
            }
        }
        $this->saveData($posts);
    }

    public function delete($id) {
        $posts = $this->loadData();
        $posts = array_filter($posts, function($post) use ($id) {
            return $post['id'] != $id;
        });
        $this->saveData(array_values($posts));
    }
}

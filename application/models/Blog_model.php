<?php

class Blog_model extends CI_Model {

    private $file_path;

    public function __construct() {
        parent::__construct();
        $this->file_path = FCPATH . "data/blogs.json";
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
        $blogs = $this->loadData();
        foreach ($blogs as $blogs) {
            if ($blogs['id'] == $id) {
                return $blogs;
            }
        }
        return null;
    }

    public function create($data) {
        $blogs = $this->loadData();
        $data['id'] = time(); // unique ID
        $blogs[] = $data;
        $this->saveData($blogs);
    }

    public function update($id, $newData) {
        $blogs = $this->loadData();
        foreach ($blogs as &$blogs) {
            if ($blogs['id'] == $id) {
                $blogs['title'] = $newData['title'];
                $blogs['content'] = $newData['content'];
            }
        }
        $this->saveData($blogs);
    }

    public function delete($id) {
        $blogs = $this->loadData();
        $blogs = array_filter($blogs, function($blogs) use ($id) {
            return $blogs['id'] != $id;
        });
        $this->saveData(array_values($blogs));
    }
}

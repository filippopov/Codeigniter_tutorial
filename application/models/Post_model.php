<?php

class Post_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_posts($slug = false, $limit = false, $offset = false)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        if ($slug === false) {
            $this->db->order_by('posts.created_at', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get('posts');
            return $query->result_array();
        }

        $query = $this->db->get_where('posts', array('slug' => $slug));
        return $query->row_array();
    }

    public function create_post($post_image)
    {
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => url_title($this->input->post('title')),
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category'),
            'user_id' => $this->session->userdata('user_id'),
            'post_image' => $post_image
        );

        return $this->db->insert('posts', $data);
    }

    public function update_post($id)
    {
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => url_title($this->input->post('title')),
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category')
        );

        $this->db->where('id', $id);
        return $this->db->update('posts', $data);
    }

    public function delete_post($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('posts');
    }

    public function get_posts_by_category_id($category_id)
    {
        $this->db->order_by('posts.created_at', 'DESC');
        $this->db->join('categories', 'categories.id = posts.category_id');
        $query = $this->db->get_where('posts', array('categories.id' => $category_id));
        return $query->result_array();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 12/27/2018
 * Time: 11:54 AM
 */

class Category_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_categories()
    {
        $this->db->order_by('name');
        $result = $this->db->get('categories');
        return $result->result_array();
    }

    public function get_category_by_id($id)
    {
        $result = $this->db->get_where('categories', array('id' => $id));
        return $result->row();
    }

    public function create_category()
    {
        $data = array('name' => $this->input->post('name'));
        return $this->db->insert('categories', $data);
    }
}
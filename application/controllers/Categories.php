<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 12/27/2018
 * Time: 11:53 AM
 */

class Categories extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Categories';

        $data['categories'] = $this->category_model->get_categories();

        $this->load->view('templates/header');
        $this->load->view("categories/index", $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/sign_in');
        }

        $data['title'] = 'Create Category';

        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() !== false) {
            $this->category_model->create_category();
            redirect('categories');
        }

        $this->load->view('templates/header');
        $this->load->view('categories/create', $data);
        $this->load->view('templates/footer');
    }
}
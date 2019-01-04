<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Posts extends CI_Controller
{
    public function index($offset = 0)
    {
        $data['title'] = 'Latest Posts';

        $config['base_url'] = base_url('/posts/index/');
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'pagination-link');

        $this->pagination->initialize($config);

        $data['posts'] = $this->post_model->get_posts(false, $config['per_page'], $offset);

        $this->load->view('templates/header');
        $this->load->view("posts/index", $data);
        $this->load->view('templates/footer');
    }


    public function view($slug = null)
    {
        $data['post'] = $this->post_model->get_posts($slug);

        if (empty($data['post'])) {
            show_404();
        }

        $data['comments'] = $this->comment_model->get_comments($data['post']['id']);

        $this->load->view('templates/header');
        $this->load->view("posts/view", $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/sign_in');
        }

        $data['title'] = 'Create Post';
        $data['categories'] = $this->category_model->get_categories();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header');
            $this->load->view("posts/create", $data);
            $this->load->view('templates/footer');
        } else {
            // Upload image
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|png|jpg';
            $config['max_size'] = '22048';
            $config['max_width'] = '2500';
            $config['max_height'] = '2500';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.jpg';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            $this->post_model->create_post($post_image);
            redirect('posts/index');
        }
    }

    public function edit($slug)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/sign_in');
        }

        $data['title'] = 'Edit Post';
        $data['post'] = $this->post_model->get_posts($slug);

        $data['categories'] = $this->category_model->get_categories();

        if (empty($data['post'])) {
            show_404();
        }

        if ($this->session->userdata('user_id') !== $data['post']['user_id']) {
            redirect('posts/index');
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header');
            $this->load->view("posts/edit", $data);
            $this->load->view('templates/footer');
        } else {
            $this->post_model->update_post($data['post']['id']);
            redirect('posts/index');
        }
    }

    public function delete($id)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/sign_in');
        }

        $this->post_model->delete_post($id);
        redirect('posts/index');
    }

    public function by_category($category_id)
    {
        $data['title'] = 'Posts by Category';

        $category_array = $this->category_model->get_category_by_id($category_id);
        if (empty($category_array)) {
            show_404();
        }

        $data['posts'] = $this->post_model->get_posts_by_category_id($category_id);

        $this->load->view('templates/header');
        $this->load->view("posts/index", $data);
        $this->load->view('templates/footer');
    }
}
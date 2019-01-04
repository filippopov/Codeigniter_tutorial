<?php

class Comments extends CI_Controller
{
    public function create($slug)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('users/sign_in');
        }

        $data['post'] = $this->post_model->get_posts($slug);

        if (empty($data['post'])) {
            show_404();
        }

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() !== false) {
            $this->comment_model->add_comment($data['post']['id']);
            redirect('posts/' . $slug);
        }

        $this->load->view('templates/header');
        $this->load->view("posts/view", $data);
        $this->load->view('templates/footer');
    }
}
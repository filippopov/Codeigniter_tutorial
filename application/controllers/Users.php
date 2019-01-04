<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 12/28/2018
 * Time: 11:49 AM
 */

class Users extends CI_Controller
{
    public function sign_up()
    {
        $data['title'] = 'Sign up';

        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_username_exist');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_exist');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|matches[password]');

        if ($this->form_validation->run() !== false) {
            $this->session->set_flashdata('sign_up_user', 'Successfully sign up user');
            $this->user_model->sign_up();
            redirect('posts/index');
        }

        $this->load->view('templates/header');
        $this->load->view('users/sign_up', $data);
        $this->load->view('templates/footer');
    }

    public function sign_in()
    {
        $data['title'] = 'Sign in';

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() !== false) {

            $user_data = $this->user_model->sign_in();

            if ($user_data) {
                $this->session->set_flashdata('sign_in_user', 'Successfully sign in user');
                $this->session->set_userdata($user_data);
                redirect('posts/index');
            }

            $this->session->set_flashdata('sign_in_user_failed', 'Sign in user failed');
            redirect('users/sign_in');
        }

        $this->load->view('templates/header');
        $this->load->view('users/sign_in', $data);
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('logged_in');

        $this->session->set_flashdata('logout_user', 'Successfully logout user');
        redirect('users/sign_in');
    }

    public function username_exist($username)
    {
        $this->form_validation->set_message('username_exist', 'Username is taken. Please try again!');
        return $this->user_model->username_exist($username);
    }

    public function email_exist($email)
    {
        $this->form_validation->set_message('email_exist', 'Email is taken. Please try again!');
        return $this->user_model->email_exist($email);
    }
}
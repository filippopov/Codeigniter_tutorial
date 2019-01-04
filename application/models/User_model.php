<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 12/28/2018
 * Time: 11:48 AM
 */

class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function sign_up()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
        );

        return $this->db->insert('users', $data);
    }

    public function sign_in()
    {
        $name = $this->input->post('name');
        $password = $this->input->post('password');

        $result = $this->db->get_where('users', array('name' => $name));
        $user = $result->row();

        if (empty($user)) {
            return false;
        }

        if (!password_verify($password, $user->password)) {
            return false;
        }

        $user_data = array(
            'user_id' => $user->id,
            'username' => $user->name,
            'email' => $user->email,
            'logged_in' => true
        );

        return $user_data;
    }

    public function username_exist($username)
    {
        $result = $this->db->get_where('users', array('name' => $username));
        $result = $result->result_array();
        return empty($result);
    }

    public function email_exist($email)
    {
        $result = $this->db->get_where('users', array('email' => $email));
        $result = $result->result_array();
        return empty($result);
    }
}
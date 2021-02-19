<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->form_validation->run('login') == false) {
            $data['title'] = 'Tikicorp';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_footer');
        } else {
            // validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        // cek data email dan password
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // ambil data user dari database
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $customer_user = $this->db->get_where('customer_user', ['email' => $email])->row_array();

        if ($user) {
            // user ada
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }
}

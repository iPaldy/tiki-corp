<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Tikicorp';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/auth_footer');
    }
}

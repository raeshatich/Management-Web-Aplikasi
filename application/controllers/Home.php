<?php

class Home extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();

        $data['judul'] = 'Halaman Home';
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
    }
}

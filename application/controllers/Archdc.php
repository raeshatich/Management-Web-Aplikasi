<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Archdc extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Archdcmodel');
        $this->load->model('Applicationmodel');
        if (!$this->session->userdata('name')) {
            redirect('auth');
        }
    }

    public function detail($application_id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = 'DC';

        $this->session->userdata('role_id');
        $result['applikasi'] = $this->Archdcmodel->getAllApplication($application_id);

        $config['base_url'] = base_url('archdc/detail/' . $application_id);
        $config['total_rows'] = $this->Archdcmodel->getAllDcRows();
        $config['per_page'] = 10;
        $result['page'] = $this->uri->segment(4);

        $result['dc'] = $this->Archdcmodel->getAllDc(
            $application_id,
            $config['per_page'],
            $result['page']
        );

        $this->pagination->initialize($config);
        $result['pagination'] = $this->pagination->create_links();
        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);
        $this->load->view('dc/detail', $result);
    }
    public function search($apps_id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = 'DC';

        $result['apps_id'] = $apps_id;
        $search = $this->input->post('lihat');

        $config['base_url'] = base_url('archdc/search/' . $apps_id);
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $result['page'] = $this->uri->segment(4);

        $result['dc'] = $this->Archdcmodel->getDcSearch(
            $search,
            $apps_id,
            $config['per_page'],
            $result['page']
        );
        $result['pagination'] = $this->pagination->create_links();

        $this->load->view('dc/search', $result);
    }

    public function show($application_id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = 'Add DC';
        $result['applikasi'] = $this->Archdcmodel->getAllApplication($application_id);

        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);
        $this->load->view('dc/add', $result);
    }

    public function create()
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = 'Add DC';


        $this->form_validation->set_rules('object_pin_name[]', 'Object Pin Name', 'required');
        $this->form_validation->set_rules('object_pin_x[]', 'Object Pin X', 'required');
        $this->form_validation->set_rules('object_pin_y[]', 'Object Pin Y', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $result);
            $this->load->view('templates/sidebar', $result);
            $this->load->view('dc/add', $result);
        } else {

            $this->Archdcmodel->createDataDc();
            $this->session->set_flashdata('flash', 'Data activity berhasil di buat');
            redirect('architecture');
        }
    }
    public function edit($application_id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();

        $result['judul'] = 'Edit DC';

        $result['dc'] = $this->Archdcmodel->getDataDc($application_id);
        $result['applicationn'] = $this->Archdcmodel->getAllApplication($application_id);

        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);
        $this->load->view('dc/edit', $result);
    }

    public function update($id_dc)
    {

        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();

        $this->form_validation->set_rules('object_pin_name[]', 'Object Pin Name', 'required');
        $this->form_validation->set_rules('object_pin_x[]', 'Object Pin X', 'required');
        $this->form_validation->set_rules('object_pin_y[]', 'Object Pin Y', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $result);
            $this->load->view('templates/sidebar', $result);
            $this->load->view('dc/edit', $result);
        } else {

            $this->Archdcmodel->updateDataDc($id_dc, $result);

            $this->session->set_flashdata('flash', 'Data DC berhasil di update');

            $apps_id = $this->Archdcmodel->getApplication($id_dc);

            redirect('archdc/detail/' . $apps_id);
        }
    }
    public function delete($id_dc)
    {

        $apps_id = $this->Archdcmodel->getApplication($id_dc);
        $this->Archdcmodel->deleteDataDc($id_dc);
        $this->session->set_flashdata('flash', 'Data DRC berhasil dihapus');

        redirect('archdc/detail/' . $apps_id);
    }
}

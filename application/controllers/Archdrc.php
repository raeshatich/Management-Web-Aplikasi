<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Archdrc extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Archdrcmodel');
        $this->load->model('Applicationmodel');
        $this->load->model('Architecturemodel');
        if (!$this->session->userdata('name')) {
            redirect('auth');
        }
    }

    public function detail($application_id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = 'DRC';

        $this->session->userdata('role_id');
        $result['applikasi'] = $this->Archdrcmodel->getAllApplication($application_id);

        $config['base_url'] = base_url('archdrc/detail/' . $application_id);
        $config['total_rows'] = $this->Archdrcmodel->getAllDrcRows();
        $config['per_page'] = 10;
        $result['page'] = $this->uri->segment(4);

        $result['drc'] = $this->Archdrcmodel->getAllDrc(
            $application_id,
            $config['per_page'],
            $result['page']

        );

        $this->pagination->initialize($config);
        $result['pagination'] = $this->pagination->create_links();
        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);
        $this->load->view('drc/detail', $result);
    }
    public function search($apps_id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = 'DRC';

        $result['apps_id'] = $apps_id;

        $config['base_url'] = base_url('archdc/search/' . $apps_id);
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $result['page'] = $this->uri->segment(4);
        $search = $this->input->post('seen');
        $result['drc'] = $this->Archdrcmodel->getDrcSearch(
            $search,
            $apps_id,
            $config['per_page'],
            $result['page']
        );

        $this->load->view('drc/search', $result);
    }

    public function show($application_id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = 'Add DRC';
        $result['applikasi'] = $this->Archdrcmodel->getAllApplication($application_id);


        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);
        $this->load->view('drc/add', $result);
    }

    public function create()
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = 'Add DRC';

        $this->form_validation->set_rules('object_pin_name[]', 'Object Pin Name', 'required');
        $this->form_validation->set_rules('object_pin_x[]', 'Object Pin X', 'required');
        $this->form_validation->set_rules('object_pin_y[]', 'Object Pin Y', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $result);
            $this->load->view('templates/sidebar', $result);
            $this->load->view('drc/add', $result);
        } else {

            $this->Archdrcmodel->createDataDrc();

            $this->session->set_flashdata('flash', 'Data DRC berhasil di buat');

            redirect('architecture');
        }
    }
    public function edit($application_id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();

        $result['judul'] = 'Edit DRC';

        $result['drc'] = $this->Architecturemodel->getArchitectureEdit($application_id);

        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);
        $this->load->view('drc/edit', $result);
    }

    public function update($id_drc)
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
            $this->Archdrcmodel->editDataDrc($id_drc, $result);

            $this->session->set_flashdata('flash', 'Data DRC berhasil di update');

            $apps_id = $this->Archdrcmodel->getApplication($id_drc);

            redirect('archdrc/detail/' . $apps_id);
        }
    }
    public function delete($id_drc)
    {

        $apps_id = $this->Archdrcmodel->getApps($id_drc);
        $this->Archdrcmodel->deleteDataDrc($id_drc);
        $this->session->set_flashdata('flash', 'Data DRC berhasil dihapus');

        redirect('archdrc/detail/' . $apps_id);
    }
}

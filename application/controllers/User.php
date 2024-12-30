<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpPresentation\Reader\PowerPoint2007;

class User extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Dashboardmodel');
        $this->load->model('Applicationmodel');

        if (!$this->session->userdata('name')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'My Dashboard';
        $data['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();

        $data['application_vcritical'] = $this->Dashboardmodel->getVcriticalApplication('Very Critical');
        $data['application_critical'] = $this->Dashboardmodel->getCriticalApplication('Critical');
        $data['application_moderate'] = $this->Dashboardmodel->getModerateApplication('Moderate');
        $data['application_noncritical'] = $this->Dashboardmodel->getNoncriticalApplication('Non Critical');

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
    }
    public function detail($app)
    {
        $data['judul'] = 'My Architecture';
        $data['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();

        $data['data_application'] = $this->Dashboardmodel->getDetailApp();
        $data['data_application_id'] = $this->Dashboardmodel->getDetailAppId($app);
        $data['architecture'] = $this->Dashboardmodel->getFilterId($app);
        $data['data_architecture'] = $this->Dashboardmodel->getArchitecture($app);
        $data['img'] = $this->Dashboardmodel->getFilterImg($app);
        $data['file'] = $this->Dashboardmodel->getFilterFile($app);
        $data['carousel'] = $this->Dashboardmodel->getCarouselImg($app);

        $this->load->view('templates/header', $data);
        $this->load->view('home/architecturedash', $data);
    }

    public function architecture($app)
    {
        $data['judul'] = 'My Architecture';
        $data['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();

        $data['data_application'] = $this->Dashboardmodel->getDetailApp();
        $data['data_application_id'] = $this->Dashboardmodel->getDetailAppId($app);
        $result['img'] = $this->Applicationmodel->getImg($app);


        $data['architecture'] = $this->Dashboardmodel->getFilterId($app);
        $data['data_architecture'] = $this->Dashboardmodel->getArchitecture($app);
        $this->load->view('templates/head', $data);

        $this->load->view('home/filter', $data);
    }
}

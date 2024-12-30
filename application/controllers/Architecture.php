    <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Architecture extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Architecturemodel');
            $this->load->model('Applicationmodel');
            $this->load->database();
            if (!$this->session->userdata('name')) {
                redirect('auth');
            }
        }

        public function index()
        {
            $result['user'] = $this->db->get_where('user', ['name' =>
            $this->session->userdata('name')])->row_array();

            $result['judul'] = ' Architecture';

            $config['base_url'] = site_url('architecture/index');

            $config['total_rows'] = $this->db->count_all('application');
            $config['per_page'] = 10;

            $result['page'] = $this->uri->segment(3);
            $result['applikasi'] = $this->Applicationmodel->getAllApplication(
                $config['per_page'],
                $result['page']
            );
            $this->pagination->initialize($config);
            $result['pagination'] = $this->pagination->create_links();

            $this->load->view('templates/header', $result);
            $this->load->view('templates/sidebar', $result);
            $this->load->view('architecture/index', $result);
        }

        public function search()
        {
            $result['user'] = $this->db->get_where('user', ['name' =>
            $this->session->userdata('name')])->row_array();
            $result['judul'] = 'Architecture';

            $search = $this->input->post('find');

            $config['base_url'] = site_url('architecture/search');
            $config['total_rows'] = $this->db->count_all('application');
            $config['per_page'] = 10;

            $result['page'] = $this->uri->segment(3);

            $result['applikasi'] = $this->Architecturemodel->getArchitectureSearch(
                $search,
                $config['per_page'],
                $result['page']
            );
            $this->pagination->initialize($config);
            $result['pagination'] = $this->pagination->create_links();

            $this->load->view('architecture/search', $result);
        }


        public function hapus($architecture_id)
        {
            $apps_id = $this->Architecturemodel->getApplication($architecture_id);
            $this->Architecturemodel->hapusDataArchitecture($architecture_id);
            $this->session->set_flashdata('flash', 'Data Architecture berhasil dihapus');

            redirect('architecture/detail/' . $apps_id);
        }
    }

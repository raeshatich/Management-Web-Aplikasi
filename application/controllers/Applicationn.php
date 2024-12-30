<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Applicationn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Applicationmodel');
        if (!$this->session->userdata('name')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = ' Application';

        $config['base_url'] = site_url('applications/index');

        $config['total_rows'] = $this->Applicationmodel->getAllApplicationRows();
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $result['page'] = $this->uri->segment(3);
        $result['applikasi'] = $this->Applicationmodel->getAllApplication(
            $config['per_page'],
            $result['page']
        );

        $result['pagination'] = $this->pagination->create_links();
        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);
        $this->load->view('application/index', $result);
    }

    public function add()
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['pic'] = $this->Applicationmodel->getPic();
        $result['judul'] = 'Add Application';

        $this->form_validation->set_rules('name_apps', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('critical', 'Critical', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $result);
            $this->load->view('templates/sidebar', $result);
            $this->load->view('application/add', $result);
        } else {
            $result = array(
                "application_id" => $this->input->post('application_id', true),
                "departement" => $this->input->post('departement', true),
                "category" => $this->input->post('category', true),
                "name_apps" => $this->input->post('name_apps', true),
                "description" => $this->input->post('description', true),
                "dns_address" => $this->input->post('dns_address', true),
                "pic_dev" => $this->input->post('pic_dev', true),
                "pic_pmo" => $this->input->post('pic_pmo', true),
                "pic_po" => $this->input->post('pic_po', true),
                "order" => $this->input->post('order', true),
                "status" => $this->input->post('status', true),
                "created" => $this->input->post('created', true),
                "team" => $this->input->post('team', true),
                "critical" => $this->input->post('critical', true),
                "width_screen" => $this->input->post('width_screen', true),
                "height_screen" => $this->input->post('height_screen', true),
                "pin_frame" => $this->input->post('pin_frame', true)
            );
            $this->Applicationmodel->addDataApps($result);

            $applikasi =  $this->db->insert_id();

            $file_name = str_replace('.', '', $applikasi);
            $config['upload_path'] = FCPATH . '/upload/file/';
            $config['allowed_types'] = 'jpg|jpeg|png|ppt|pptx';
            $config['file_name'] = $file_name;
            $config['overwrite'] = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('application/add', $error);
            } else {
                $uploaded_data = $this->upload->data();
                $file_data = [

                    'id_apps' => $applikasi,
                    'name_file' => $uploaded_data['file_name'],
                    'flag_show' => $this->input->post('flag_show'),
                    "created" => date('Y-m-d', strtotime($_POST['created'])),
                ];
                $this->db->insert('app_file', $file_data);
            }
            if (!$this->upload->do_upload('avatar')) {

                $error = array('error' => $this->upload->display_errors());
                $this->load->view('application/add', $error);
            } else {
                $uploaded_data = $this->upload->data();
                $new_data = [
                    'id_apps' => $applikasi,
                    'flag_show' => $this->input->post('flag_show'),
                    'name_img' => $uploaded_data['file_name'],
                    'created' => $this->input->post('created'),

                ];

                $this->db->insert('app_img', $new_data);
            }


            $role_id = count($this->input->post('role_id'));


            for ($i = 0; $i < $role_id; $i++) {
                $datas[$i] = array(
                    'id_apps' => $applikasi,
                    'id_pic' => $this->input->post('role_id[' . $i . ']')
                );
                $this->db->insert('app_pic', $datas[$i]);
            }
            $this->session->set_flashdata('flash', 'Data aplikasi berhasil ditambahkan');
            redirect('applicationn');
        }
    }
    public function edit($application_id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = ' Edit Application';

        $result['applikasi'] = $this->Applicationmodel->getDataApplikasi($application_id);
        $result['pic'] = $this->Applicationmodel->getPicRole($application_id);
        $result['img'] = $this->Applicationmodel->getFilterImg($application_id);
        $result['image'] = $this->Applicationmodel->getDataImg($application_id);
        $result['all'] = $this->Applicationmodel->getAllPic();
        $result['presentation'] = $this->Applicationmodel->getPresentation($application_id);

        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);
        $this->load->view('application/edit', $result);
    }

    public function update($application_id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = ' Edit Application';

        $result['applikasi'] = $this->Applicationmodel->getDataApplikasi($application_id);
        $result['pic'] = $this->Applicationmodel->getPicRole($application_id);
        $result['img'] = $this->Applicationmodel->getFilterImg($application_id);
        $result['image'] = $this->Applicationmodel->getDataImg($application_id);
        $result['all'] = $this->Applicationmodel->getAllPic();

        $this->form_validation->set_rules('name_apps', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('critical', 'Critical', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $result);
            $this->load->view('templates/sidebar', $result);

            $this->load->view('application/edit', $result);
        } else {

            $id_apps = $this->input->post('application_id');
            $created = $this->input->post('created');

            $upload_path = FCPATH . '/upload/file/';

            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|ppt|pptx';
            $config['file_name'] = str_replace('.', '', $id_apps);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('avatar')) {

                $data['error'] = $this->upload->display_errors();
            } else {
                $uploaded_data = $this->upload->data();
                $new_image_path = $uploaded_data['file_name'];
                $this->Applicationmodel->updateImgStatus($id_apps, $new_image_path, $created);
            }
            if (!$this->upload->do_upload('file')) {

                $data['error'] = $this->upload->display_errors();
            } else {
                $uploaded_data = $this->upload->data();
                $new_file_path = $uploaded_data['file_name'];
                $this->Applicationmodel->updateFile($id_apps, $new_file_path, $created);
            }

            $result = array(
                "application_id" => $this->input->post('application_id', true),
                "departement" => $this->input->post('departement', true),
                "category" => $this->input->post('category', true),
                "name_apps" => $this->input->post('name_apps', true),
                "description" => $this->input->post('description', true),
                "dns_address" => $this->input->post('dns_address', true),
                "pic_dev" => $this->input->post('pic_dev', true),
                "pic_pmo" => $this->input->post('pic_pmo', true),
                "pic_po" => $this->input->post('pic_po', true),
                "status" => $this->input->post('status', true),
                "created" => $this->input->post('created', true),
                "team" => $this->input->post('team', true),
                "version" => $this->input->post('version', true),
                "critical" => $this->input->post('critical', true),
                "width_screen" => $this->input->post('width_screen', true),
                "height_screen" => $this->input->post('height_screen', true),
                "pin_frame" => $this->input->post('pin_frame', true)
            );
            $this->db->where('application_id', $application_id);
            $this->db->update('application', $result);
            $this->db->where('id_apps', $application_id);
            $this->db->delete('app_pic');

            $pic = $this->input->post('id_pic', TRUE);
            $data = array();

            foreach ($pic as $pic_id) {
                $data[] = array(
                    'id_apps' => $application_id,
                    'id_pic' => $pic_id
                );
            }


            $this->db->insert_batch('app_pic', $data);
            $this->session->set_flashdata('flash', 'Data aplikasi berhasil diubah');

            redirect('applications/edit/' . $application_id);
        }
    }


    public function search()
    {

        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = ' Application';

        $keyword = $this->input->post('keyword');

        $config['base_url'] = site_url('applicationn/seach');

        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $result['page'] = $this->uri->segment(3);

        $result['applikasi'] = $this->Applicationmodel->getApplicationSearch(
            $keyword,
            $config['per_page'],
            $result['page']
        );
        $result['pagination'] = $this->pagination->create_links();

        $this->load->view('application/search', $result);
    }


    public function delete($application_id)
    {
        $this->Applicationmodel->hapusDataApplikasi($application_id);
        $applikasi =  $this->db->insert_id();

        $file_name = str_replace('.', '', $applikasi);

        $file_path = FCPATH . "/upload/file/" . $file_name;
        if (file_exists($file_path)) {
            unlink($file_path);
        } else {
            echo "hd";
        }
        $this->db->where('id_apps', $application_id);
        $this->db->delete('app_pic');

        $this->session->set_flashdata('flash', 'Data aplikasi berhasil dihapus');
        redirect('applicationn');
    }

    public function edit1($application_id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();

        $result['judul'] = 'Edit Application';

        $result['applikasi'] = $this->Applicationmodel->getDataApplikasi($application_id);

        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);

        if (validation_errors()) {
            $result['error_message'] = validation_errors();
        }
        $this->load->view('architecture/add', $result);
    }
    public function update1($application_id)
    {
        $this->form_validation->set_rules('pin_frame', 'pin_frame', 'required');
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['applikasi'] = $this->Applicationmodel->getDataApplikasi($application_id);

        $result['judul'] = 'Edit Architecture';
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $result);
            $this->load->view('architecture/add', $result);
        } else {

            $result = array(
                "width_screen" => $this->input->post('width_screen', true),
                "height_screen" => $this->input->post('height_screen', true),
                "pin_frame" => $this->input->post('pin_frame', true)
            );
            $result['applikasi'] = $this->Applicationmodel->editDataApplikasi($application_id, $result);
            $this->session->set_flashdata('flash', 'Data aplikasi berhasil diedit');
            redirect('applicationn/edit1/' . $application_id);
        }
    }
}

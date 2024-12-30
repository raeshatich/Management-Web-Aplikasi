<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Authmodel');

        $this->load->library('form_validation');
    }

    public function index()
    {
        $result['judul'] = 'Halaman Login';
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/loginview', $result);
        } else {
            $this->_login();    
        }
    }

    private function _login()
    {
        $id = $this->input->post('id_user');
        $username = $this->input->post('name');
        $password = $this->input->post('password');

        $username = $this->db->get_where('user', ['name' => $username])->row_array();

        if ($username) {
            if ($username['is_active'] == 1) {
                if (password_verify($password, $username['password'])) {
                    $data = [
                        'id_user' => $username['id_user'],
                        'name' => $username['name'],
                        'role_id' => $username['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($username['role_id'] == 'admin') {
                        redirect('admin');
                    } else
                        redirect('user');
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">Wrong password!</div>'
                    );
                    redirect('auth');
                }
            } else {

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Username has not been activated!</div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">Username never registered!</div>'
            );
            redirect('auth');
        }
    }

    public function registration()
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = 'Registration';
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('pic_name', 'PIC Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This Email has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');


        if ($this->form_validation->run() == FALSE) {
            $result['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $this->load->view('templates/header', $result);
            $this->load->view('templates/sidebar', $result);
            $this->load->view('auth/regisview', $result);
        } else {
            $result = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'pic_name' => htmlspecialchars($this->input->post('pic_name', true)),
                'password' => password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => 'user',
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $result);
            $this->session->set_flashdata('flash', 'Data aplikasi berhasil ditambahkan');


            redirect('auth/index1');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata(
            'flash',
            'You have been logged out'
        );
        redirect('auth');
    }
    public function index1()
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = 'Akun User';

        $result['role'] = $this->Authmodel->getAllUser();

        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);

        $this->load->view('auth/akunview', $result);
    }

    public function update($id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'name' => $this->input->post('name'),
            'pic_name' => $this->input->post('pic_name'),
            'role_id' => $this->input->post('role_id'),
            'is_active' => $this->input->post('is_active'),
        );

        $result['authh'] = $this->Authmodel->updateDataUser($id, $data);
        $this->session->set_flashdata('flash', 'Data user berhasil diubah');
        redirect('auth/user');
    }


    public function updatePassword($id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['role'] = $this->Authmodel->getAllUser();
        $result['judul'] = 'Akun User';


        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == False) {
            $this->load->view('templates/header', $result);
            $this->load->view('templates/sidebar', $result);
            $this->load->view('auth/akunview', $result);
        } else {

            $data = array(
                'id_user' => $this->input->post('id_user'),

                'password' => password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                ),
            );
            $result['authh'] = $this->Authmodel->updateDataUser($id, $data);

            $this->session->set_flashdata('flash', 'Password berhasil diperbarui');
            redirect('auth/user');
        }
    }
    public function hapus($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('flash', 'Data user berhasil dihapus');

        redirect('auth/user');
    }
}

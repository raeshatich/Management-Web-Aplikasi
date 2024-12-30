<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Activity extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Activitymodel');
        $this->load->model('Applicationmodel');
        $this->load->model('Authmodel');
        $this->load->model('Dashboardmodel');
        $this->load->library('excel');

        if (!$this->session->userdata('name')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $result['judul'] = 'Activity';
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();

        $config['base_url'] = site_url('activity/index');

        $config['total_rows'] = $this->db->count_all('user');
        $config['per_page'] = 15;


        $result['page'] = $this->uri->segment(3);
        $role = $this->session->userdata('role_id');

        $result['activity'] = $this->Activitymodel->getAllActivity(
            $config['per_page'],
            $result['page']
        );

        if ($role == 'admin') {
            $result['admin'] = $this->Activitymodel->getAllActivity(
                $config['per_page'],
                $result['page']
            );
        } else {
            $result['pic'] = $this->Activitymodel->getAllActivity(
                $config['per_page'],
                $result['page']

            );
        }

        $this->pagination->initialize($config);
        $result['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);
        $this->load->view('activity/index', $result);
    }
    public function detail($id_activitiy)
    {

        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = 'Activity';

        $this->session->userdata('role_id');
        $result['filter'] = $this->Activitymodel->getDataUser($id_activitiy);
        $result['export_list'] = $this->Activitymodel->getExportUser($id_activitiy);


        $result['activity'] = $this->Activitymodel->getActivityUser(
            $id_activitiy
        );

        $result['id_activitiy'] = $id_activitiy;

        $this->session->set_userdata('data_export', $result['activity']);
        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);
        $this->load->view('activity/detail', $result);
    }
    public function show($application_id)
    {
        $result['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $result['activity'] = $this->Activitymodel->getActivityRole($application_id);
        $result['applikasi'] = $this->Activitymodel->getDataApplikasi($application_id);
        $role = $this->session->userdata('role_id');

        if ($role == 1) {

            $result['appadmin'] = $this->Activitymodel->getAppAdmin($application_id);
        } else {

            $result['appuser'] = $this->Activitymodel->getRole($application_id);
        }
        $result['userr'] = $this->Activitymodel->getUserApp($application_id);

        $result['judul'] = 'Add Activity';
        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);
        $this->load->view('activity/add', $result);
    }

    public function create()
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = 'Add Activity';
        $this->form_validation->set_rules('name', 'Name Activity', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $result);
            $this->load->view('templates/sidebar', $result);
            $this->load->view('activity/add', $result);
        } else {

            $id_activity = $this->input->post('id_role');

            $result['userr'] = $this->Activitymodel->createActivity();
            $this->session->set_flashdata('flash', 'Data activity berhasil di buat');

            redirect('activity/detail/' . $id_activity);
        }
    }

    public function edit($application_id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();

        $result['judul'] = 'Edit Activity';

        $result['activity'] = $this->Activitymodel->getActivityEdit($application_id);

        $role = $this->session->userdata('role_id');

        if ($role == 2) {

            $result['row'] = $this->Activitymodel->getActivityJoin($application_id);
            $result['appuser'] = $this->Activitymodel->getActivityPic($application_id);
        } else {

            $result['row'] = $this->Activitymodel->getActivityJoin($application_id);
            $result['appadmin'] = $this->Activitymodel->getAppAdmin($application_id);
        }

        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);
        $this->load->view('activity/edit', $result);
    }

    public function update($id_activity)
    {

        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();

        $result = array(
            "id_activity" => $this->input->post('id_activity'),
            "id_apps" => $this->input->post('id_apps'),
            "id_role" => $this->input->post('id_role'),
            "name_activity" => $this->input->post('name'),
            "detail" => $this->input->post('detail'),
            "status_activity" => $this->input->post('status_activity'),

            "date_activity" => $this->input->post('date_activity'),
            "user_created" => $this->input->post('user_created'),
            "created" => $this->input->post('created'),

        );
        $this->Activitymodel->editDataActivity($id_activity, $result);

        $this->session->set_flashdata('flash', 'Data activity berhasil di update');

        $apps_id = $this->Activitymodel->getAllApplikasibyId($id_activity);

        redirect('activity/detail/' . $apps_id);
    }

    public function hapus($id_activity)
    {

        $apps_id = $this->Activitymodel->getAllApplikasibyId($id_activity);
        $this->Activitymodel->hapusDataActivity($id_activity);
        $this->session->set_flashdata('flash', 'Data Activity berhasil dihapus');

        redirect('activity/detail/' . $apps_id);
    }
    public function filter($application_id)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = 'Halaman Activity';

        $result['applikasi'] = $this->Activitymodel->getDataApplikasi($application_id);
        $result['filter'] = $this->Activitymodel->getDataUser($application_id);
        $result['export_list'] = $this->Activitymodel->getExportUser($application_id);

        $status = $this->input->post('status');

        $start_date = $this->input->post('start');
        $end_date = $this->input->post('end');
        $config['base_url'] = site_url('activity/detail/' . $application_id);

        $config['total_rows'] = $this->db->count_all('activity');
        $config['per_page'] = 10;

        $result['page'] = $this->uri->segment(4);

        if ($start_date == null and $end_date == null and $status == null) {
            $result['activity'] = $this->Activitymodel->getActivityUser(
                $application_id,
                $config['per_page'],
                $result['page']


            );
        } else {
            $result['activity'] = $this->Activitymodel->getFilterUser(
                $application_id,
                $status,
                $start_date,
                $end_date,
                $config['per_page'],
                $result['page']

            );
        }
        $result['pagination'] = $this->pagination->create_links();

        $this->session->set_userdata('data_export', $result['activity']);
        $this->load->view('templates/header', $result);
        $this->load->view('templates/sidebar', $result);
        $this->load->view('activity/detail', $result);
    }
    public function search($id_role)
    {
        $result['user'] = $this->db->get_where('user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $result['judul'] = 'Halaman Activity';
      
        $result['id_role'] = $id_role;

        $find = $this->input->post('find');
        $result['activity'] = $this->Activitymodel->getSearchUser(
            $find,
            $id_role
        );

        $this->load->view('activity/search', $result);
    }


    public function export()
    {

        $listInfo = $this->session->userdata('data_export');
        $filename = 'data-' . time() . '.xlsx';

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $style_col = array(
            'font' => array(
                'bold' => true
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Bank Syariah Indonesia IT Daily Activity Reports');
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Date Activity');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Name Activity');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Name Application');
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Status Activity');
        $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Detail Activity');

        $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('C2')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E2')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('F2')->applyFromArray($style_col);

        $objPHPExcel->getActiveSheet()->mergeCells('A1:F1');


        $baris = 3;
        $no = 1;

        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $baris, $no++);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $baris, date('d M Y', strtotime($list['date_activity'])));
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $baris, $list['name_activity']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $baris, $list['name_apps']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $baris, $list['status_activity']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $baris, $list['detail']);

            $objPHPExcel->getActiveSheet()->getStyle('A' . $baris)->applyFromArray($style_row);
            $objPHPExcel->getActiveSheet()->getStyle('B' . $baris)->applyFromArray($style_row);
            $objPHPExcel->getActiveSheet()->getStyle('C' . $baris)->applyFromArray($style_row);
            $objPHPExcel->getActiveSheet()->getStyle('D' . $baris)->applyFromArray($style_row);
            $objPHPExcel->getActiveSheet()->getStyle('E' . $baris)->applyFromArray($style_row);
            $objPHPExcel->getActiveSheet()->getStyle('F' . $baris)->getAlignment()->setWrapText(true);
            $objPHPExcel->getActiveSheet()->getStyle('F' . $baris)->applyFromArray($style_row);


            $baris++;
        }
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

        $filename = "Activity_Data " . date("d-m-Y") . ".xlsx";
        $objPHPExcel->getActiveSheet()->setTitle('Activity Data');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }
}

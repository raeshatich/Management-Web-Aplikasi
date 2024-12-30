<?php

class Applicationmodel extends CI_Model
{
    public function getAllApplication($limit, $start)
    {

        $this->db->select('*');
        $this->db->from('application');

        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }
    public function getAllApplicationRows()
    {

        return $this->db->get('application')->num_rows();
    }
    public function getAllApplikasii()
    {

        $this->db->select('*');
        $this->db->from('application');
        return $this->db->get()->row_array();
    }

    public function getAllArchitecture($application_id, $limit, $start)
    {
        $this->db->select('*');
        $this->db->from('architecture');
        $this->db->join('application', 'architecture.apps_id = application.application_id');
        $this->db->where('apps_id', $application_id);
        $this->db->limit($limit, $start);

        return $this->db->get()->result_array();
    }
    public function getApplication()
    {
        return $this->db->get('application')->result_array();
    }

    public function getApplicationRoles($appId)
    {
        $this->db->select('user.pic_name');
        $this->db->from('app_pic');
        $this->db->join('user', 'app_pic.id_pic = user.id_user');
        $this->db->where('app_pic.id_apps', $appId);

        $query = $this->db->get();
        return $query->result_array();
    }
    public function getCriticalApp($appId)
    {
        $this->db->select('criticalitas.level');
        $this->db->from('application');
        $this->db->join('criticalitas', 'application.critical_id = criticalitas.id_critical');
        $this->db->where('application.critical_id', $appId);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPic()
    {
        return  $this->db->get('user')->result_array();
    }
    public function getCritical()
    {
        return  $this->db->get('application')->result_array();
    }


    public function addDataApps($result)
    {

        return $this->db->insert('application', $result);
    }
    public function addPICApps()
    {
        $applikasi =  $this->db->insert_id();

        $role_id = count($this->input->post('role_id'));


        for ($i = 0; $i < $role_id; $i++) {
            $datas[$i] = array(
                'id_apps' => $applikasi,
                'id_pic' => $this->input->post('role_id[' . $i . ']')
            );
            $this->db->insert('app_pic', $datas[$i]);
        }
    }
    public function addFileApps()
    {
        $applikasi =  $this->db->insert_id();

        $file_name = str_replace('.', '', $applikasi);
        $config['upload_path'] = FCPATH . '/upload/file/';
        $config['allowed_types'] = '*';

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
    }

    public function addDcApplication($data)
    {
        $this->db->insert('application', $data);
    }
    public function getDataApplikasi($application_id)
    {
        return $this->db->get_where('application', ['application_id' => $application_id])->row_array();
    }

    public function getDataArch($application_id)
    {
        $this->db->select('*');
        $this->db->from('architecture');
        $this->db->join('application', 'architecture.apps_id = application.application_id');
        $this->db->where('architecture.apps_id', $application_id);
        return $this->db->get()->row_array();
    }
    public function getPicRole($application_id)
    {

        $this->db->select('id_user, pic_name');
        $this->db->from('app_pic');
        $this->db->join('user', 'user.id_user = app_pic.id_pic');
        $this->db->join('application', 'application.application_id = app_pic.id_apps');

        $this->db->where('application.application_id', $application_id);
        return $this->db->get()->result_array();
    }
    public function getImg($application_id)
    {
        $this->db->select('*');
        $this->db->from('app_img');
        $this->db->join('application', 'application.application_id = app_img.id_apps');
        $this->db->where('flag_show', 'true');
        $this->db->where('id_apps', $application_id);
        return $this->db->get()->result_array();
        // $this->db->select('id_apps, name_img');
        // $this->db->from('app_img');
        // $this->db->join('application', 'application.application_id = app_img.id_apps');

        // $this->db->where('application.application_id', $application_id);
        return $this->db->get()->result_array();
    }
    public function getAllPic()
    {
        return  $this->db->get('user')->result_array();
    }

    public function getPresentation($application_id)
    {
        $this->db->select('*');
        $this->db->from('app_file');
        $this->db->join('application', 'application.application_id = app_file.id_apps');

        $this->db->where('id_apps', $application_id);
        return $this->db->get()->row_array();
    }

    public function editDataApplikasi($application_id, $result)
    {
        $this->db->where('application_id', $application_id);
        $this->db->update('application', $result);
        // echo $this->db->last_query();
    }

    public function hapusDataApplikasi($application_id)
    {
        $this->db->where('application_id', $application_id);
        $this->db->delete('application');
    }

    public function getDataArchitectureEdit($architecture_id)
    {

        return $this->db->get_where('architecture', ['architecture_id' => $architecture_id])->row_array();
    }


    public function  getApplicationSearch($keyword, $limit, $start)
    {

        $this->db->like('name_apps', $keyword);
        $this->db->or_like('description', $keyword);
        $this->db->or_like('dns_address', $keyword);
        $this->db->or_like('pic_dev', $keyword);
        $this->db->or_like('dns_address', $keyword);
        $this->db->or_like('description', $keyword);
        $this->db->or_like('pic_dev', $keyword);
        $this->db->or_like('pic_pmo', $keyword);
        $this->db->or_like('pic_po', $keyword);
        $this->db->or_like('order', $keyword);
        $this->db->or_like('critical', $keyword);
        $this->db->or_like('category', $keyword);
        $this->db->or_like('status', $keyword);

        $this->db->limit($limit, $start);

        return $this->db->get('application', $limit, $start)->result_array();
    }

    public function  getCountSearch($keyword)
    {
        $this->db->like('name_apps', $keyword);
        $this->db->or_like('description', $keyword);
        $this->db->or_like('dns_address', $keyword);
        $this->db->or_like('pic_dev', $keyword);
        $this->db->or_like('dns_address', $keyword);
        $this->db->or_like('description', $keyword);
        $this->db->or_like('pic_dev', $keyword);
        $this->db->or_like('pic_pmo', $keyword);
        $this->db->or_like('pic_po', $keyword);
        $this->db->or_like('order', $keyword);
        $this->db->or_like('critical', $keyword);
        $this->db->or_like('category', $keyword);
        $this->db->or_like('status', $keyword);


        return $this->db->cpunt_all_results('application');
    }
    public function getAvatar($data)
    {
        if (!$data['application_id']) {
            return;
        } else {
            return $this->db->update('application', $data, ['application_id' => $data['application_id']]);
        }
    }
    public function getOrder($data)
    {
        if (!$data['application_id']) {
            return;
        } else {
            return $this->db->insert('application', $data, ['application_id' => $data['application_id']]);
        }
    }

    public function getFilterImg($appId)
    {

        $this->db->select('*');
        $this->db->from('app_img');
        $this->db->join('application', 'application.application_id = app_img.id_apps');
        $this->db->where('flag_show', true);
        $this->db->where('id_apps', $appId);
        return $this->db->get()->result_array();
    }
    public function getDataImg($appId)
    {
        $this->db->select('*');
        $this->db->from('app_img');
        $this->db->join('application', 'application.application_id = app_img.id_apps');
        $this->db->where('id_apps', $appId);
        return $this->db->get()->row_array();
    }

    public function updateImgStatus($application_id, $name_img, $created)
    {
        $this->db->select('*');
        $this->db->from('app_img');
        $this->db->join('application', 'application.application_id = app_img.id_apps');
        $this->db->where('id_apps', $application_id);
        $this->db->update('app_img', ['flag_show' => '0']);

        // Insert new image record
        $data = [
            'id_apps' => $application_id,
            'name_img' => $name_img,
            'created' => $created,
            'flag_show' => '1'
        ];
        $this->db->insert('app_img', $data);
    }
    public function updateFile($application_id, $name_file, $created)
    {
        $this->db->select('*');
        $this->db->from('app_file');
        $this->db->join('application', 'application.application_id = app_file.id_apps');
        $this->db->where('id_apps', $application_id);
        $this->db->update('app_file', ['flag_show' => '0']);
        $data = [
            'id_apps' => $application_id,
            'name_file' => $name_file,
            'created' => $created,
            'flag_show' => '1'

        ];

        // Insert new image record
        $this->db->insert('app_file', $data);
    }
}

<?php

class Archdrcmodel extends CI_Model
{
    public function getAllApplication($application_id)
    {
        return $this->db->get_where('application', ['application_id' => $application_id])->row_array();
    }
    public function getAllDrcRows()
    {
        return $this->db->get('architecture')->num_rows();
    }

    public function getAllDrc($apps_id, $limit, $start)
    {
        $this->db->select('*');
        $this->db->from('architecture');
        $this->db->join('application', 'application.application_id = architecture.apps_id');
        $this->db->where('application_id', $apps_id);
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }
    public function getDrcSearch($search, $apps_id, $limit, $start)
    {

        $this->db->like('object_pin_name', $search);
        $this->db->or_like('service_description', $search);
        $this->db->or_like('service_type', $search);
        $this->db->or_like('object_pin_x', $search);
        $this->db->or_like('object_pin_y', $search);
        $this->db->or_like('ip_appdrc', $search);
        $this->db->or_like('web_server', $search);
        $this->db->or_like('database', $search);
        $this->db->or_like('framework', $search);
        $this->db->or_like('api_method', $search);
        $this->db->or_like('api_address', $search);
        $this->db->or_like('server_type', $search);
        $this->db->or_like('operation_system', $search);
        $this->db->or_like('processor', $search);

        $this->db->where('apps_id', $apps_id);
        $this->db->limit($limit, $start);

        return $this->db->get('architecture', $limit, $start)->result_array();
    }
    public function createDataDrc()
    {

        $apps_id = $_POST['apps_id'];
        $object_pin_name = $_POST['object_pin_name'];
        $object_pin_x = $_POST['object_pin_x'];
        $object_pin_y = $_POST['object_pin_y'];
        $service_description = $_POST['service_description'];
        $service_type = $_POST['service_type'];
        $ip_appdrc = $_POST['ip_appdrc'];
        $webserver = $_POST['webserver'];
        $database = $_POST['database'];
        $framework = $_POST['framework'];
        $api_method = $_POST['api_method'];
        $api_address = $_POST['api_address'];
        $operation_system = $_POST['operation_system'];
        $server_type = $_POST['server_type'];
        $processor = $_POST['processor'];
        $created =  date('Y-m-d', strtotime($_POST['created']));
        $data = array();

        $index = 0;
        foreach ($apps_id as $apps_id) {
            array_push($data, array(
                'apps_id' => $apps_id,
                'object_pin_name' => $object_pin_name[$index],
                'object_pin_x' => $object_pin_x[$index],
                'object_pin_y' => $object_pin_y[$index],
                'service_description' => $service_description[$index],
                'service_type' => $service_type[$index],
                'ip_appdrc' => $ip_appdrc[$index],
                'webserver' => $webserver[$index],
                'database' => $database[$index],
                'framework' => $framework[$index],
                'api_method' => $api_method[$index],
                'api_address' => $api_address[$index],
                'operation_system' => $operation_system[$index],
                'server_type' => $server_type[$index],
                'processor' => $processor[$index],
                'created' => $created[$index],
            ));
            $index++;
        }
        return $this->db->insert_batch('architecture', $data);
    }
    public function getDrcEdit($id_drc)
    {
        return $this->db->get_where('drc', ['id_drc' => $id_drc])->row_array();
    }
    public function getAllApplicationbyId($id_drc)
    {
        $query = $this->db->select('apps_id')->get_where('drc', ['apps_id' => $id_drc]);
        $result = $query->row();
        return $result->id_drc;
    }
    public function editDataDrc($id_activity, $result)
    {

        $result = array(
            "apps_id" => $this->input->post('apps_id'),
            "architecture_id" => $this->input->post('architecture_id'),
            "object_pin_name" => $this->input->post('object_pin_name'),
            "object_pin_x" => $this->input->post('object_pin_x'),
            "object_pin_y" => $this->input->post('object_pin_y'),
            "service_description" => $this->input->post('service_description'),
            "service_type" => $this->input->post('service_type'),
            "ip_appdrc" => $this->input->post('ip_appdrc'),
            "webserver" => $this->input->post('webserver'),
            "database" => $this->input->post('database'),
            "framework" => $this->input->post('framework'),
            "api_method" => $this->input->post('api_method'),
            "api_address" => $this->input->post('api_address'),
            "operation_system" => $this->input->post('operation_system'),
            "server_type" => $this->input->post('server_type'),
            "processor" => $this->input->post('processor'),
            "created" => date('Y-m-d', strtotime($_POST['created'])),
        );
        $this->db->where('architecture_id', $id_activity);
        $this->db->update('architecture', $result);
    }

    public function deleteDataDrc($id_drc)
    {
        $this->db->where('architecture_id', $id_drc);
        $this->db->delete('architecture');
    }
    public function getApplication($architecture_id)
    {
        $query = $this->db->select('apps_id')->get_where('architecture', ['architecture_id' => $architecture_id]);
        $result = $query->row();
        return $result->apps_id;
    }
    public function getApps($architecture_id)
    {
        $this->db->select('apps_id');
        $this->db->from('architecture');
        $this->db->where('architecture_id', $architecture_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();

            return $result->apps_id;
        } else {
            return NULL;
        }
    }

    public function getDataDc($id_dc)
    {

        return $this->db->get_where('dc', ['id_dc' => $id_dc])->row_array();
    }
}

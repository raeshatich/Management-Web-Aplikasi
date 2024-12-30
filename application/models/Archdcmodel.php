<?php

class Archdcmodel extends CI_Model
{
    public function getAllApplication($application_id)
    {
        return $this->db->get_where('application', ['application_id' => $application_id])->row_array();
    }


    public function getAllDcRows()
    {
        return $this->db->get('architecture')->num_rows();
    }
    public function getAllDc($apps_id, $limit, $start)
    {
        $this->db->select('*');
        $this->db->from('architecture');
        $this->db->join('application', 'architecture.apps_id = application.application_id');
        $this->db->where('apps_id', $apps_id);
        $this->db->limit($limit, $start);


        return $this->db->get()->result_array();
    }
    public function createDataDc()
    {
        $apps_id = $_POST['apps_id'];
        $object_pin_name = $_POST['object_pin_name'];
        $object_pin_x = $_POST['object_pin_x'];
        $object_pin_y = $_POST['object_pin_y'];
        $service_description = $_POST['service_description'];
        $service_type = $_POST['service_type'];
        $ip_appdc = $_POST['ip_appdc'];
        $ip_webdc = $_POST['ip_webdc'];
        $ip_dbdc = $_POST['ip_dbdc'];
        $ip_dmzdc = $_POST['ip_dmzdc'];
        $webserver = $_POST['webserver'];
        $database = $_POST['database'];
        $framework = $_POST['framework'];
        $api_method = $_POST['api_method'];
        $api_address = $_POST['api_address'];
        $operation_system = $_POST['operation_system'];
        $server_type = $_POST['server_type'];
        $processor = $_POST['processor'];
        $created = date('Y-m-d', strtotime($_POST['created']));
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
                'ip_appdc' => $ip_appdc[$index],
                'ip_webdc' => $ip_webdc[$index],
                'ip_dbdc' => $ip_dbdc[$index],
                'ip_dmzdc' => $ip_dmzdc[$index],
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
    public function getDcSearch($search, $apps_id, $limit, $start)
    {

        $this->db->like('object_pin_name', $search);
        $this->db->or_like('service_description', $search);
        $this->db->or_like('service_type', $search);
        $this->db->or_like('object_pin_x', $search);
        $this->db->or_like('object_pin_y', $search);
        $this->db->or_like('ip_appdc', $search);
        $this->db->or_like('ip_webdc', $search);
        $this->db->or_like('ip_dbdc', $search);
        $this->db->or_like('ip_dmzdc', $search);
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
    public function getDataDc($id_dc)
    {

        return $this->db->get_where('architecture', ['architecture_id' => $id_dc])->row_array();
    }
    public function updateDataDc($id_activity, $result)
    {
        $result = array(
            'apps_id' => $this->input->post('apps_id'),
            'object_pin_name' => $this->input->post('object_pin_name'),
            'object_pin_x' => $this->input->post('object_pin_x'),
            'object_pin_y' => $this->input->post('object_pin_y'),
            'service_description' => $this->input->post('service_description'),
            'service_type' => $this->input->post('service_type'),
            'ip_appdc' => $this->input->post('ip_appdc'),
            'ip_webdc' => $this->input->post('ip_webdc'),
            'ip_dbdc' => $this->input->post('ip_dbdc'),
            'ip_dmzdc' => $this->input->post('ip_dmzdc'),
            'webserver' => $this->input->post('webserver'),
            'database' => $this->input->post('database'),
            'framework' => $this->input->post('framework'),
            'api_method' => $this->input->post('api_method'),
            'api_address' => $this->input->post('api_address'),
            'operation_system' => $this->input->post('operation_system'),
            'server_type' => $this->input->post('server_type'),
            'processor' => $this->input->post('processor'),
            "created" => date('Y-m-d', strtotime($_POST['created'])),
        );
        $this->db->where('architecture_id', $id_activity);
        $this->db->update('architecture', $result);
    }
    public function getApplication($id_dc)
    {
        $this->db->select('*');
        $this->db->from('architecture');
        $this->db->where('architecture_id', $id_dc);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();

            return $result->apps_id;
        } else {
            return NULL;
        }
    }
    public function deleteDataDc($id_drc)
    {
        $this->db->where('architecture_id', $id_drc);
        $this->db->delete('architecture');
    }
}

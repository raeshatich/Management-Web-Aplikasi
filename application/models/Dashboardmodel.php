<?php

class Dashboardmodel extends CI_Model
{
    public function getVcriticalApplication()
    {
        //     $this->db->join('application', 'application.application_id = architecture.apps_id');

        $this->db->select('*');
        $this->db->from('application');
        $this->db->join('app_pic', 'app_pic.id_apps = application.application_id');
        $this->db->join('user', 'user.id_user = app_pic.id_pic');
        $this->db->where('critical', 'Very Critical');
        $this->db->where('status', '1');
        $this->db->order_by('order', 'ASC');
        $this->db->group_by('application_id', 'ASC');

        return $this->db->get()->result_array();
        // $sql = "SELECT * FROM application WHERE status = '1' AND `group` = 'left' ORDER BY `order` ASC";
        // return $this->db->query($sql)->result_array();
    }

    public function getCriticalApplication()
    {
        $this->db->select('*');
        $this->db->from('application');
        $this->db->join('app_pic', 'app_pic.id_apps = application.application_id');
        $this->db->join('user', 'user.id_user = app_pic.id_pic');
        $this->db->where('critical', 'Critical');
        $this->db->where('status', '1');

        $this->db->order_by('order', 'ASC');
        $this->db->group_by('application_id', 'ASC');

        return $this->db->get()->result_array();


        // $sql = "SELECT * FROM application WHERE status = '1' AND `group` = 'right' ORDER BY `order` ASC";
        // return $this->db->query($sql)->result_array();
    }
    public function getModerateApplication()
    {
        $this->db->select('*');
        $this->db->from('application');
        $this->db->join('app_pic', 'app_pic.id_apps = application.application_id');
        $this->db->join('user', 'user.id_user = app_pic.id_pic');
        $this->db->where('critical', 'Moderate');
        $this->db->where('status', '1');

        $this->db->order_by('order', 'ASC');
        $this->db->group_by('application_id', 'ASC');

        return $this->db->get()->result_array();


        // $sql = "SELECT * FROM application WHERE status = '1' AND `group` = 'right' ORDER BY `order` ASC";
        // return $this->db->query($sql)->result_array();
    }
    public function getNoncriticalApplication()
    {
        $this->db->select('*');
        $this->db->from('application');
        $this->db->join('app_pic', 'app_pic.id_apps = application.application_id');
        $this->db->join('user', 'user.id_user = app_pic.id_pic');
        $this->db->where('critical', 'Non Critical');
        $this->db->where('status', '1');

        $this->db->order_by('order', 'ASC');
        $this->db->group_by('application_id', 'ASC');

        return $this->db->get()->result_array();
    }


    public function getDetailApp()
    {
        $this->db->select('*');
        $this->db->from('application');
        $this->db->where('status', '1');
        $this->db->order_by('order', 'ASC'); // Escape the order keyword

        return $this->db->get()->result_array();

        // $sql = "SELECT * FROM application WHERE status = '1' AND `group` = 'right' ORDER BY `order` ASC";
        // return $this->db->query($sql)->result_array();
    }

    public function getDetailAppId($app)
    {

        $this->db->select('*');
        $this->db->from('application');

        $this->db->where('status', '1');
        $this->db->where('application_id', $app);
        return $this->db->get()->result_array();

        //         $sql_application2 = <<<EOF
        // SELECT * FROM application WHERE application_id = '$app' AND status = '1' ORDER BY `order` ASC;
        // EOF;
        //         $data_application2 = sql_select("sysarchi.db", $sql_application2);
    }

    public function getArchitecture($app_id)
    {

        $this->db->select('*');
        $this->db->from('architecture');
        $this->db->join('application', 'application.application_id = architecture.apps_id');
        $this->db->where('architecture.apps_id', $app_id);

        return $this->db->get()->result_array();
    }
    public function getFilterId($application_id)
    {
        return $this->db->get_where('architecture', ['architecture_id' => $application_id])->row_array();
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
    public function getFilterImg($appId)
    {
        $this->db->select('*');
        $this->db->from('app_img');
        $this->db->join('application', 'application.application_id = app_img.id_apps');
        $this->db->where('flag_show', true);
        $this->db->where('id_apps', $appId);
        return $this->db->get()->result_array();
    }
    public function getFilterFile($appId)
    {
        $this->db->select('*');
        $this->db->from('app_file');
        $this->db->join('application', 'application.application_id = app_file.id_apps');
        $this->db->where('flag_show', true);
        $this->db->where('id_apps', $appId);
        return $this->db->get()->result_array();
    }
    public function getCarouselImg($appId)
    {
        $this->db->select('*');
        $this->db->from('app_img');
        $this->db->join('application', 'application.application_id = app_img.id_apps');
        $this->db->where('id_apps', $appId);
        return $this->db->get()->result_array();
    }
    public function getDataApplication($appId)
    {
        $this->db->select('*');
        $this->db->from('application');
        $this->db->join('architecture', 'architecture.id_apps = application.application_id');
        $this->db->where('application.id_apps', $appId);
    }
    public function getFilebyId($appId)
    {
        $this->db->select('*');
        $this->db->from('app_file');
        $this->db->join('application', 'application.application_id = app_file.id_apps');
        $this->db->where('flag_show', 1);

        $this->db->where('application.application_id', $appId);
        return $this->db->get()->row_array();
    }
}

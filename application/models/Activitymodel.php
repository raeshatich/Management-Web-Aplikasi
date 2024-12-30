<?php

class Activitymodel extends CI_Model
{

    public function getAllActivity($limit, $start)
    {
        $this->session->userdata('id_user');

        return $this->db->get('user', $limit, $start)->result_array();
    }
    public function getAllActivityRows()
    {
        return $this->db->get('activity')->num_rows();

    }

    public function createActivity()
    {
        $result = array(
            // "id_activity" => $this->input->post('id_activity'),
            "id_apps" => $this->input->post('id_apps'),
            "id_role" => $this->input->post('id_role'),
            "user_created" => $this->input->post('user_created'),
            "name_activity" => $this->input->post('name'),
            "detail" => $this->input->post('detail'),
            "status_activity" => $this->input->post('status_activity'),
            "date_activity" => $this->input->post('date_activity'),
            "created" => $this->input->post('created'),

        );

        return $this->db->insert('activity', $result);
    }
    public function getRole($application_id)
    {
        $this->db->select('*');
        $this->db->from('app_pic');
        $this->db->join('user', 'user.id_user = app_pic.id_pic');
        $this->db->join('application', 'application.application_id = app_pic.id_apps');

        $this->db->where('user.id_user', $application_id);
        return $this->db->get()->result_array();
    }
    public function getActivityRole($id_activity)
    {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('app_pic', ' user.id_user = app_pic.id_pic');
        $this->db->join('application', ' app_pic.id_apps = application.application_id');
        $this->db->where('user.id_user', $id_activity);

        return $this->db->get()->row_array();
    }
    public function getAppAdmin()
    {
        $this->db->select('*');
        $this->db->from('application');

        return $this->db->get()->result_array();
    }
    public function getUserApp($application_id)
    {
        return $this->db->get_where('user', ['id_user' => $application_id])->row_array();
    }
    public function getDataUser($application_id)
    {

        return $this->db->get_where('user', ['id_user' => $application_id])->row_array();
    }
    public function getDataApplikasi($application_id)
    {
        return $this->db->get_where('application', ['application_id' => $application_id])->row_array();
    }


    public function hapusDataActivity($id_activity)
    {
        $this->db->where('id_activity', $id_activity);
        $this->db->delete('activity');
    }

    public function getActivity($id_activity)
    {
        $this->db->select('id_apps');
        $this->db->from('activity');
        $this->db->where('id_activity', $id_activity);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->id_apps;
        } else {
            return NULL;
        }
    }

    public function getAllApplikasibyId($id_activity)
    {
        $query = $this->db->select('id_role')->get_where('activity', ['id_activity' => $id_activity]);
        $result = $query->row();
        return $result->id_role;
    }
    public function getActivityEdit($id_activity)
    {

        return $this->db->get_where('activity', ['id_activity' => $id_activity])->row_array();
    }

    public function getActivityPic($id_activity)
    // $this->db->join('application', 'activity.id_apps = application.application_id');
    {
        $this->db->select('*');
        $this->db->from('activity');
        $this->db->join('user', 'activity.id_role = user.id_user');
        $this->db->join('app_pic', ' user.id_user = app_pic.id_pic');
        $this->db->join('application', ' app_pic.id_apps = application.application_id');
        $this->db->where('activity.id_activity', $id_activity);
        return $this->db->get()->result_array();
    }
    public function getActivityJoin($application_id)
    {

        $this->db->select('*');
        $this->db->from('activity');
        $this->db->join('application', 'application.application_id = activity.id_apps');
        $this->db->where('activity.id_activity', $application_id);
        return $this->db->get()->result_array();
    }

    public function getActivityAll($application_id)
    {
        $this->db->select('*');
        $this->db->from('app_pic');
        $this->db->join('pic_role', 'app_pic.id_pic = pic_role.id_role');
        $this->db->join('application', 'app_pic.id_apps = application.application_id');
        $this->db->where('application.application_id', $application_id);
        echo $this->db->last_query();
        return $this->db->get()->result_array();
    }


    public function editDataActivity($id_activity, $result)
    {
        $this->db->where('id_activity', $id_activity);
        $this->db->update('activity', $result);
    }

    public function getAllUser($user_id)
    {
        return $this->db->get_where('user', ['id' => $user_id])->row_array();
    }
    public function getUser($role_id)
    {
        $this->db->select('user.*, pic_role.*');
        $this->db->from('user');
        $this->db->join('pic_role', 'user.user_pic = pic_role.id_role');
        $this->db->where('user.user_pic', $role_id);
        return $this->db->get()->result_array();
    }
    public function getActivityUser($idrole)
    {

        $this->db->select('a.id_activity, a.id_apps, a.id_role, a.name_activity, a.detail, 
        a.status_activity, a.date_activity, a.user_created, a.created, application.name_apps,user.pic_name');
        $this->db->from('activity as a');
        $this->db->join('user', 'a.id_role = user.id_user');
        $this->db->join('application', 'application.application_id = a.id_apps');

        $this->db->where('a.id_role', $idrole);

        return $this->db->get()->result_array();
    }
    public function getActivityAdmin($application_id)
    {
        $this->db->select('*');
        $this->db->from('activity');
        $this->db->join('user', 'activity.id_role = user.id_user');
        $this->db->join('application', 'application.application_id = activity.id_apps');
        $this->db->where('activity.id_role', $application_id);


        return $this->db->get()->result_array();
    }

    public function getFilterAdmin($application_id, $start_date, $end_date, $status)
    {

        $this->db->select('*');
        $this->db->from('activity');
        $this->db->join('user', 'activity.id_role = user.id_user');
        $this->db->join('application', 'application.application_id = activity.id_apps');

        $this->db->where('activity.id_role', $application_id);
        if (!empty($status)) {

            $this->db->where('status_activity', $status);
        }

        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('date_activity >=', $start_date);
            $this->db->where('date_activity <=', $end_date);
        }
        return $this->db->get()->result();
    }
    public function getFilterUser($id_role, $status, $start_date, $end_date, $limit, $start)
    {

        $this->db->select('*');
        $this->db->from('activity');
        $this->db->join('user', 'activity.id_role = user.id_user');
        $this->db->join('application', 'application.application_id = activity.id_apps');
        $this->db->where('activity.id_role', $id_role);

        if (!empty($status)) {

            $this->db->where('status_activity', $status);
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('date_activity >=', $start_date);
            $this->db->where('date_activity <=', $end_date);
        }
        $this->db->limit($limit, $start);

        return $this->db->get()->result_array();
    }

    public function getSearchUser($find, $id_role)
    {
        $this->db->select('*');
        $this->db->from('activity');
        $this->db->join('user', 'activity.id_role = user.id_user');
        $this->db->join('application', 'application.application_id = activity.id_apps');

        $this->db->like('name_activity', $find);
        $this->db->or_like('detail', $find);
        $this->db->or_like('name_apps', $find);
        $this->db->or_like('status_activity', $find);
        $this->db->where('activity.id_role', $id_role);

        return $this->db->get()->result_array();
    }
    public function getSearchAdmin($find)
    {
        $this->db->select('*');
        $this->db->from('activity');
        $this->db->join('user', 'activity.id_role = user.id_user');
        $this->db->join('application', 'application.application_id = activity.id_apps');
        $this->db->like('name_activity  ', $find);
        $this->db->or_like('detail', $find);
        $this->db->or_like('name_apps', $find);
        return $this->db->get()->result_array();
    }
    public function exportList($id_role, $end_date, $start_date, $status)
    {
        $this->db->select(
            '*'
            // array('name_activity', 'name_apps', 'detail', 'status_activity', 'date_activity')
        );
        $this->db->from('activity');
        $this->db->join('user', 'activity.id_role = user.id_user');
        $this->db->join('application', 'application.application_id = activity.id_apps');
        $this->db->where('activity.id_role', $id_role);

        if (!empty($status)) {
            $this->db->where('status_activity', $status);
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('status_activity', $status);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function getExportUser($id_role)
    {

        $this->db->select(
            '*'
            // array('name_activity', 'name_apps', 'detail', 'status_activity', 'date_activity')
        );
        $this->db->from('activity');
        $this->db->join('user', 'activity.id_role = user.id_user');
        $this->db->join('application', 'application.application_id = activity.id_apps');
        $this->db->where('activity.id_role', $id_role);
        $query = $this->db->get();
        return $query->result();
    }

    public function getTahun()
    {

        $this->db->select('YEAR(date_activity) AS year');
        $this->db->from('activity');
        $this->db->group_by('YEAR(date_activity)');
        $this->db->order('YEAR(date_activity)');
    }
}

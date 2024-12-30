<?php

class Architecturemodel extends CI_Model
{
    public function getAllActivity($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('architecture_id', $keyword);
            $this->db->or_like('service_type', $keyword);
        }
        return $this->db->get('architecture', $limit, $start, $keyword)->result_array();
    }
    public function tambahDataArchitecture($data)
    {

        return $this->db->insert_batch('architecture', $data);
    }

    public function getArchitectureEdit($architecture_id)
    {

        return $this->db->get_where('architecture', ['architecture_id' => $architecture_id])->row_array();
    }

    public function editDataArchitecture($architecture_id, $result)
    {
        $this->db->where('architecture_id', $architecture_id);
        $this->db->update('architecture', $result);
    }

    public function getAllApplikasibyId($architecture_id)
    {
        $query = $this->db->select('apps_id')->get_where('architecture', ['architecture_id' => $architecture_id]);
        $result = $query->row();
        return $result->apps_id;
    }

    public function hapusDataArchitecture($architecture_id)
    {
        $this->db->where('architecture_id', $architecture_id);
        $this->db->delete('architecture');
    }

    public function getApplication($architecture_id)
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

    public function getArchitectureSearch($keyword, $limit, $start)
    {
        $this->db->limit($limit, $start);

        $query = $this->db->like('name_apps', $keyword)
            ->or_like('description', $keyword)
            ->or_like('dns_address', $keyword)
            ->or_like('pic_dev', $keyword)
            ->or_like('pic_pmo', $keyword)
            ->or_like('pic_po', $keyword)
            ->or_like('order', $keyword)
            ->or_like('critical', $keyword)
            ->or_like('category', $keyword)
            ->get('application');
        return $query->result_array();
    }

    public function getArch($appId)
    {
        $this->db->select('*');
        $this->db->from('architecture');
        $this->db->join('application', 'architecture.apps_id = application.application_id');
        $this->db->where('architecture.apps_id', $appId);

        return $this->db->get()->row_array();
    }
}

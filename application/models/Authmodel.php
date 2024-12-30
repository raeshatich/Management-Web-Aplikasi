<?php

class Authmodel extends CI_Model
{
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }
    public function getUser($id)
    {
        $this->db->select('id_user');
        $this->db->from('user');
        $this->db->where('id_user', $id);
        return $this->db->get()->result_array();
    }

    public function getDatabyId($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->get('user');
        $data =  $query->row_array();
        echo json_encode($data);
    }

    public function updateDataUser($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }
    public function updatePasswordUser($password, $data)
    {
        $this->db->where('password', $password);
        $this->db->update('user', $data);
    }
    public function hapusDataRole($id_role)
    {
        $this->db->where('id_role', $id_role);
        $this->db->delete('pic_role');
    }
    public function getRole($id_role)
    {
        $this->db->select('id_role');
        $this->db->from('pic_role');
        $this->db->where('id_role', $id_role);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();

            return $result->id_role;
        } else {
            return NULL;
        }
    }
}

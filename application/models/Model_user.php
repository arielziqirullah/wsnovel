<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    public function check_user($email, $password)
    {
        return $this->db->get_where('user', ['email' => $email, 'password' => $password]);
    }

    public function registrasiPenulis($data)
    {
        $this->db->insert('user', $data);
    }

    public function dataAdmin()
    {
        return $this->db->get('data_novel')->result_array();
    }

    public function dataPenulis($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function novelPenulis($id)
    {
        return $this->db->get_where('data_novel', ['id_penulis' => $id])->result_array();
    }

    public function showNovel($id)
    {
        $this->db->select('dn.photo as p, dn.title as t, dn.contents as c, u.name as n');
        $this->db->join('user as u', 'u.id = dn.id_penulis');
        return $this->db->get_where('data_novel as dn', ['dn.id' => $id])->row_array();
    }

    public function showDataNovel($id)
    {
        return $this->db->get_where('data_novel', ['id' => $id])->row_array();
    }

    public function tambahdata($data)
    {
        $this->db->set('date', 'NOW()', FALSE);
        $this->db->insert('data_novel', $data);
    }

    public function ubahdata($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('data_novel', $data);
    }
}

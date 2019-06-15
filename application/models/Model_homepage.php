<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_homepage extends CI_Model
{
    public function show_category()
    {
        $this->db->group_by('category');
        return $this->db->get('data_novel')->result_array();
    }

    public function show_novel_all()
    {
        $this->db->limit(4);
        $this->db->order_by('id', 'DESC');
        return $this->db->get('data_novel')->result();
    }

    public function shownovel()
    {
        return $this->db->get_where('data_novel', ['id' => $id])->row_array();
    }

    public function get_novel($cari)
    {
        $this->db->like('title', $cari);
        return $this->db->get('data_novel')->result_array();
    }

    public function show_random()
    {
        $this->db->order_by('title', 'RANDOM');
        return $this->db->get('data_novel')->row_array();
    }

    public function category_drama()
    {
        $this->db->limit(4);
        $this->db->like('category', 'Drama');
        return $this->db->get('data_novel')->result_array();
    }

    public function category_humor()
    {
        $this->db->limit(4);
        $this->db->like('category', 'Humor');
        return $this->db->get('data_novel')->result_array();
    }
}

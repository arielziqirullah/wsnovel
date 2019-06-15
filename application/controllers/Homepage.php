<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function index()
    {

        $data = [
            'judul' => "WS Novel",
            'category_drama' => $this->model_homepage->category_drama(),
            'category_humor' => $this->model_homepage->category_humor(),
            'data_novel' => $this->model_homepage->show_novel_all(),
            'random_novel' => $this->model_homepage->show_random()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('homepage/homepage', $data);
        $this->load->view('templates/footer');
    }

    public function bacanovel($id)
    {
        $data['judul'] = "Baca Novel";
        $data['novel'] = $this->model_user->showNovel($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('homepage/view_bacanovel', $data);
        $this->load->view('templates/footer');
    }

    public function cari()
    {
        if (isset($_POST['cari'])) {
            $cari = $this->input->post('carinovel');
            $data['judul'] = "Hasil Pencarian";
            $data['pencarian'] = $this->model_homepage->get_novel($cari);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('homepage/view_pencarian', $data);
            $this->load->view('templates/footer');
        }
    }
}

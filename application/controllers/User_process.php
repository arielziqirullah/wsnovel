<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_process extends CI_Controller
{
    public function admin()
    {
        $this->check_login();
        $data['judul'] = "Halaman Admin";
        $data['novel'] = $this->model_user->dataAdmin();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/view_admin', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $this->check_login();
        $email = $this->session->userdata('email');
        $data['judul'] = "Profile Penulis";
        $data['user'] = $this->model_user->dataPenulis($email);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penulis/view_profile', $data);
        $this->load->view('templates/footer');
    }

    public function penulis()
    {
        $this->check_login();
        $data['judul'] = "Panel Penulis";
        $data['novel'] = $this->db->get('data_novel')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penulis/view_tulis', $data);
        $this->load->view('templates/footer');
    }

    public function tambahdata()
    {
        $id = $this->session->userdata('id');
        if (isset($_POST['btntambah'])) {
            $input = $this->input->post();
            $config = array(
                'upload_path'   => './assets/images/',
                'max_size'      => 2048,
                'allowed_types' => 'jpg|jpeg|png'
            );
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data();
                $data = [
                    'id_penulis' => $id,
                    'photo' => $gambar['file_name'],
                    'title' => htmlspecialchars($input['judul']),
                    'category' => htmlspecialchars($input['kategori']),
                    'description' => htmlspecialchars($input['deskripsi']),
                    'contents' => htmlspecialchars($input['konten'])
                ];
                $this->model_user->tambahdata($data);
                $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">Novel berhasil ditambahkan!</div>');
                redirect('user_process/daftarnovel');
            } else {
                $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">Novel gagal ditambahkan!</div>');
                redirect('user_process/penulis');
            }
        }
    }


    public function daftarnovel()
    {
        $this->check_login();
        $id = $this->session->userdata('id');
        $data['judul'] = "Daftar novel";
        $data['novel'] = $this->model_user->novelPenulis($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penulis/view_daftarnovel', $data);
        $this->load->view('templates/footer');
    }

    public function editnovel($id)
    {
        $this->check_login();
        $data['judul'] = "Edit Novel";
        $data['novel'] = $this->model_user->showDataNovel($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penulis/view_editnovel', $data);
        $this->load->view('templates/footer');
        if (isset($_POST['btncoveredit'])) {
            $input = $this->input->post();
            $config = array(
                'upload_path'   => './assets/images/',
                'max_size'      => 2048,
                'allowed_types' => 'jpg|jpeg|png'
            );
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data();
                $data = ['photo' => $gambar['file_name']];
                $this->model_user->ubahdata($id, $data);
                $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">Cover berhasil ditambahkan!</div>');
                redirect('user_process/daftarnovel');
            } else {
                $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">Cover gagal ditambahkan!</div>');
                redirect('user_process/editnovel');
            }
        } else if (isset($_POST['btnedit'])) {
            $input = $this->input->post();
            $data = array(
                'title' => $input['judul'],
                'category' => $input['kategori'],
                'description' => $input['deskripsi'],
                'contents' => $input['konten']
            );
            $this->model_user->ubahdata($id, $data);
            $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            redirect('user_process/daftarnovel');
        }
    }


    public function deletenovel($id)
    {
        $this->db->delete('data_novel', ['id' => $id]);
        $this->session->set_flashdata('notif', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus!
            </div>');
        redirect('user_process/daftarnovel');
    }

    public function deletenoveladmin($id)
    {
        $this->db->delete('data_novel', ['id' => $id]);
        $this->session->set_flashdata('notif', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus!
            </div>');
        redirect('user_process/admin');
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $email = $this->input->post('email');
            $password = sha1($this->input->post('password'));
            $check = $this->model_user->check_user($email, $password);

            if ($check->num_rows() > 0) {
                foreach ($check->result() as $data) {
                    $row = [
                        'id' => $data->id,
                        'role' => $data->role,
                        'email' => $data->email
                    ];
                    $this->session->set_userdata($row);
                    if ($row['role'] == 'admin') {
                        redirect('homepage');
                    } else if ($row['role'] == 'penulis') {
                        redirect('homepage');
                    } else {
                        redirect('homepage');
                    }
                }
            } else {
                $this->session->set_flashdata('notif', 'Silahkan Login terlebih dahulu!');
                redirect('homepage');
            }
        } else {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('homepage');
        }
    }

    public function registration()
    {
        $input = $this->input->post();
        $data = [
            'name' => htmlspecialchars($input['nama']),
            'photo' => 'default.jpg',
            'email' => htmlspecialchars($input['email']),
            'password' => sha1($input['password']),
            'role' => 'penulis',
            'is_active' => 1
        ];

        $this->model_user->registrasiPenulis($data);
        $this->session->set_flashdata('notif', 'berhasil daftar');
        redirect('homepage');
    }

    public function check_login()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('notif', '
            <div class="alert alert-danger" role="alert">
                Silahkan login terlebih dahulu! 
            </div>
            ');
            redirect('homepage');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('homepage');
    }
}

<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id_admin')){
			redirect('loginuser/login');
		}
		else {
            $this->load->model('administator');
			$this->load->model('useradmin');
			$this->load->helper('user_helper');
		}
	}


	//================Profil Admin==================
    //Page Profil Admin
    public function myprofile(){
        $user = $this->session->userdata('id_admin');

        if(empty($user)){
            redirect('dashboard/home');
        }else{
            $this->load->helper('text');
            $data['headertitle'] = 'My Profile';
	        $data['title'] = 'My Profile';
	        $data['menu_induk'] = '';
	        $data['menu'] = '';

            $notifikasi = $this->administator->get_notification()->num_rows();
            $data['notifikasi'] = $notifikasi;
            $data['profiltoko'] = $this->administator->get_profiltoko()->row();

            $where['id_admin'] = $user;

            $cek = $this->administator->get_data_where($where,'tbl_admin')->row();

            $data['id'] = $cek->id;
            $data['id_admin'] = $user;
            $data['nama'] = $cek->nama;
            $data['username'] = $cek->username;
            $data['email'] = $cek->email;
            $data['telepon'] = $cek->telepon;
            $data['gender'] = $cek->gender;
            $data['level'] = $cek->level;

            $this->load->view('dashboard/profil/v_profiladmin',$data);
        }        
    }

    //Update Admin
    public function update_admin(){
    
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $gender = $this->input->post('gender');

        $where['id'] = $id;

        $update['nama'] = $nama;
        $update['username'] = $username;
        $update['email'] = $email;
        $update['telepon'] = $telepon;
        $update['gender'] = $gender;

        $this->administator->update_data($where,$update,'tbl_admin');
    }

    //==========PASSWORD ADMIN=================
    //Page Ubah Password 
    public function ubahpassword(){
        $user = $this->session->userdata('id_admin');

        if(empty($user)){
            redirect('dashboard/home');
        }else{
            $data['headertitle'] = 'Ubah Password';
            $data['title'] = 'Password';
            $data['menu'] = '';
            $data['menu_induk'] = '';

            $notifikasi = $this->administator->get_notification()->num_rows();
            $data['notifikasi'] = $notifikasi;
            $data['profiltoko'] = $this->administator->get_profiltoko()->row();

            $where['id_admin'] = $user;

            $cek = $this->administator->get_data_where($where,'tbl_admin')->row();

            $data['id'] = $cek->id;
            $data['id_admin'] = $user;
            $data['nama'] = $cek->nama;
            $data['username'] = $cek->username;
            $data['email'] = $cek->email;
            $data['telepon'] = $cek->telepon;
            $data['gender'] = $cek->gender;
            $data['level'] = $cek->level;

            $this->load->view('dashboard/profil/v_ubahpasswordadmin', $data);
        }   
    } 

    //Update Password
    public function update_password(){
        
        $id = $this->input->post('id');
        $id_admin = $this->input->post('id_admin');

        //pasword sekarang
        $currentpassword = $this ->input->post('currentpassword');
        //pasword baru
        $newpassword = $this->input->post('newpassword');
        //konfirmasi password baru
        $confirmpassword = $this->input->post('confirmpassword');

        $where['id_admin'] = $id_admin;

        $cek = $this->useradmin->get_data_where($where,'tbl_admin')->row();
        $password = $cek->password;

        //mengecek pasword skrng sama dengan password di database
        if ($currentpassword!=$password) {
            $response['status'] = 'gagal';
            $response['pesan'] = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Anda Salah!</div>';
        }else{
            //mengecek konfirmasi password benar
            if ($newpassword!=$confirmpassword) {
                    $response['status'] = 'gagal';
                    $response['pesan'] = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>konfirmasi Password Anda Salah!</div>';
            }elseif ($password==$newpassword) {
                    $response['status'] = 'gagal';
                    $response['pesan'] = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Baru Tidak Boleh Sama Dengan Password Lama!</div>';
            }else{
                $update['password'] = $newpassword;
                $this->useradmin->update_data($where,$update,'tbl_admin');

                $response['status'] = 'berhasil';
                $response['pesan'] = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fas fa-check"></i>Password Berhasil Diubah!</div>';
            }
        }
        echo json_encode($response);
    }
}?>
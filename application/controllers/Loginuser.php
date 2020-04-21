<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginuser extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->helper('cookie');
        $this->load->model('administator');
    }

    public function index()
    {
    	redirect('loginuser/login');
    }	

    //Page Login ADMIN
	public function login()
	{
		$data['headertitle'] = 'Login';

		$this->load->view('loginuser/loginadmin/loginadmin',$data);
	}

	//Aksi Login
	public function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		/*$where['username'] = $username;
		$where['password'] = md5($password);*/
		/*$where = array(
			'username' => $username,
			'password' => md5($password)
			);*/
		$cek = $this->administator->login_admin($username,$password);
		if($cek->num_rows() == 1){
					
                $cookie = array(
                        'name'   => 'cookie_dashboard',
                        'value'  => $username,                            
                        //'expire' => 3600, //30D
                        'expire' => 1209600 //2 week
                        //'secure' => TRUE
                );
        	    set_cookie($cookie);

        	    $cekrows = $cek->row();
        	    $id = $cekrows->id;
        	    $id_admin = $cekrows->id_admin;
        	    $nama = $cekrows->nama;
        	    $level = $cekrows->level;
        	    $gender = $cekrows->gender;

			$data_session = array(
				'id' => $id,
				'id_admin' => $id_admin,
				'namaadmin' => $nama,
				'level' => $level,
				'gender' => $gender, 
				'status' => "login"
			);
 
			$this->session->set_userdata($data_session);

			redirect('dashboard/index');
		}
		else{
			$this->session->set_flashdata('error','Username atau Password Salah!');

			redirect('loginuser/login');
		}
	}

	//Logout
	public function logout()
	{
		$this->session->sess_destroy();
		delete_cookie('cookie_dashboard');

		redirect('loginuser/login');
	}
}
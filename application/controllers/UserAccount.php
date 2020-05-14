<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAccount extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
            $this->load->model('administator');
			$this->load->model('useradmin');
			$this->load->helper('user_helper');
            $this->load->helper('cookie'); 
	}

	public function index(){
		redirect('useraccount/login');
	} 
    //=========Login User============
    //Page Login User
	public function login(){
        $where['status']=1;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();
        $data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
        $data['dataslider'] = $this->administator->get_data_where($where, 'tbl_slider')->result();
        $data['headertitle'] = 'Login';
        $data['menu'] = 'home';

        $id_user = $this->session->userdata('id_user');
        $jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
        $data['item_cart'] = $jml_item;

		$this->load->view('web/account/v_login',$data);
	}

    //Cek Login User
	public function cek_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$cek = $this->administator->login($username,$password,'tbl_user');
		if($cek->num_rows() == 1){
					
                $cookie = array(
                        'name'   => 'cookie_shop',
                        'value'  => $username,                            
                        'expire' => 3600, //30D
                        //'expire' => 1209600 //2 week
                        'secure' => TRUE
                );
        	    set_cookie($cookie);

        	    $cekrows = $cek->row();
        	    $id = $cekrows->id;
        	    $id_user = $cekrows->id_user;
        	    $nama = $cekrows->nama;
        	    $email = $cekrows->email;
        	    $foto = $cekrows->foto;
        	    $gender = $cekrows->gender;

			$data_session = array(
				'id' => $id,
				'id_user' => $id_user,
				'nama' => $nama,
				'email' => $email,
				'gender' => $gender, 
				'foto' => $foto, 
				'status' => "login"
			);
 
			$this->session->set_userdata($data_session);

			redirect('shop/home');
		}
		else{
            $txterror = '<div class="alert alert-danger alert-dismissible text-left">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-user"></i>
                            Username atau Password Salah!
                        </div>';
			$this->session->set_flashdata('error',$txterror);

			redirect('useraccount/login');
		}
	}

    //Logout
	public function logout()
	{
		$this->session->sess_destroy();
		delete_cookie('cookie_shop');

		redirect('shop/home');
	}

    //Page My Account
	public function myaccount(){
        $id_user = $this->session->userdata('id_user');
        if (empty($id_user)) {
            redirect('shop/home');
        }else{
          $where['status']=1;
          $data['profiltoko'] = $this->administator->get_profiltoko()->row();
          $data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
          $data['headertitle'] = 'Akun Saya';
          $data['menu'] = '';

          $jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
          $data['item_cart'] = $jml_item;

          $where2['id_user'] = $id_user;
          $data['akun'] = $this->administator->get_data_where($where2, 'tbl_user')->row();

          $this->load->view('web/account/v_myaccount',$data);
      }
	}

    //Page Ubah Profil
	public function ubahprofil(){
        $id_user = $this->session->userdata('id_user');
        if (empty($id_user)) {
            redirect('shop/home');
        }else{
          $where['status']=1;
          $data['profiltoko'] = $this->administator->get_profiltoko()->row();
          $data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
          $data['headertitle'] = 'Ubah Profil';
          $data['menu'] = '';

          $id_user = $this->session->userdata('id_user');
          $jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
          $data['item_cart'] = $jml_item;

          $where2['id_user'] = $id_user;
          $data['akun'] = $this->administator->get_data_where($where2, 'tbl_user')->row();

          $this->load->view('web/account/v_ubahprofil',$data);
      }
	}

    //Update Profil
	public function update_profil(){

		$id = $this->input->post('id');
		$id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');
        $gender = $this->input->post('gender');

        $where2['id'] = $id;

        $cekpic = $this->administator->get_data_where($where2,'tbl_user')->row();

        if(!empty($_FILES['picture']['name'])){

            $config['upload_path']   = './images/profil_pic/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 5000;
            //$config['min_size'] = 500;
            $newname = pathinfo($_FILES['picture']['name'], PATHINFO_FILENAME);
            $newname = str_replace(',', '_', $newname);
            $newname = str_replace('.', '_', $newname);
            $newname = str_replace('"', '_', $newname);
            $newname = str_replace("'", "_", $newname);
            $newname = str_replace(' ', '_', $newname);
            $config['file_name'] = $newname;

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, TRUE);
            }

            $this->load->library('upload', $config);
                 
            if ( ! $this->upload->do_upload('picture')){
                $text['pesan'] = '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i>Gagal Upload Foto</h5>'.$this->upload->display_errors();'! </div>';
                $text['status'] = "gagal";
                echo json_encode($text);
                exit();
            }
            else{
                $upload_data = $this->upload->data();
                $picture = $upload_data['file_name'];
            }
        }
        else{
            $picture = $cekpic->foto;
        }

        
        $where['id'] = $id;

        $update['nama'] = $nama;
        $update['username'] = $username;
        $update['email'] = $email;
        $update['telepon'] = $telepon;
        $update['alamat'] = $alamat;
        $update['gender'] = $gender;
        $update['foto'] = $picture;


        $this->administator->update_data($where,$update,'tbl_user');
        $response['pesan'] = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Tersimpan!</div>';
        $response['status'] = "sukses";
        echo json_encode($response);
	}

    //Page Ubah Password
	public function ubahpassword()
	{
        $id_user = $this->session->userdata('id_user');
        if (empty($id_user)) {
            redirect('shop/home');
        }else{
          $where['status']=1;
          $data['profiltoko'] = $this->administator->get_profiltoko()->row();
          $data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
          $data['headertitle'] = 'Ubah Password';
          $data['menu'] = '';

          $id_user = $this->session->userdata('id_user');
          $jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
          $data['item_cart'] = $jml_item;

          $where2['id_user'] = $id_user;
          $data['akun'] = $this->administator->get_data_where($where2, 'tbl_user')->row();

          $this->load->view('web/account/v_ubahpassword',$data);
      }
	}

    //Update Password
	public function update_password(){
        
        $id = $this->input->post('id');
        $id_user = $this->input->post('id_user');

        //pasword sekarang
        $currentpassword = $this ->input->post('currentpassword');
        //pasword baru
        $newpassword = $this->input->post('newpassword');
        //konfirmasi password baru
        $confirmpassword = $this->input->post('confirmpassword');

        $where['id_user'] = $id_user;

        $cek = $this->administator->get_data_where($where,'tbl_user')->row();
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
                $this->administator->update_data($where,$update,'tbl_user');

                $response['status'] = 'berhasil';
                $response['pesan'] = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fas fa-check"></i>Password Berhasil Diubah!</div>';
            }
        }
        echo json_encode($response);
    }

    //============ Register ===========
    //Page Registrasi
    public function register(){
        $where['status']=1;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();
        $data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
        $data['headertitle'] = 'Daftar Akun';
        $data['menu'] = '';

        $id_user = $this->session->userdata('id_user');
        $jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
        $data['item_cart'] = $jml_item;

        $this->load->view('web/account/v_register',$data);
    }

    //Registrasi
    public function simpan_register(){

        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $gender = $this->input->post('gender');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');

        $cek_id_user = $this->administator->cek_id_user_max('tbl_user')->row();
        if (!empty($cek_id_user)) {
            $id_user_max = $cek_id_user->id_user;
            $id_user_ex = explode('-', $id_user_max);
            $id_user_num = $id_user_ex[1];
            $id_user = cek_id_user($id_user_num);
            $iduser = id_user($id_user);
        }else{
            $iduser = 'USER-001';
        }

        $where['email'] = $email;

        $cek = $this->administator->get_data_where($where,'tbl_user');
        $jumlahdata = $cek->num_rows();

        if ($jumlahdata>0) {
            $response['status'] = 'gagal';

            $response['pesan'] =  '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i> Email Sudah Terdaftar</h5> Email sudah pernah digunakan, Silahkan ganti email! </div>';
        }
        else{
            if(!empty($_FILES['picture']['name'])){

                $config['upload_path']   = './images/profil_pic/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 1500;
                $newname = pathinfo($_FILES['picture']['name'], PATHINFO_FILENAME);
                $newname = str_replace(',', '_', $newname);
                $newname = str_replace('.', '_', $newname);
                $newname = str_replace('"', '_', $newname);
                $newname = str_replace("'", "_", $newname);
                $newname = str_replace(' ', '_', $newname);
                $config['file_name'] = $newname;

                if (!is_dir($config['upload_path'])) {
                    mkdir($config['upload_path'], 0777, TRUE);
                }

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('picture')){
                    $response['pesan'] = '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i>Gagal Upload Foto</h5>'.$this->upload->display_errors();'! </div>';
                    $response['status'] = "gagal";
                    echo json_encode($response);
                    exit();
                }
                else{
                    $upload_data = $this->upload->data();
                    $picture_name = $upload_data['file_name'];

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    /* setelah diresize kita buat thumbnailnya */
                    $conf['image_library'] = 'gd2';
                    $conf['source_image'] = './images/profil_pic/'.$picture_name;
                    $conf['new_image'] = './images/profil_pic_thumb/'.$picture_name;
                    $conf['create_thumb'] = TRUE;
                    $conf['maintain_ratio'] = TRUE;
                    $conf['width'] = 1500;
                //$conf['height'] = 108;

                    $this->load->library('image_lib', $conf);
                    $this->image_lib->initialize($conf);
                    $this->image_lib->resize();
                }
            }else{
                $picture_name= 'no-photo.png';
            }

            $lvl = '1';

            $input['id_user'] = $iduser;
            $input['nama'] = $nama;
            $input['username'] = $username;
            $input['password'] = $password;
            $input['email'] = $email;
            $input['telepon'] = $telepon;
            $input['level'] = $lvl; 
            $input['gender'] = $gender; 
            $input['alamat'] = $alamat; 
            $input['foto']=$picture_name;

            $this->administator->input_data($input,'tbl_user');
            $response['pesan'] = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Akun Berhasil Didaftarkan, Silahkan Login!</div>';
            $response['status'] = "sukses";
        }
        echo json_encode($response);
    }

    //=======History Pemesanan======
    //Page History
    public function history(){        
        $where['status']=1;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();
        $data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
        $data['headertitle'] = 'Order History';
        $data['title'] = 'Invoice';
        $data['menu'] = '';

        $id_user = $this->session->userdata('id_user');
        $jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
        $data['item_cart'] = $jml_item;

        $this->load->view('web/account/v_history',$data);
    }

    //Get History
    public function get_history(){
        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');

        $id_user = $this->session->userdata('id_user');

        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;
        
        if (empty($status)) {
            $where = array(
                'tbl_checkout.id_user' => $id_user
            );
        }
        if ($status=="1") {
            $where = array(
                'tbl_checkout.id_user' => $id_user,
                'tbl_checkout.status' => 1
            );
        }
        if ($status=="2") {
            $where = array(
                'tbl_checkout.id_user' => $id_user,
                'tbl_checkout.status' => 2
            );
        }
        if (!empty($cari)) {
            $like2['tbl_checkout.id_invoice'] = $cari;
            $like['tbl_checkout.nama_penerima'] = $cari;
        }
        else {
            $like = NULL;
            $like2 = NULL;
        }
        $data['list_checkout'] = $this->administator->get_data_cond_two_join_checkout($where,$like,$like2,'id','ASC',$offset,$dataPerPage)->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('web/account/tabel_history', $data);
    }

    //Paging History
    public function paging_history(){
        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');

        $id_user = $this->session->userdata('id_user');

        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }

        if (empty($status)) {
            $where = array(
                'tbl_checkout.id_user' => $id_user
            );
        }
        if ($status=="1") {
            $where = array(
                'tbl_checkout.id_user' => $id_user,
                'tbl_checkout.status' => 1
            );
        }
        if ($status=="2") {
            $where = array(
                'tbl_checkout.id_user' => $id_user,
                'tbl_checkout.status' => 2
            );
        }
        if (!empty($cari)) {
            $like2['tbl_checkout.id_invoice'] = $cari;
            $like['tbl_checkout.nama_penerima'] = $cari;
        }
        else {
            $like = NULL;
            $like2 = NULL;
        }
        $jumData = $this->administator->get_paging_cond_two_join_checkout($where,$like,$like2)->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('web/account/paging_history', $data);
    }

}?>
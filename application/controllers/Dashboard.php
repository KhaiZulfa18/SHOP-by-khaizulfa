<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id_admin')){
			redirect('loginuser/login');
		}
		else {
            $this->load->model('administator');
			$this->load->model('useradmin');
			$this->load->helper('user_helper');
            $this->load->helper('text');             
		}
	}

	public function index(){
		redirect('dashboard/home');
	}

    //Page Home
	public function home(){
		$data['headertitle'] = 'Dashboard';
        $data['title'] = 'Home' ;
		$data['menu_induk'] = 'home';
		$data['menu'] = 'home';

        $data['jml_user'] = $this->administator->get_jml_user()->num_rows();
        $data['jml_produk'] = $this->administator->get_jml_produk()->num_rows();
        $data['jml_penjualan'] = $this->administator->get_jml_penjualan()->num_rows();
        $data['jml_pendapatan'] = $this->administator->get_jml_pendapatan();
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $thn = date('Y');
        $data['januari'] = $this->administator->get_chart('01',$thn);
        $data['februari'] = $this->administator->get_chart('02',$thn);
        $data['maret'] = $this->administator->get_chart('03',$thn);
        $data['april'] = $this->administator->get_chart('04',$thn);
        $data['mei'] = $this->administator->get_chart('05',$thn);
        $data['juni'] = $this->administator->get_chart('06',$thn);
        $data['juli'] = $this->administator->get_chart('07',$thn);
        $data['agustus'] = $this->administator->get_chart('08',$thn);
        $data['september'] = $this->administator->get_chart('09',$thn);
        $data['oktober'] = $this->administator->get_chart('10',$thn);
        $data['november'] = $this->administator->get_chart('11',$thn);
        $data['desember'] = $this->administator->get_chart('12',$thn);

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;

		$this->load->view('dashboard/home/v_home',$data);
	}

    //============ Admin ================ 
    //Page Input Admin
	public function input_admin(){
		$data['headertitle'] = 'Input Admin';
        $data['title'] = 'Admin';
		$data['menu_induk'] = 'admin';
		$data['menu'] = 'input_admin';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

		$this->load->view('dashboard/admin/v_inputadmin',$data);
	}

    //Insert Admin
	public function simpan_admin(){

		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
        $gender = $this->input->post('gender');
		$telepon = $this->input->post('telepon');

        $cek_id_admin = $this->administator->cek_id_admin_max('tbl_admin')->row();
        if (!empty($cek_id_admin)) {
            $id_admin_max = $cek_id_admin->id_admin;
            $id_admin_ex = explode('-', $id_admin_max);
            $id_admin_num = $id_admin_ex[1];
            $id_admin = cek_id_admin($id_admin_num);
            $idadmin = id_admin($id_admin);
        }else{
            $idadmin = 'ADM-001';
        }
        
		$lvl = '1';

        $input['id_admin'] = $idadmin;
		$input['nama'] = $nama;
		$input['username'] = $username;
		$input['password'] = $password;
		$input['email'] = $email;
		$input['telepon'] = $telepon;
        $input['level'] = $lvl; 
		$input['gender'] = $gender; 

		$this->administator->input_data($input,'tbl_admin');
	}

    //Page Data Admin
	public function data_admin(){
		$data['headertitle'] = 'Data Admin';
        $data['title'] = 'Admin';
		$data['menu_induk'] = 'admin';
		$data['menu'] = 'data_admin';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

		$this->load->view('dashboard/admin/v_dataadmin',$data);
	}

    //Get Tabel Admin
	public function get_admin(){
		$gender = $this->input->post('gender');
		$cari = $this->input->post('cari');
        $page = $this->input->post('page');

        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;
        
        if (empty($gender)) {
            $where = NULL;
        }
        if ($gender=="1") {
            $where['gender'] = '1';
        }
        if ($gender=="2") {
            $where['gender'] = '2';
        }
        if (!empty($cari)) {
            $like['nama'] = $cari;
        }
        else {
            $like = NULL;
        }
        $data['list_admin'] = $this->administator->get_data_cond($where,$like,'id','ASC',$offset,$dataPerPage,'tbl_admin')->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('dashboard/admin/tabel_admin', $data);
	}

    //Paging Admin
	public function paging_admin(){
        $gender = $this->input->post('gender');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }

        if ($gender==NULL) {
            $where = NULL;
        }
        if ($gender=="1") {
            $where['gender'] = '1';
        }
        if ($gender=="2") {
            $where['gender'] = '2';
        }
        
        if (!empty($cari)) {
            $like['nama'] = $cari;
        }
        else {
            $like = NULL;
        }
        $jumData = $this->administator->get_paging_cond($where,$like,'tbl_admin')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('dashboard/admin/paging_admin', $data);
    }

    // Hapus Admin
    public function delete_admin(){
        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->administator->delete_data($where,'tbl_admin');
    }

    //============ User =================
    //Page Input User
    public function input_user(){
        $data['headertitle'] = 'Input User';
        $data['title'] = 'User';
        $data['menu_induk'] = 'user';
        $data['menu'] = 'input_user';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $this->load->view('dashboard/user/v_inputuser',$data);
    }   

    //Insert User
    public function simpan_user(){

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
            $response['pesan'] = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Tersimpan!</div>';
            $response['status'] = "sukses";
        }
        echo json_encode($response);
    }

    //Page Data User
    public function data_user(){
        $data['headertitle'] = 'Data User';
        $data['title'] = 'User';
        $data['menu_induk'] = 'user';
        $data['menu'] = 'data_user';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $this->load->view('dashboard/user/v_datauser',$data);
    }

    //Get Tabel User
    public function get_user(){
        $gender = $this->input->post('gender');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');

        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;
        
        if (empty($gender)) {
            $where = NULL;
        }
        if ($gender=="1") {
            $where['gender'] = '1';
        }
        if ($gender=="2") {
            $where['gender'] = '2';
        }
        if (!empty($cari)) {
            $like['nama'] = $cari;
            $like2['email'] = $cari;
        }
        else {
            $like = NULL;
            $like2 = NULL;
        }
        $data['list_user'] = $this->administator->get_data_cond_two($where,$like,$like2,'id','ASC',$offset,$dataPerPage,'tbl_user')->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('dashboard/user/tabel_user', $data);
    }

    //Paging User
    public function paging_user(){
        $gender = $this->input->post('gender');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }

        if ($gender==NULL) {
            $where = NULL;
        }
        if ($gender=="1") {
            $where['gender'] = '1';
        }
        if ($gender=="2") {
            $where['gender'] = '2';
        }
        
        if (!empty($cari)) {
            $like['nama'] = $cari;
            $like2['email'] = $cari;
        }
        else {
            $like = NULL;
            $like2 = NULL;
        }
        $jumData = $this->administator->get_paging_cond_two($where,$like,$like2,'tbl_user')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('dashboard/user/paging_user', $data);
    }

    // Hapus Use
    public function delete_user(){
        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->administator->delete_data($where,'tbl_user');
    }

    //============ Kategori =================
    //Page Input Kategori
    public function input_kategori(){
        $data['headertitle'] = 'Input Kategori';
        $data['title'] = 'Kategori';
        $data['menu_induk'] = 'kategori';
        $data['menu'] = 'input_kategori';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $this->load->view('dashboard/kategori/v_inputkategori',$data);
    }

    //Insert Kategori
    public function simpan_kategori(){

        $nama_ktg = $this->input->post('nama_ktg');
        $url_ktg = $this->input->post('url_ktg');

        $url_ktg = str_replace(' ', '_', $url_ktg);
        $url_ktg = str_replace("'", '_', $url_ktg);
        $url_ktg = str_replace('.', '_', $url_ktg);
        $url_ktg = str_replace('/', '_', $url_ktg);

        if (empty($url_ktg)) {
            $url_kategori = strtolower($nama_ktg);
        }else{
            $url_kategori = strtolower($url_ktg);
        }

        $nama_kategori = strtoupper($nama_ktg);

        $cek_id_kategori = $this->administator->cek_id_max('id_kategori','tbl_kategori')->row();
        if (!empty($cek_id_kategori)) {
            $id_kategori_max = $cek_id_kategori->id_kategori;
            $id_kategori_ex = explode('-', $id_kategori_max);
            $id_kategori_num = $id_kategori_ex[1];
            $id_kategori = cek_id_kategori($id_kategori_num);
            $idkategori = id_kategori($id_kategori);
        }else{
            $idkategori = 'KTG-001';
        }
        
        $status = '1';

        $input['id_kategori'] = $idkategori;
        $input['nama_ktg'] = $nama_kategori;
        $input['url_ktg'] = $url_kategori;
        $input['status'] = $status;

        $this->administator->input_data($input,'tbl_kategori');
    }

    //Page Data Kategori
    public function data_kategori(){
        $data['headertitle'] = 'Data Kategori';
        $data['title'] = 'Kategori';
        $data['menu_induk'] = 'kategori';
        $data['menu'] = 'data_kategori';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $this->load->view('dashboard/kategori/v_datakategori',$data);
    }

    //Get Tabel Kategori
    public function get_kategori(){
        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');

        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;
        
        if (empty($status)) {
            $where = NULL;
        }
        if ($status=="1") {
            $where['status'] = '1';
        }
        if ($status=="2") {
            $where['status'] = '2';
        }
        if (!empty($cari)) {
            $like['nama_ktg'] = $cari;
        }
        else {
            $like = NULL;
        }
        $data['list_kategori'] = $this->administator->get_data_cond($where,$like,'id','ASC',$offset,$dataPerPage,'tbl_kategori')->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('dashboard/kategori/tabel_kategori', $data);
    }

    //Paging Kategori
    public function paging_kategori(){
        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }

        if (empty($status)) {
            $where = NULL;
        }
        if ($status=="1") {
            $where['status'] = '1';
        }
        if ($status=="2") {
            $where['status'] = '2';
        }
        if (!empty($cari)) {
            $like['nama_ktg'] = $cari;
        }
        else {
            $like = NULL;
        }
        $jumData = $this->administator->get_paging_cond($where,$like,'tbl_kategori')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('dashboard/kategori/paging_kategori', $data);
    }

    // Hapus Kategori
    public function delete_kategori(){
        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->administator->delete_data($where,'tbl_kategori');
    }

    // Change Status Kategori
    public function change_status_ktg(){
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $where['id'] = $id;

        if ($status==1) {
            $update['status'] = 2;   
        }elseif ($status==2) {
            $update['status'] = 1;
        }else{
            $update['status'] = 1;
        }


        $this->administator->update_data($where,$update,'tbl_kategori');
    }

    //Page Edit Kategori
    public function edit_kategori($id_kategori){
        $data['headertitle'] = 'Edit Kategori';
        $data['title'] = 'Kategori';
        $data['menu_induk'] = '';
        $data['menu'] = '';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $where['id_kategori'] = $id_kategori;

        $cek = $this->administator->get_data_where($where,'tbl_kategori')->row();

        $data['id'] = $cek->id;
        $data['id_kategori'] = $id_kategori;
        $data['nama_ktg'] = $cek->nama_ktg;
        $data['url_ktg'] = $cek->url_ktg;

        $this->load->view('dashboard/kategori/v_editkategori',$data);
    }

    //Update Kategori
    public function update_kategori(){
    
        $id = $this->input->post('id');
        $id_kategori = $this->input->post('id_kategori');
        $nama_ktg = $this->input->post('nama_ktg');
        $url_ktg = $this->input->post('url_ktg');

        $url_ktg = str_replace(' ', '_', $url_ktg);
        $url_ktg = str_replace("'", '_', $url_ktg);
        $url_ktg = str_replace('.', '_', $url_ktg);
        $url_ktg = str_replace('/', '_', $url_ktg);

        if (empty($url_ktg)) {
            $url_kategori = strtolower($nama_ktg);
        }else{
            $url_kategori = strtolower($url_ktg);
        }

        $nama_kategori = strtoupper($nama_ktg);

        $where['id'] = $id;

        $update['nama_ktg'] = $nama_kategori;
        $update['url_ktg'] = $url_kategori;

        $this->administator->update_data($where,$update,'tbl_kategori');
    }


    //============ Produk =================
    //Page Input Produk
    public function input_produk(){
        $data['headertitle'] = 'Input Produk';
        $data['title'] = 'Produk';
        $data['menu_induk'] = 'produk';
        $data['menu'] = 'input_produk';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $where['status'] = 1;
        $data['list_kategori'] = $this->administator->get_data_where($where,'tbl_kategori')->result();

        $this->load->view('dashboard/produk/v_inputproduk',$data);
    }

    //Inser Produk
    public function simpan_produk(){
        $id_admin = $this->session->userdata('id_admin');

        $nama_produk = $this->input->post('nama_produk');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $catatan = $this->input->post('catatan');

        $cek_id_produk = $this->administator->cek_id_max('id_produk','tbl_produk1')->row();
        if (!empty($cek_id_produk)) {
            $id_produk_max = $cek_id_produk->id_produk;
            $id_produk_ex = explode('-', $id_produk_max);
            $id_produk_num = $id_produk_ex[1];
            $id_produk = cek_id_produk($id_produk_num);
            $idproduk = id_produk($id_produk);
        }else{
            $idproduk = 'SHP-001';
        }

        $url_p = $nama_produk;
        $url_produk1 = str_replace('.', '_', $url_p);
        $url_produk2 = str_replace('/', '_', $url_produk1);
        $url_produk3 = str_replace(' ', '_', $url_produk2);
        $url = strtolower($url_produk3);

        if(!empty($_FILES['picture']['name'])){

            $config['upload_path']   = './images/produk/';
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
                $picture1 = $upload_data['file_name'];
            }
        }
        else{
            $picture1 = 'no-photo.jpg';
        }

        if(!empty($_FILES['picture2']['name'])){

            $config2['upload_path']   = './images/produk/';
            $config2['allowed_types'] = 'jpg|jpeg|gif|png';
            $config2['max_size'] = 5000;
            //$config2['min_size'] = 500;
            $newname = pathinfo($_FILES['picture2']['name'], PATHINFO_FILENAME);
            $newname = str_replace(',', '_', $newname);
            $newname = str_replace('.', '_', $newname);
            $newname = str_replace('"', '_', $newname);
            $newname = str_replace("'", "_", $newname);
            $newname = str_replace(' ', '_', $newname);
            $config2['file_name'] = $newname;
            if (!is_dir($config2['upload_path'])) {
                mkdir($config2['upload_path'], 0777, TRUE);
            }

            if (!empty($_FILES['picture2']['name'])) {
                $this->upload->initialize($config2);
            }
            else {
                $this->load->library('upload', $config2);
            }
                 
            if ( ! $this->upload->do_upload('picture2')){
                $text['pesan'] = '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i>Gagal Upload Foto 2 </h5>'.$this->upload->display_errors();'! </div>';
                $text['status'] = "gagal";
                echo json_encode($text);
                exit();
            }
            else{
                $upload_data = $this->upload->data();
                $picture2 = $upload_data['file_name'];
            }
        }
        else{
            $picture2 = 'no-photo.jpg';
        }

        if(!empty($_FILES['picture3']['name'])){

            $config3['upload_path']   = './images/produk/';
            $config3['allowed_types'] = 'jpg|jpeg|gif|png';
            $config3['max_size'] = 5000;
            //$config3['min_size'] = 500;
            $newname = pathinfo($_FILES['picture3']['name'], PATHINFO_FILENAME);
            $newname = str_replace(',', '_', $newname);
            $newname = str_replace('.', '_', $newname);
            $newname = str_replace('"', '_', $newname);
            $newname = str_replace("'", "_", $newname);
            $newname = str_replace(' ', '_', $newname);
            $config3['file_name'] = $newname;
            if (!is_dir($config3['upload_path'])) {
                mkdir($config3['upload_path'], 0777, TRUE);
            }

            if (!empty($_FILES['picture3']['name'])) {
                $this->upload->initialize($config3);
            }
            else {
                $this->load->library('upload', $config3);
            }
                 
            if ( ! $this->upload->do_upload('picture3')){
                $text['pesan'] = '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i>Gagal Upload Foto 3 </h5>'.$this->upload->display_errors();'! </div>';
                $text['status'] = "gagal";
                echo json_encode($text);
                exit();
            }
            else{
                $upload_data = $this->upload->data();
                $picture3 = $upload_data['file_name'];
            }
        }
        else{
            $picture3 = 'no-photo.jpg';
        }

        $status = '1';

        $input['id_produk'] = $idproduk;
        $input['nama_produk'] = $nama_produk;
        $input['id_kategori'] = $kategori;
        $input['harga'] = $harga;
        $input['stok'] = $stok;
        $input['catatan'] = $catatan;
        $input['status'] = $status; 
        $input['url'] = $url; 
        $input['id_admin'] = $id_admin; 
        $input['picture']=$picture1;
        $input['picture_2']=$picture2;
        $input['picture_3']=$picture3;

        $this->administator->input_data($input,'tbl_produk1');
        $response['pesan'] = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Tersimpan!</div>';
        $response['status'] = "sukses";
        echo json_encode($response);
    }

    //Page Data Produk
    public function data_produk(){
        $data['headertitle'] = 'Data Produk';
        $data['title'] = 'Produk';
        $data['menu_induk'] = 'produk';
        $data['menu'] = 'data_produk';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $this->load->view('dashboard/produk/v_dataproduk',$data);
    }

    //Get Tabel Produk
    public function get_produk(){
        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');

        $dataPerPage = 5;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;
        
        if (empty($status)) {
            $where = NULL;
        }
        if ($status=="1") {
            $where['tbl_produk1.status'] = '1';
        }
        if ($status=="2") {
            $where['tbl_produk1.status'] = '2';
        }
        if (!empty($cari)) {
            $like['nama_produk'] = $cari;
        }
        else {
            $like = NULL;
        }
        $data['list_produk'] = $this->administator->get_data_cond_join_produk($where,$like,'id','ASC',$offset,$dataPerPage)->result();

        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('dashboard/produk/tabel_produk', $data);
    }

    //Paging Produk
    public function paging_produk(){
        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 5;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }

        if (empty($status)) {
            $where = NULL;
        }
        if ($status=="1") {
            $where['status'] = '1';
        }
        if ($status=="2") {
            $where['status'] = '2';
        }
        if (!empty($cari)) {
            $like['nama_produk'] = $cari;
        }
        else {
            $like = NULL;
        }
        $jumData = $this->administator->get_paging_cond($where,$like,'tbl_produk1')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('dashboard/produk/paging_produk', $data);
    }

    // Hapus Produk
    public function delete_produk(){
        $id = $this->input->post('id');
        $where['id_produk'] = $id;

        $this->administator->delete_data($where,'tbl_produk1');
    }

    // Change Status Produk
    public function change_status_produk(){
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $where['id_produk'] = $id;

        if ($status==1) {
            $update['status'] = 2;   
        }elseif ($status==2) {
            $update['status'] = 1;
        }else{
            $update['status'] = 1;
        }

        $this->administator->update_data($where,$update,'tbl_produk1');
    }

    //Page Edit Produk
    public function edit_produk($id_produk){
        $data['headertitle'] = 'Edit Produk';
        $data['title'] = 'Produk';
        $data['menu_induk'] = '';
        $data['menu'] = '';

        $where['id_produk'] = $id_produk;

        $cek = $this->administator->get_data_where($where,'tbl_produk1')->row();

        $data['id'] = $cek->id;
        $data['id_produk'] = $id_produk;
        $data['nama_produk'] = $cek->nama_produk;
        $data['url'] = $cek->url;
        $data['id_kategori'] = $cek->id_kategori;
        $data['harga'] = $cek->harga;
        $data['stok'] = $cek->stok;
        $data['catatan'] = $cek->catatan;
        $data['picture'] = $cek->picture;
        $data['picture_2'] = $cek->picture_2;
        $data['picture_3'] = $cek->picture_3;

        $where2['status'] = 1;
        $data['list_kategori'] = $this->administator->get_data_where($where2,'tbl_kategori')->result();

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();


        $this->load->view('dashboard/produk/v_editproduk',$data);
    }

    //Update Produk
    public function update_produk(){
        $id_admin = $this->session->userdata('id_admin');

        $id = $this->input->post('id');
        $id_produk = $this->input->post('id_produk');
        $nama_produk = $this->input->post('nama_produk');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $catatan = $this->input->post('catatan');   

        $where2['id_produk'] = $id_produk;

        $cekpic = $this->administator->get_data_where($where2,'tbl_produk1')->row();

        $url_p = $nama_produk;
        $url_produk1 = str_replace('.', '_', $url_p);
        $url_produk2 = str_replace('/', '_', $url_produk1);
        $url_produk3 = str_replace(' ', '_', $url_produk2);
        $url = strtolower($url_produk3);

        if(!empty($_FILES['picture']['name'])){

            $config['upload_path']   = './images/produk/';
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
                $picture1 = $upload_data['file_name'];
            }
        }
        else{
            $picture1 = $cekpic->picture;
        }

        if(!empty($_FILES['picture2']['name'])){

            $config2['upload_path']   = './images/produk/';
            $config2['allowed_types'] = 'jpg|jpeg|gif|png';
            $config2['max_size'] = 5000;
            //$config2['min_size'] = 500;
            $newname = pathinfo($_FILES['picture2']['name'], PATHINFO_FILENAME);
            $newname = str_replace(',', '_', $newname);
            $newname = str_replace('.', '_', $newname);
            $newname = str_replace('"', '_', $newname);
            $newname = str_replace("'", "_", $newname);
            $newname = str_replace(' ', '_', $newname);
            $config2['file_name'] = $newname;
            if (!is_dir($config2['upload_path'])) {
                mkdir($config2['upload_path'], 0777, TRUE);
            }

            if (!empty($_FILES['picture2']['name'])) {
                $this->upload->initialize($config2);
            }
            else {
                $this->load->library('upload', $config2);
            }
                 
            if ( ! $this->upload->do_upload('picture2')){
                $text['pesan'] = '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i>Gagal Upload Foto 2 </h5>'.$this->upload->display_errors();'! </div>';
                $text['status'] = "gagal";
                echo json_encode($text);
                exit();
            }
            else{
                $upload_data = $this->upload->data();
                $picture2 = $upload_data['file_name'];
            }
        }
        else{
            $picture2 = $cekpic->picture_2;
        }

        if(!empty($_FILES['picture3']['name'])){

            $config3['upload_path']   = './images/produk/';
            $config3['allowed_types'] = 'jpg|jpeg|gif|png';
            $config3['max_size'] = 5000;
            //$config3['min_size'] = 500;
            $newname = pathinfo($_FILES['picture3']['name'], PATHINFO_FILENAME);
            $newname = str_replace(',', '_', $newname);
            $newname = str_replace('.', '_', $newname);
            $newname = str_replace('"', '_', $newname);
            $newname = str_replace("'", "_", $newname);
            $newname = str_replace(' ', '_', $newname);
            $config3['file_name'] = $newname;
            if (!is_dir($config3['upload_path'])) {
                mkdir($config3['upload_path'], 0777, TRUE);
            }

            if (!empty($_FILES['picture3']['name'])) {
                $this->upload->initialize($config3);
            }
            else {
                $this->load->library('upload', $config3);
            }
                 
            if ( ! $this->upload->do_upload('picture3')){
                $text['pesan'] = '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i>Gagal Upload Foto 3 </h5>'.$this->upload->display_errors();'! </div>';
                $text['status'] = "gagal";
                echo json_encode($text);
                exit();
            }
            else{
                $upload_data = $this->upload->data();
                $picture3 = $upload_data['file_name'];
            }
        }
        else{
            $picture3 = $cekpic->picture_3;
        }

        $where['id_produk'] = $id_produk;

        $update['nama_produk'] = $nama_produk;
        $update['id_kategori'] = $kategori;
        $update['harga'] = $harga;
        $update['stok'] = $stok;
        $update['catatan'] = $catatan;
        $update['url'] = $url; 
        $update['id_admin'] = $id_admin; 
        $update['picture'] = $picture1;
        $update['picture_2']=$picture2;
        $update['picture_3']=$picture3;


        $this->administator->update_data($where,$update,'tbl_produk1');
        $response['pesan'] = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Tersimpan!</div>';
        $response['status'] = "sukses";
        echo json_encode($response);
    }

    //============ Checkout ===============
    //Page Data Checkout
    public function data_checkout(){
        $data['headertitle'] = 'Data Checkout';
        $data['title'] = 'Checkout';
        $data['menu_induk'] = 'checkout';
        $data['menu'] = 'data_checkout';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $this->load->view('dashboard/checkout/v_datacheckout',$data);
    }

    //Get Tabel Checkout
    public function get_checkout(){
        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');

        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;
        
        if (empty($status)) {
            $where = NULL;
        }
        if ($status=="1") {
            $where['tbl_checkout.status'] = '1';
        }
        if ($status=="2") {
            $where['tbl_checkout.status'] = '2';
        }
        if (!empty($cari)) {
            $like2['tbl_checkout.id_invoice'] = $cari;
            $like['tbl_user.nama'] = $cari;
        }
        else {
            $like = NULL;
            $like2 = NULL;
        }
        $data['list_checkout'] = $this->administator->get_data_cond_two_join_checkout($where,$like,$like2,'id','ASC',$offset,$dataPerPage)->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('dashboard/checkout/tabel_checkout', $data);
    }

    //Paging Checkout
    public function paging_checkout(){
        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }

        if (empty($status)) {
            $where = NULL;
        }
        if ($status=="1") {
            $where['tbl_checkout.status'] = '1';
        }
        if ($status=="2") {
            $where['tbl_checkout.status'] = '2';
        }
        if (!empty($cari)) {
            $like2['tbl_checkout.id_invoice'] = $cari;
            $like['tbl_user.nama'] = $cari;
        }
        else {
            $like = NULL;
            $like2 = NULL;
        }
        $jumData = $this->administator->get_paging_cond_two_join_checkout($where,$like,$like2)->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('dashboard/checkout/paging_checkout', $data);
    }

    // Hapus Checkout
    public function delete_checkout(){
        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->administator->delete_data($where,'tbl_checkout');
    }

    //Modal Checkout
    public function lihat_data_invoice(){

        $id_checkout = $this->input->post('id_checkout');

        $where = array(
            'tbl_cart.status' => 2,
            'id_checkout' => $id_checkout
        );

        $list_produk = $this->administator->get_data_join_cart($where)->result();

        //Ambil data Checkout
        $where2['id_checkout'] = $id_checkout;

        $cek_invoice = $this->administator->get_data_where($where2,'tbl_checkout')->row();

        // $result = 'TES '.$cek_invoice->id_invoice;

        $template ='<table class="table table-striped" style="table-layout: fixed; word-wrap: break-word;">
                    <thead>                  
                        <tr>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>';
        $total = 0;
        foreach($list_produk as $produk) {
            $jml_hrg = $produk->harga*$produk->qty;
            $template.= '<tr>
                        <td>'.$produk->produk.'</td>
                        <td class="text-right">Rp.'.format_rupiah($produk->harga).'</td>
                        <td class="text-center">'.$produk->qty.'</td>
                        <td class="text-right">Rp.'.format_rupiah($jml_hrg).'</td>
                    </tr>'; 
        $total += $jml_hrg;          
        };

        $template.= '<tr>
                        <td colspan="3" class="text-center">Total Harga</td>
                        <td class="text-right">Rp.'.format_rupiah($total).'</td>
                    </tr>
                    </tbody>
                </table>';
        
        $result = $template;

        echo $result;
    }

    //Invoice
    public function invoice($id_invoice){
        $where['id_invoice'] = $id_invoice;
        $invoice = $this->administator->get_data_where($where,'tbl_checkout');
        if (empty($invoice->num_rows())){
            redirect('dashboard/data_checkout');
        }else{
            $data['headertitle'] = 'Invoice';
            $data['title'] = 'Invoice';
            $data['menu_induk'] = '';
            $data['menu'] = '';

            $notifikasi = $this->administator->get_notification()->num_rows();
            $data['notifikasi'] = $notifikasi;
            $data['profiltoko'] = $this->administator->get_profiltoko()->row();

            $where2 = array(
                'tbl_cart.status' => 2,
                'id_checkout' => $invoice->row()->id_checkout
            );
            $where3['id_user'] = $invoice->row()->id_user;
            $where4['id_bank'] = $invoice->row()->bank;

            $data['list_produk'] = $this->administator->get_data_join_cart($where2)->result();
            $data['user'] = $this->administator->get_data_where($where3,'tbl_user')->row(); 
            $data['invoice'] =$this->administator->get_data_where($where,'tbl_checkout')->row();
            $data['bank'] =$this->administator->get_data_where($where4,'tbl_bank')->row();

            // $data['invoice'] = $this->administator->get_invoice

            $this->load->view('dashboard/checkout/v_invoice',$data);
        }
    }

    //============ Konfirmasi Pembayaran ============
    //Page Konfirmasi Pembayaran
    public function konfirmasi_pembayaran(){
        $data['headertitle'] = 'Konfirmasi Pembayaran';
        $data['title'] = 'Konfirmasi Pembayaran';
        $data['menu_induk'] = '';
        $data['menu'] = '';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $this->load->view('dashboard/konfirmasi/v_datakonfirmasi',$data);
    }

    //Get Tabel Konfirmasi
    public function get_konfirmasi(){
        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');

        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;
        
        if (empty($status)) {
            $where = NULL;
        }
        if ($status=="1") {
            $where['tbl_checkout.status'] = '1';
        }
        if ($status=="2") {
            $where['tbl_checkout.status'] = '2';
        }
        if (!empty($cari)) {
            $like2['tbl_checkout.id_invoice'] = $cari;
            $like['tbl_konfirmasi.nama_pengirim'] = $cari;
        }
        else {
            $like = NULL;
            $like2 = NULL;
        }
        $data['list_konfirmasi'] = $this->administator->get_data_cond_two_join_confirm($where,$like,$like2,'id','ASC',$offset,$dataPerPage)->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('dashboard/konfirmasi/tabel_konfirmasi', $data);
    }

    //Paging Konfirmasi
    public function paging_konfirmasi(){
        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }

        if (empty($status)) {
            $where = NULL;
        }
        if ($status=="1") {
            $where['tbl_checkout.status'] = '1';
        }
        if ($status=="2") {
            $where['tbl_checkout.status'] = '2';
        }
        if (!empty($cari)) {
            $like2['tbl_checkout.id_invoice'] = $cari;
            $like['tbl_konfirmasi.nama_pengirim'] = $cari;
        }
        else {
            $like = NULL;
            $like2 = NULL;
        }
        $jumData = $this->administator->get_paging_cond_two_join_confirm($where,$like,$like2)->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('dashboard/konfirmasi/paging_konfirmasi', $data);
    }

    // Hapus Konfirmasi
    public function delete_konfirmasi(){
        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->administator->delete_data($where,'tbl_konfirmasi');
    }

    //Confirm Pembayaran
    public function confirm_inv(){
        $id_invoice = $this->input->post('id');       

        //Ambil ID Checkout dengan parameter ID INV
        $get_checkout = $this->administator->get_checkout($id_invoice)->row();
        $id_checkout = $get_checkout->id_checkout;
        //--------------------

        //Insert to Penjualan
        $tgl_penjualan = date('Y-m-d');
        $input['id_invoice'] = $id_invoice;
        $input['total'] = $get_checkout->total;
        $input['tgl_penjualan'] = $tgl_penjualan;
        $input['status'] = 1;

        $this->administator->input_data($input,'tbl_penjualan');

        //Ambil ID Produk & qty berdasarkan ID CHK
        $get_cart = $this->administator->get_id_produk($id_checkout)->result();
        //--------------------

        //Array Pengurangan Stok
        $pjl = array();
        foreach ($get_cart as $q) {
            $stok = $this->administator->cek_stok($q->id_produk)->row();//Ambil data stok dari tbl_produk
            $min_stok = $stok->stok-$q->qty;
            $pjl[] = array(
                'id_produk' => $q->id_produk,
                'stok' => $min_stok
            );
        }

        //Update Stok
        $this->administator->pengurangan_stok($pjl);

        //Update Status Checkout---------
        $where['id_invoice'] = $id_invoice;

        $update['status'] = 2;
        $this->administator->update_data($where,$update,'tbl_checkout');
        //--------------------
    }

    //========== Penjualan=============
    //Page Data penjualan
    public function data_penjualan(){
        $data['headertitle'] = 'Data Penjualan';
        $data['title'] = 'Penjualan';
        $data['menu_induk'] = 'penjualan';
        $data['menu'] = 'data_penjualan';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $this->load->view('dashboard/penjualan/v_datapenjualan',$data);
    }

    //Get Tabel Penjualan
    public function get_penjualan(){
        // $status = $this->input->post('status');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');

        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;
        
        if (!empty($start_date AND $end_date)) {
            $where = array(
                    "tgl_penjualan >=" => $start_date,
                    "tgl_penjualan <=" => $end_date
                );
        }elseif (!empty($start_date)) {
            $where = array(
                    "tgl_penjualan >=" => $start_date
                );
        }elseif (!empty($end_date)) {
            $where = array(
                    "tgl_penjualan <=" => $end_date
                );
        }else{
            $where = NULL;
        }
        
        if (!empty($cari)) {
            $like['id_invoice'] = $cari;
        }
        else {
            $like = NULL;
        }
        $data['list_penjualan'] = $this->administator->get_data_cond($where,$like,'id','ASC',$offset,$dataPerPage,'tbl_penjualan')->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('dashboard/penjualan/tabel_penjualan', $data);
    }

    //Paging Penjualan
    public function paging_penjualan(){
        // $status = $this->input->post('status');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }

        if (!empty($start_date AND $end_date)) {
            $where = array(
                    "tgl_penjualan >=" => $start_date,
                    "tgl_penjualan <=" => $end_date
                );
        }elseif (!empty($start_date)) {
            $where = array(
                    "tgl_penjualan >=" => $start_date
                );
        }elseif (!empty($end_date)) {
            $where = array(
                    "tgl_penjualan <=" => $end_date
                );
        }else{
            $where = NULL;
        }
        if (!empty($cari)) {
            $like['id_invoice'] = $cari;
        }
        else {
            $like = NULL;
        }
        $jumData = $this->administator->get_paging_cond($where,$like,'tbl_penjualan')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('dashboard/penjualan/paging_penjualan', $data);
    }

    //Modal Penjualan
    public function lihat_data_penjualan(){

        $id_invoice = $this->input->post('id_invoice');

        $where = array(
            'tbl_checkout.status' => 2,
            'id_invoice' => $id_invoice
        );

        $cek = $this->administator->get_data_checkout_join($where);
        $cek_invoice = $cek->row();

        if (!empty($cek->num_rows())) {

            $template = "<div class='row'>
                        <div class='col-sm-12 col-lg-6'>
                            <label>ID Invoice : </label>&nbsp;".$id_invoice." 
                        </div>
                        <div class='col-sm-12 col-lg-6'>
                            <label>Pembeli : </label>&nbsp;".$cek_invoice->nama."
                        </div>
                        <div class='col-sm-12 col-lg-6'>
                            <label>Total Barang : </label>&nbsp;".$cek_invoice->total_barang."
                        </div>
                        <div class='col-sm-12 col-lg-6'>
                            <label>Ongkir : </label>&nbsp;".$cek_invoice->ongkir."
                        </div>
                        <div class='col-sm-12 col-lg-6'>
                            <label>Total : </label>&nbsp;".$cek_invoice->total."
                        </div>
                        <div class='col-sm-12 col-lg-6'>
                            <label>Bank : </label>&nbsp;".$cek_invoice->bank."
                        </div>
                        <div class='col-sm-12 col-lg-6'>
                            <label>Kurir : </label>&nbsp;".strtoupper($cek_invoice->kurir)."
                        </div>
                        <div class='col-sm-12 col-lg-6'>
                            <label>Alamat : </label>&nbsp;".$cek_invoice->alamat."
                        </div>
                    </div>";
        }else{
            $template = "<div class='row'>
                        <div class='col-sm-12 col-lg-6'>
                            <label>ID Invoice : </label>&nbsp;".$id_invoice." 
                        </div>
                        <div class='col-sm-12 col-lg-6'>
                            <label>Pembeli : </label>&nbsp;
                        </div>
                        <div class='col-sm-12 col-lg-6'>
                            <label>Total Barang : </label>&nbsp;
                        </div>
                        <div class='col-sm-12 col-lg-6'>
                            <label>Ongkir : </label>&nbsp;
                        </div>
                        <div class='col-sm-12 col-lg-6'>
                            <label>Total : </label>&nbsp;
                        </div>
                        <div class='col-sm-12 col-lg-6'>
                            <label>Bank : </label>&nbsp;
                        </div>
                        <div class='col-sm-12 col-lg-6'>
                            <label>Kurir : </label>&nbsp;
                        </div>
                        <div class='col-sm-12 col-lg-6'>
                            <label>Alamat : </label>&nbsp;
                        </div>
                        <div class='col-sm-12 col-lg-12 text-center mt-2'>
                            <h4>Terjadi Kesalahan, Data Invoice tidak ditemukan</h4>
                        </div>
                    </div>";
        }
        
        $result = $template;

        echo $result;
    }
}?>
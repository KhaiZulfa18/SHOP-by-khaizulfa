<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {

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

    //Page Shop Profile
	public function shop_profil(){
		$data['headertitle'] = 'Shop Profil';
	    $data['title'] = 'Profil Toko';
	    $data['menu_induk'] = 'settings';
	    $data['menu'] = 'shop_profil';

        $where['status'] = 'profil';
        $cek = $this->administator->get_data_where($where,'tbl_profil')->row();

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $data['id'] = $cek->id;
        $data['nama'] = $cek->nama;
        $data['email'] = $cek->email;
        $data['telepon'] = $cek->telepon;
        $data['facebook'] = $cek->facebook;
        $data['url_facebook'] = $cek->url_facebook;
        $data['instagram'] = $cek->instagram;
        $data['url_instagram'] = $cek->url_instagram;
        $data['twitter'] = $cek->twitter;
        $data['url_twitter'] = $cek->url_twitter;
        $data['alamat'] = $cek->alamat;
        $data['logo'] = $cek->logo;

        $this->load->view('dashboard/shop_profil/v_shopprofil',$data);
	}

    //Update Profil Toko
	public function update_shopprofil(){

		$id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');
        $facebook = $this->input->post('facebook');   
        $url_facebook = $this->input->post('url_facebook');
        $instagram = $this->input->post('instagram');   
        $url_instagram = $this->input->post('url_instagram');
        $twitter = $this->input->post('twitter');   
        $url_twitter = $this->input->post('url_twitter');   

        $where2 = array(
            'status' => 'profil',
            'id' => $id
        );

        $cekpic = $this->administator->get_data_where($where2,'tbl_profil')->row();

        if(!empty($_FILES['picture']['name'])){

            $config['upload_path']   = './images/shop_profil/';
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
            $picture = $cekpic->logo;
        }

        
        $where['id'] = $id;

        $update['nama'] = $nama;
        $update['email'] = $email;
        $update['telepon'] = $telepon;
        $update['alamat'] = $alamat;
        $update['facebook'] = $facebook;
        $update['url_facebook'] = $url_facebook;
        $update['instagram'] = $instagram;
        $update['url_instagram'] = $url_instagram; 
        $update['twitter'] = $twitter;
        $update['url_twitter'] = $url_twitter;  
        $update['logo'] = $picture;


        $this->administator->update_data($where,$update,'tbl_profil');
        $response['pesan'] = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Tersimpan!</div>';
        $response['status'] = "sukses";
        echo json_encode($response);
	}

    //Page Input Metode Pembayaran
    public function input_metodepembayaran(){
        $data['headertitle'] = 'Input Metode Pembayaran';
        $data['title'] = 'Metode Pembayaran';
        $data['menu_induk'] = 'settings';
        $data['menu'] = 'metode_pembayaran';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $this->load->view('dashboard/bank/v_inputbank',$data);
    }

    //Insert Metode Pembayaran
    public function simpan_bank(){
        $nama_bank = $this->input->post('nama_bank');
        $atas_nama = $this->input->post('atas_nama');
        $no_rek = $this->input->post('no_rek');

        $cek_id_bank = $this->administator->cek_id_max('id_bank','tbl_bank')->row();
        if (!empty($cek_id_bank)) {
            $id_bank_max = $cek_id_bank->id_bank;
            $id_bank_ex = explode('-', $id_bank_max);
            $id_bank_num = $id_bank_ex[1];
            $id_bank = cek_id_bank($id_bank_num);
            $idbank = id_bank($id_bank);
        }else{
            $idbank = 'BANK-001';
        }
        
        $status = '1';

        $input['id_bank'] = $idbank;
        $input['nama_bank'] = $nama_bank;
        $input['atas_nama'] = $atas_nama;
        $input['no_rekening'] = $no_rek;
        $input['status'] = $status;

        $this->administator->input_data($input,'tbl_bank');
    }

    //Page Data Metode Pembayaran
    public function metode_pembayaran(){
        $data['headertitle'] = 'Metode Pembayaran';
        $data['title'] = 'Metode Pembayaran';
        $data['menu_induk'] = 'settings';
        $data['menu'] = 'metode_pembayaran';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $this->load->view('dashboard/bank/v_databank',$data);
    }

    //Get Tabel Bank
    public function get_bank(){
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
            $like['nama_bank'] = $cari;
        }
        else {
            $like = NULL;
        }
        $data['list_bank'] = $this->administator->get_data_cond($where,$like,'id','ASC',$offset,$dataPerPage,'tbl_bank')->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('dashboard/bank/tabel_bank', $data);
    }

    //Paging Bank
    public function paging_bank(){
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
            $like['nama_bank'] = $cari;
        }
        else {
            $like = NULL;
        }
        $jumData = $this->administator->get_paging_cond($where,$like,'tbl_bank')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('dashboard/bank/paging_bank', $data);
    }

    // Hapus Bank
    public function delete_bank(){
        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->administator->delete_data($where,'tbl_bank');
    }

    // Change Status bank
    public function change_status_bank(){
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


        $this->administator->update_data($where,$update,'tbl_bank');
    }

    //Page Edit Bank
    public function edit_metodepembayaran($id_bank){
        $data['headertitle'] = 'Edit Metode Pembayaran';
        $data['title'] = 'Metode Pembayaran';
        $data['menu_induk'] = '';
        $data['menu'] = '';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $where['id_bank'] = $id_bank;

        $cek = $this->administator->get_data_where($where,'tbl_bank')->row();

        $data['id'] = $cek->id;
        $data['id_bank'] = $id_bank;
        $data['nama_bank'] = $cek->nama_bank;
        $data['atas_nama'] = $cek->atas_nama;
        $data['no_rek'] = $cek->no_rekening;

        $this->load->view('dashboard/bank/v_editbank',$data);
    }

    //Update Bank
    public function update_bank(){
    
        $id = $this->input->post('id');
        $id_bank = $this->input->post('id_bank');
        $nama_bank = $this->input->post('nama_bank');
        $atas_nama = $this->input->post('atas_nama');
        $no_rek = $this->input->post('no_rek');

        $where['id'] = $id;

        $update['nama_bank'] = $nama_bank;
        $update['atas_nama'] = $atas_nama;
        $update['no_rekening'] = $no_rek;

        $this->administator->update_data($where,$update,'tbl_bank');
    }

    //=============Slider============
    //Page Input Slider
    public function input_slider(){
        $data['headertitle'] = 'Input Slider';
        $data['title'] = 'Slider';
        $data['menu_induk'] = 'settings';
        $data['menu'] = 'data_slider';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $this->load->view('dashboard/slider/v_inputslider',$data);
    }

    //Insert Slider
    public function simpan_slider(){

        $text1 = $this->input->post('text1');
        $text2 = $this->input->post('text2');

        if(!empty($_FILES['picture']['name'])){

            $config['upload_path']   = './images/slider/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size'] = 5000;
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
                $response['pesan'] = '<div class="alert alert-danger" role="alert">Gagal Upload! '.$this->upload->display_errors();'! </div>';
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
                $conf['source_image'] = './images/slider/'.$picture_name;
                $conf['new_image'] = './images/slider_thumb/'.$picture_name;
                $conf['create_thumb'] = TRUE;
                $conf['maintain_ratio'] = TRUE;
                $conf['width'] = 1500;
                //$conf['height'] = 108;
                                 
                $this->load->library('image_lib', $conf);
                $this->image_lib->initialize($conf);
                $this->image_lib->resize();
            }

            $status = 1;

            $input['text1']=$text1;
            $input['text2']=$text2;
            $input['picture']=$picture_name;
            $input['status']=$status;

            $this->useradmin->input_data($input,'tbl_slider');
            $response['pesan'] = '<div class="alert alert-success" role="alert">Berhasil Upload Slider!</div>';
            $response['status'] = "sukses";
        }
        echo json_encode($response);
    }

    //Page Data Slider
    public function data_slider(){
        $data['headertitle'] = 'Slider';
        $data['title'] = 'Slider';
        $data['menu_induk'] = 'settings';
        $data['menu'] = 'data_slider';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();

        $this->load->view('dashboard/slider/v_dataslider',$data);
    }

    //Get Tabel Slider
    public function get_slider(){
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
            $like['text1'] = $cari;
            $like2['text2'] = $cari;
        }
        else {
            $like = NULL;
            $like2 = NULL;
        }
        $data['list_slider'] = $this->administator->get_data_cond_two($where,$like,$like2,'id','ASC',$offset,$dataPerPage,'tbl_slider')->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('dashboard/slider/tabel_slider', $data);
    }

    //Paging Slider
    public function paging_slider(){
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
            $like['text1'] = $cari;
            $like['text2'] = $cari;
        }
        else {
            $like = NULL;
            $like2 = NULL;
        }
        $jumData = $this->administator->get_paging_cond_two($where,$like,$like2,'tbl_slider')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('dashboard/slider/paging_slider', $data);
    }

     // Hapus Slider
    public function delete_slider(){
        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->administator->delete_data($where,'tbl_slider');
    }

    // Change Status Slider
    public function change_status_slider(){
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


        $this->administator->update_data($where,$update,'tbl_slider');
    }    

    //=========Pesan=============
    //Page Data Pesan
    public function data_pesan(){
        $data['headertitle'] = 'Pesan';
        $data['title'] = 'Pesan';
        $data['menu_induk'] = 'notifikasi';
        $data['menu'] = 'data_slider';

        $notifikasi = $this->administator->get_notification()->num_rows();
        $data['notifikasi'] = $notifikasi;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();
        
        $this->load->view('dashboard/pesan/v_datapesan',$data);
    }

    //Get Tabel Pesan
    public function get_pesan(){
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
        
        if (!empty($cari)) {
            $like['nama'] = $cari;
            $like2['pesan'] = $cari;
        }
        else {
            $like = NULL;
            $like2 = NULL;
        }

        $where = NULL;

        $data['list_pesan'] = $this->administator->get_data_cond_two($where,$like,$like2,'id','ASC',$offset,$dataPerPage,'tbl_pesan')->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('dashboard/pesan/tabel_pesan', $data);
    }

    //Paging Pesan
    public function paging_pesan(){
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

        if (!empty($cari)) {
            $like['nama'] = $cari;
            $like['pesan'] = $cari;
        }
        else {
            $like = NULL;
            $like2 = NULL;
        }

        $where = NULL;

        $jumData = $this->administator->get_paging_cond_two($where,$like,$like2,'tbl_pesan')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('dashboard/pesan/paging_pesan', $data);
    }

     // Hapus Pesan
    public function delete_pesan(){
        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->administator->delete_data($where,'tbl_pesan');
    }
}?>
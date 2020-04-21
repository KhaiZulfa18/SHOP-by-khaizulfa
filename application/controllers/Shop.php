<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// if(!$this->session->userdata('id_user')){
            
		// }
		// else {
            $this->load->model('administator');
			$this->load->model('useradmin');
			$this->load->helper('user_helper');
            $this->load->helper('text'); 
		//}
	}

	public function index(){
		redirect('shop/home');
	}

    //Page Home
	public function home(){
		$where['status']=1;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();
        $data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
		$data['dataslider'] = $this->administator->get_data_where($where, 'tbl_slider')->result();
		$data['headertitle'] = 'Shop';
		$data['menu'] = 'home';

        $data['dataproduk'] = $this->administator->get_data_where_order_limit($where,'id','DESC', 'tbl_produk1')->result();       

        $id_user = $this->session->userdata('id_user');
        $jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
        $data['item_cart'] = $jml_item;

		$this->load->view('web/shop/v_home',$data);
	}

    //Page Katalog
	public function katalog(){
		$where['status']=1;
		$data['profiltoko'] = $this->administator->get_profiltoko()->row();
		$data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
        $data['dataslider'] = $this->administator->get_data_where($where, 'tbl_slider')->result();        
		$data['headertitle'] = 'Katalog';
		$data['menu'] = 'katalog';

        $id_user = $this->session->userdata('id_user');
        $jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
        $data['item_cart'] = $jml_item;

		$this->load->view('web/shop/v_katalog',$data);
	}

    //Get Tabel Katalog
	public function get_katalog(){
        $sortby = $this->input->post('sortby');
        $kategori = $this->input->post('kategori');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');

        $dataPerPage = 12;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;

        if (empty($kategori)) {
        	$where['status'] = 1;
        }else{
        	//$where['id_kategori'] = $kategori;
            $where = array(
                'status' => 1,
                'id_kategori' => $kategori
            );
        }

        if (empty($sortby)) {
        	$ordertype = 'ASC';
        	$orderby = 'id';
        }
        if ($sortby=='harga_asc') {
        	$ordertype = 'ASC';
        	$orderby = 'harga';
        }
        if ($sortby=='harga_desc') {
        	$ordertype = 'DESC';
        	$orderby = 'harga';
        }
        if ($sortby=='nama_desc') {
        	$ordertype = 'DESC';
        	$orderby = 'nama_produk';
        }
        if ($sortby=='nama_asc') {
        	$ordertype = 'ASC';
        	$orderby = 'nama_produk';
        }
        if ($sortby=='waktu_asc') {
        	$ordertype = 'ASC';
        	$orderby = 'id';
        }
        if ($sortby=='waktu_desc') {
        	$ordertype = 'DESC';
        	$orderby = 'id';
        }

        if (!empty($cari)) {
            $like['nama_produk'] = $cari;
        }
        else {
            $like = NULL;
        }

        $data['list_produk'] = $this->administator->get_data_cond($where,$like,$orderby,$ordertype,$offset,$dataPerPage,'tbl_produk1')->result();

        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('web/shop/katalog', $data);
    }

    //Paging Katalog
    public function paging_katalog(){
        $kategori = $this->input->post('kategori');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 12;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }

       if (empty($kategori)) {
            $where['status'] = 1;
        }else{
            //$where['id_kategori'] = $kategori;
            $where = array(
                'status' => 1,
                'id_kategori' => $kategori
            );
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

        $this->load->view('web/shop/paging', $data);
    }   

    //Page Kategori
    public function kategori($url_ktg){
        $where2['url_ktg'] = $url_ktg;
        $cek_ktg = $this->administator->get_data_where($where2, 'tbl_kategori')->row();

        if (empty($cek_ktg)) {
            redirect('shop/katalog');
        }else{

            $where['status']=1;

            $data['profiltoko'] = $this->administator->get_profiltoko()->row();
            $data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
            $data['dataslider'] = $this->administator->get_data_where($where, 'tbl_slider')->result();        
            $data['headertitle'] = $cek_ktg->nama_ktg;
            $data['menu'] = 'kategori';
            $data['id_kategori'] = $cek_ktg->id_kategori;
            $data['nama_ktg'] = $cek_ktg->nama_ktg;

            $id_user = $this->session->userdata('id_user');
            $jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
            $data['item_cart'] = $jml_item;

            $this->load->view('web/shop/v_kategori',$data);
        }
    }

    //Get Kategori
    public function get_kategori(){
        $sortby = $this->input->post('sortby');
        $id_kategori = $this->input->post('id_kategori');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');

        $dataPerPage = 12;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;

        if (empty($id_kategori)) {
            $where['status'] = 1;
        }else{
            //$where['id_kategori'] = $kategori;
            $where = array(
                'status' => 1,
                'id_kategori' => $id_kategori
            );
        }

        if (empty($sortby)) {
            $ordertype = 'ASC';
            $orderby = 'id';
        }
        if ($sortby=='harga_asc') {
            $ordertype = 'ASC';
            $orderby = 'harga';
        }
        if ($sortby=='harga_desc') {
            $ordertype = 'DESC';
            $orderby = 'harga';
        }
        if ($sortby=='nama_desc') {
            $ordertype = 'DESC';
            $orderby = 'nama_produk';
        }
        if ($sortby=='nama_asc') {
            $ordertype = 'ASC';
            $orderby = 'nama_produk';
        }
        if ($sortby=='waktu_asc') {
            $ordertype = 'ASC';
            $orderby = 'id';
        }
        if ($sortby=='waktu_desc') {
            $ordertype = 'DESC';
            $orderby = 'id';
        }

        if (!empty($cari)) {
            $like['nama_produk'] = $cari;
        }
        else {
            $like = NULL;
        }

        //$where['status'] = 1;

        $data['list_produk'] = $this->administator->get_data_cond($where,$like,$orderby,$ordertype,$offset,$dataPerPage,'tbl_produk1')->result();

        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('web/shop/kategori', $data);
    }

    //Paging Kategori
    public function paging_kategori(){
        $sortby = $this->input->post('sortby');
        $id_kategori = $this->input->post('id_kategori');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 12;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }

        if (empty($id_kategori)) {
            $where['status'] = 1;
        }else{
            //$where['id_kategori'] = $kategori;
            $where = array(
                'status' => 1,
                'id_kategori' => $id_kategori
            );
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

        $this->load->view('web/shop/paging', $data);
    }

    //Page Produk
    public function produk($url_produk){
        $where2['url'] = $url_produk;
        $cek_produk = $this->administator->get_data_where($where2, 'tbl_produk1')->row();

        if (empty($cek_produk)) {
            redirect('shop/katalog');
        }else{
            $where['status']=1;
            $data['profiltoko'] = $this->administator->get_profiltoko()->row();
            $data['dataslider'] = $this->administator->get_data_where($where, 'tbl_slider')->result();
            $data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
            $data['headertitle'] = $cek_produk->nama_produk;
            $data['menu'] = 'katalog';
            $data['id_produk'] = $cek_produk->id_produk;
            $data['nama_produk'] = $cek_produk->nama_produk;
            $data['produk'] = $cek_produk;

            $id_user = $this->session->userdata('id_user');
            $jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
            $data['item_cart'] = $jml_item;

            $this->load->view('web/shop/v_produk',$data);
        }
    }


    //===========Pesan================
    //Page Pesan
    public function kontak(){
        $where['status']=1;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();
        $data['dataslider'] = $this->administator->get_data_where($where, 'tbl_slider')->result();
        $data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
        $data['headertitle'] = 'Kontak';
        $data['menu'] = 'kontak';

        $id_user = $this->session->userdata('id_user');
        $jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
        $data['item_cart'] = $jml_item;

        $this->load->view('web/shop/v_kontak',$data);
    }

    //Insert Pesan
    public function simpan_pesan()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $subjek = $this->input->post('subjek');
        $pesan = $this->input->post('pesan');


        $input['nama'] = $nama;
        $input['email'] = $email;
        $input['subjek'] = $subjek;
        $input['pesan'] = $pesan;

        $this->administator->input_data($input,'tbl_pesan');
    }

    //===========Konfirmasi Pembayaran================
    //Page Konfirmasi Pembayaran
    public function konfirmasi_pembayaran(){
        $where['status']=1;
        $data['profiltoko'] = $this->administator->get_profiltoko()->row();
        $data['dataslider'] = $this->administator->get_data_where($where, 'tbl_slider')->result();
        $data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
        $data['headertitle'] = 'Konfirmasi Pembayaran';
        $data['menu'] = 'konfirmasi';

        $id_user = $this->session->userdata('id_user');
        $jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
        $data['item_cart'] = $jml_item;

        $where3['status'] = 1;
        $data['list_bank'] = $this->administator->get_data_where($where3,'tbl_bank')->result();

        $this->load->view('web/shop/v_konfirmasi',$data);
    }

    //Insert Konfirmasi Pembayaran
    public function simpan_konfirmasi(){

        $nama_pengirim = $this->input->post('nama_pengirim');
        $id_invoice = $this->input->post('id_invoice');
        $nominal = $this->input->post('nominal');
        $bank = $this->input->post('bank');

        $where['id_invoice'] = $id_invoice;
        $cek_id_invoice = $this->administator->get_data_where($where,'tbl_checkout');
        $jmldata = $cek_id_invoice->num_rows();

        if (empty($jmldata)) {
            $response['status'] = 'gagal';

            $response['pesan'] =  '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ID Invoice Salah!</div>';
        }else{
            $cek = $cek_id_invoice->row();
            $status = $cek->status;
            if ($status==2) {
                $response['status'] = 'gagal';

                $response['pesan'] =  '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Pemesanan Telah Diproses!</div>';
            }elseif ($status==1) {

                if(!empty($_FILES['picture']['name'])){

                    $config['upload_path']   = './images/konfirmasi/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
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
                        $conf['source_image'] = './images/konfirmasi/'.$picture_name;
                        $conf['new_image'] = './images/konfirmasi_thumb/'.$picture_name;
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

                $input['id_invoice'] = $id_invoice;
                $input['nama_pengirim'] = $nama_pengirim;
                $input['nominal'] = $nominal;
                $input['bank'] = $bank;
                $input['foto']=$picture_name;
                $input['status']=1;

                $this->administator->input_data($input,'tbl_konfirmasi');
                $response['pesan'] = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Konfirmasi Anda Akan Segera Diproses! Harap Hubungi Kami Apabila Ada Kesalahan</div>';
                $response['status'] = "sukses";
            }
        }

        echo json_encode($response);
    }
}
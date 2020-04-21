<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct() {
		parent::__construct();
			
			// $this->load->library('rajaongkir');
            $this->load->model('administator');
			$this->load->model('useradmin');
			$this->load->helper('user_helper');
            //$this->load->helper('cookie'); 
	}

	public function index(){
		redirect('shop/home');
	}

	//=======Checkout============
	//Page Checkout
	public function checkout(){
		$where['status']=1;
		$data['profiltoko'] = $this->administator->get_profiltoko()->row();
		$data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
		$data['headertitle'] = 'Checkout';
		$data['menu'] = '';

		$id_user = $this->session->userdata('id_user');
        $jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
        $data['item_cart'] = $jml_item;

        $id_user = $this->session->userdata('id_user');
        $where2 = array(
        	'tbl_cart.status' => 1,
        	'id_user' => $id_user
        );

        $data['list_cart'] = $this->administator->get_data_join_cart($where2,'tbl_cart')->result();
 	    $data['jml_data'] = $this->administator->get_data_join_cart($where2,'tbl_cart')->num_rows();

 	    $where3['status'] = 1;
 	    $data['list_bank'] = $this->administator->get_data_where($where3,'tbl_bank')->result();

		$this->load->view('web/checkout/v_checkout',$data);
	}

	//============Cek Ongkir ============
	//Get Province
	public function get_province(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
		    	"key: 2bff0f9069e32319910206e98b77152e"// API Key Anda
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			//echo "cURL Error #:" . $err;
			echo '<option disabled="disabled" selected="selected" value="">- Pilih Provinsi -</option>';
		} else {
			//echo $response;
			echo '<option disabled="disabled" selected="selected" value="">- Pilih Provinsi -</option>';
			$data = json_decode($response, true);
			for ($i=0; $i<count($data['rajaongkir']['results']); $i++) { 
		    	echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
		    }
		}
	}

	//Get City
	public function get_city(){		

		$provinsi = $this->input->post('provinsi');

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$provinsi,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
		    	"key: 2bff0f9069e32319910206e98b77152e"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			//echo "cURL Error #:" . $err;
			echo '<option disabled="disabled" selected="selected" value="">- Pilih Kota -</option>';
		} else {
			//echo $response;
			echo '<option disabled="disabled" selected="selected" value="">- Pilih Kota -</option>';
			$data = json_decode($response, true);
			for ($i=0; $i<count($data['rajaongkir']['results']); $i++) { 
		    	echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['type']." ".$data['rajaongkir']['results'][$i]['city_name']."</option>";
		    }
		}
	}

	//Get Biaya Ongkir
	public function get_cost()
	{
		//$this->load->helper('user_helper');

		$kota = $this->input->post('kota');
		$courier = $this->input->post('courier');

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=181&destination=".$kota."&weight=1000&courier=".$courier."",
			CURLOPT_HTTPHEADER => array(
		    	"content-type: application/x-www-form-urlencoded",
		   		"key: 2bff0f9069e32319910206e98b77152e"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			//echo $response;
			$data = json_decode($response, true);
			$biaya = $data['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
			echo $biaya;
		}
	}

	//Get Total (Total Barang+Ongkir)
	public function get_total()
	{
		$totalbarang = $this->input->post('totalbarang');
		$ongkir = $this->input->post('ongkir');	

		$total = $totalbarang+$ongkir;	

		$response = $total;

		echo $response;
	}

	//Get Bank
	public function get_bank()
	{
		$id_bank = $this->input->post('id_bank');	

		$where['id_bank'] = $id_bank;
		$cek = $this->administator->get_data_where($where,'tbl_bank')->row();
		$atasnama = $cek->atas_nama;
		$no_rek = $cek->no_rekening;

		$txt = "Atas Nama : ".$atasnama." </br>No. Rekening : ".$no_rek;

		$response = $txt;

		echo $response;
	}

	//Insert Pemesanan
	public function simpan_pesanan(){

		$id_user = $this->session->userdata('id_user');

		$nama_penerima = $this->input->post('nama_penerima');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$kurir = $this->input->post('kurir');
		$kode_pos = $this->input->post('kode_pos');
		$alamat = $this->input->post('alamat');
		$catatan = $this->input->post('catatan');
		$total_barang = $this->input->post('total_barang');
		$ongkir = $this->input->post('ongkir');
		$total = $this->input->post('total');
		$bank = $this->input->post('bank');
		

        $cek_id_checkout = $this->administator->cek_id_max('id_checkout','tbl_checkout')->row();
        if (!empty($cek_id_checkout)) {
            $id_checkout_max = $cek_id_checkout->id_checkout;
            $id_checkout_ex = explode('-', $id_checkout_max);
            $id_checkout_num = $id_checkout_ex[1];
            $id_checkout = cek_id_checkout($id_checkout_num);
            $idcheckout = id_checkout($id_checkout);
        }else{
            $idcheckout = 'CHK-001';
        }
        
        $date = date("Ymdhis");
        $id_invoice = 'INV-'.$date;

        $alamatlengkap = $alamat.', Kode Pos : '.$kode_pos;

		$status = '1';

        $input = array(
        	'id_checkout' => $idcheckout,
        	'id_user' => $id_user,
        	'id_invoice' => $id_invoice,
        	'nama_penerima' => $nama_penerima,
        	'telepon' => $telepon,
        	'email' => $email,
        	'kurir' => $kurir,
        	'alamat' => $alamatlengkap,
        	'catatan' => $catatan,
        	'total_barang' => $total_barang,
        	'ongkir' => $ongkir,
        	'total' => $total,
        	'bank' => $bank,
        	'status' => $status 
        );

        $where2 = array(
        	'status' => 1,
        	'id_user' => $id_user 
        );

        $update['status'] = 2;
        $update['id_checkout'] = $idcheckout;

		$this->administator->input_data($input,'tbl_checkout');
		$this->administator->update_data($where2,$update,'tbl_cart');
	}
}?>
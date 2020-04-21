<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct() {
		parent::__construct();
			
			$this->load->library('cart');
            $this->load->model('administator');
			$this->load->model('useradmin');
			$this->load->helper('user_helper');
	}

	public function index(){
		redirect('shop/home');
	}

	//Page My Cart
	public function mycart(){
		$id_user = $this->session->userdata('id_user');
		if (empty($id_user)) {
			redirect('shop/home');
		}else{
			$where['status']=1;
			$data['profiltoko'] = $this->administator->get_profiltoko()->row();
			$data['datakategori'] = $this->administator->get_data_where($where, 'tbl_kategori')->result();
			$data['headertitle'] = 'Keranjang Saya';
			$data['menu'] = '';

			$jml_item =  $this->administator->get_item_cart($id_user,'tbl_cart')->num_rows();
			$data['item_cart'] = $jml_item;

			$id_user = $this->session->userdata('id_user');
			$where2['id_user'] = $id_user;

			$where2 = array(
                'tbl_cart.status' => 1,
                'id_user' => $id_user
            );

			$data['list_cart'] = $this->administator->get_data_join_cart($where2)->result();
			$data['jml_data'] = $this->administator->get_data_join_cart($where2)->num_rows();

			$this->load->view('web/checkout/v_cart',$data);
		}
	}

	//Tambah ke Keranjang
	public function add_to_cart(){
		$id_user = $this->session->userdata('id_user');

		$cart_qty = $this->input->post('cart_qty');
		$cart_id_produk = $this->input->post('cart_id_produk');

		$status = 1;
		//Apabila produk yg sudah ada ditambah (add) maka akan update data
		$cek = $this->administator->cart_check($cart_id_produk,$id_user)->row();

		if (!empty($cek)) {
			$where = array(
				'tbl_cart.status' => 1,
				'id_produk' => $cart_id_produk,
				'id_user' => $id_user
			);
			$qty = $cek->qty;
			$update['qty'] = $qty+$cart_qty;

			$this->administator->update_data($where,$update,'tbl_cart');
		}else{
			$input['id_produk'] = $cart_id_produk;
			$input['id_user'] = $id_user;
			$input['qty'] = $cart_qty;
			$input['status'] = $status;

			$this->administator->input_data($input,'tbl_cart');
		}
		redirect('cart/mycart');
	}

	//Update Cart Plus
	public function update_cart_plus($id){
		$where['id'] = $id;
		$cek = $this->administator->get_data_where($where,'tbl_cart')->row();

		$qty = $cek->qty;
		$qty_up = $qty+1;

		$update['qty'] = $qty_up;

		$this->administator->update_data($where,$update,'tbl_cart');
		redirect('cart/mycart');
	}

	//Update Cart Minus
	public function update_cart_minus($id){
		$where['id'] = $id;
		$cek = $this->administator->get_data_where($where,'tbl_cart')->row();

		$qty = $cek->qty;
		$qty_up = $qty-1;

		$update['qty'] = $qty_up;

		$this->administator->update_data($where,$update,'tbl_cart');
		redirect('cart/mycart');
	}

	//Delete Cart
	public function delete_cart($id){
		$where['id'] = $id;

		$this->administator->delete_data($where,'tbl_cart');
		redirect('cart/mycart');
	}
}
?>
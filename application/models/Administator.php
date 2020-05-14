<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Administator extends CI_Model{

	// Cek data administrator di database
	function login_admin($username,$password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('tbl_admin');
	}

	function login($username,$password,$table){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get($table);
	}
	
	//Input Data
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	//ambil data
	function get_data($orderby,$ordertype,$tabel)
	{
		$this->db->order_by($orderby, $ordertype);
		return $this->db->get($tabel);
	}

	// Update data
	function update_data($where,$update,$table){
		$this->db->where($where);
		$this->db->update($table, $update);
	}

	// Update Batch
	function update_data_batch($where,$update,$table){
		$this->db->where($where);
		$this->db->update_batch($table, $update);
	}

	// Delete data
	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	//ambil data like
	function get_data_like($like,$orderby,$ordertype,$tabel)
	{
		if (!empty($like)) {
			$this->db->like($like);
		}
		$this->db->order_by($orderby, $ordertype);
		return $this->db->get($tabel);
	}
	// Ambil data
	function get_data_where($where,$table){
		$this->db->where($where);
		return $this->db->get($table);
	}

	// Ambil data
	function get_data_order($order,$orderby,$table){
		$this->db->order_by($order, $orderby);
		return $this->db->get($table);
	}

	// Ambil data
	function get_data_where_order_limit($where,$order,$orderby,$table){
		$this->db->where($where);
		$this->db->order_by($order, $orderby);
		$this->db->limit(9);
		return $this->db->get($table);
	}

	//Ambil data
	function get_data_cond($where,$like,$orderby,$ordertype,$offset,$jml,$table){
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($like)) {
			$this->db->like($like);
		}
		$this->db->order_by($orderby, $ordertype);
		$this->db->limit($jml, $offset);
		return $this->db->get($table);
	}

	// Ambil data paging
	function get_paging_cond($where,$like,$table){
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($like)) {
			$this->db->like($like);
		}
		return $this->db->get($table);
	}

	// Ambil data 
	function get_data_cond_two($where,$like,$like2,$orderby,$ordertype,$offset,$jml,$table){
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($like)) {
			$this->db->like($like);
			$this->db->or_like($like2);
		}
		$this->db->order_by($orderby, $ordertype);
		$this->db->limit($jml, $offset);
		return $this->db->get($table);
	}

	// Ambil data paging
	function get_paging_cond_two($where,$like,$like2,$table){
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($like)) {
			$this->db->like($like);
			$this->db->or_like($like2);
		}
		return $this->db->get($table);
	}

	// Auto Increment Admin ID
	function cek_id_admin_max($table){
		$this->db->select_max('id_admin');

		return $this->db->get($table);
	}

	// Auto Increment User ID 
	function cek_id_user_max($table){
		$this->db->select_max('id_user');

		return $this->db->get($table);
	}

	// Auto Increment Kategori ID 
	function cek_id_kategori_max($table){
		$this->db->select_max('id_kategori');

		return $this->db->get($table);
	}

	// Auto Increment ID 
	function cek_id_max($field,$table){
		$this->db->select_max($field);

		return $this->db->get($table);
	}

	//Ambil data
	function get_data_cond_join_produk($where,$like,$orderby,$ordertype,$offset,$jml){
		$this->db->select('tbl_produk1.*, tbl_kategori.id as id_ktg, tbl_kategori.nama_ktg as kategori, tbl_kategori.status as status_ktg'); 
		$this->db->from('tbl_produk1');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk1.id_kategori');
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($like)) {
			$this->db->like($like);
		}
		$this->db->order_by($orderby, $ordertype);
		$this->db->limit($jml, $offset);
		return $this->db->get();
	}

	function cart_check($cart_id_produk,$id_user){
		$this->db->where('id_user',$id_user);
		$this->db->where('id_produk',$cart_id_produk);
		$this->db->where('status',1);
		return $this->db->get('tbl_cart');
	}

	function get_item_cart($id_user,$table){
		$where = array(
			'id_user' => $id_user,
			'status' => 1
		);
		$this->db->where($where);
		return $this->db->get($table);
	}

	function get_data_join_cart($where){
		$this->db->select('tbl_cart.*, tbl_produk1.id as id_prdk, tbl_produk1.nama_produk as produk, , tbl_produk1.harga as harga'); 
		$this->db->from('tbl_cart');
		$this->db->join('tbl_produk1', 'tbl_produk1.id_produk = tbl_cart.id_produk');
		$this->db->where($where);
		return $this->db->get();
	}


	//Ambil data
	function get_data_cond_two_join_checkout($where,$like,$like2,$orderby,$ordertype,$offset,$jml){
		$this->db->select('tbl_checkout.*, tbl_user.id as id_usr, tbl_user.nama as nama, tbl_bank.id as id_bnk, tbl_bank.nama_bank as bank, tbl_bank.status as bank_sts'); 
		$this->db->from('tbl_checkout');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_checkout.id_user');
		$this->db->join('tbl_bank', 'tbl_bank.id_bank = tbl_checkout.bank');
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($like)) {
			$this->db->like($like);
			$this->db->or_like($like2);
		}
		$this->db->order_by($orderby, $ordertype);
		$this->db->limit($jml, $offset);
		return $this->db->get();
	}

	// Ambil data paging
	function get_paging_cond_two_join_checkout($where,$like,$like2){
		$this->db->select('tbl_checkout.*, tbl_user.id as id_usr, tbl_user.nama as nama'); 
		$this->db->from('tbl_checkout');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_checkout.id_user');
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($like)) {
			$this->db->like($like);
			$this->db->or_like($like2);
		}
		return $this->db->get();
	}

	//Ambil Data Where Checkout
	function get_data_checkout_join($where){
		$this->db->select('tbl_checkout.*, tbl_user.id as id_usr, tbl_user.nama as nama, tbl_bank.id as id_bnk, tbl_bank.nama_bank as bank, tbl_bank.status as bank_sts'); 
		$this->db->from('tbl_checkout');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_checkout.id_user');
		$this->db->join('tbl_bank', 'tbl_bank.id_bank = tbl_checkout.bank');
		if (!empty($where)) {
			$this->db->where($where);
		}
		return $this->db->get();
	}


	//Ambil data Join Konfirmasi
	function get_data_cond_two_join_confirm($where,$like,$like2,$orderby,$ordertype,$offset,$jml){
		$this->db->select('tbl_konfirmasi.*, tbl_checkout.id as id_chk, tbl_checkout.status as status_chk, tbl_checkout.total as total'); 
		$this->db->from('tbl_konfirmasi');
		$this->db->join('tbl_checkout', 'tbl_checkout.id_invoice = tbl_konfirmasi.id_invoice');
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($like)) {
			$this->db->like($like);
			$this->db->or_like($like2);
		}
		$this->db->order_by($orderby, $ordertype);
		$this->db->limit($jml, $offset);
		return $this->db->get();
	}

	// Ambil data paging
	function get_paging_cond_two_join_confirm($where,$like,$like2){
		$this->db->select('tbl_konfirmasi.*, tbl_checkout.id as id_chk, tbl_checkout.status as status_chk, tbl_checkout.total as total'); 
		$this->db->from('tbl_konfirmasi');
		$this->db->join('tbl_checkout', 'tbl_checkout.id_invoice = tbl_konfirmasi.id_invoice');
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($like)) {
			$this->db->like($like);
			$this->db->or_like($like2);
		}
		return $this->db->get();
	}

	//Get Notification
	function get_notification(){
		$this->db->select('tbl_konfirmasi.*, tbl_checkout.id as id_chk, tbl_checkout.status as status_chk'); 
		$this->db->from('tbl_konfirmasi');
		$this->db->join('tbl_checkout', 'tbl_checkout.id_invoice = tbl_konfirmasi.id_invoice');
		$where['tbl_checkout.status'] = 1;
		$this->db->where($where);
		return $this->db->get();
	}

	// Ambil data
	function get_checkout($id_invoice){
		$where['id_invoice'] = $id_invoice;
		$this->db->where($where);
		return $this->db->get('tbl_checkout');
	}

	// Ambil data
	function get_id_produk($id_checkout){
		$where['id_checkout'] = $id_checkout;
		$this->db->where($where);
		return $this->db->get('tbl_cart');
	}

	function total_barang($id){
		return $this->db->select('stok')
			->where('id_produk', $id)
			->get('tbl_produk1');
	}

	function cek_stok($id){
		$this->db->where('id_produk',$id);
		return $this->db->get('tbl_produk1');
	}

	function pengurangan_stok($pjl)
	{
		$this->db->update_batch('tbl_produk1', $pjl, 'id_produk');
	}


	function get_jml_user(){
		return $this->db->get('tbl_user');
	}
	function get_jml_produk(){
		$this->db->where('status',1);
		return $this->db->get('tbl_produk1');
	}
	function get_jml_penjualan(){
		return $this->db->get('tbl_penjualan');
	}
	function get_jml_pendapatan(){
		$this->db->select_sum('total');
		$query = $this->db->get('tbl_penjualan');
		if ($query->num_rows()>0) {
			return $query->row()->total;
		}else{
			return '0';
		}
	}

	// Profil Toko
	function get_profiltoko(){
		$where['status'] = 'profil';
		$this->db->where($where);
		return $this->db->get('tbl_profil');
	}

	// Ambil data
	function get_chart($bulan,$tahun){
		$this->db->where('MONTH(tgl_penjualan)',$bulan);
		$this->db->where('YEAR(tgl_penjualan)',$tahun);
		return $this->db->get('tbl_penjualan')->num_rows();
	}

	function cek_token($token,$url){
		$where = array(
			'token' => $token,
			'url' => $url
		);
		$this->db->where($where);
		return $this->db->get('tbl_tokens');
	}

	function update_token($token){
		$where['token'] = $token;
		$update['status'] = 2;
		$this->db->where($where);
		$this->db->update('tbl_tokens', $update);
	}
}
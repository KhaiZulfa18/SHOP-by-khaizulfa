<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Useradmin extends CI_Model{

	// Cek data administrator di database
	function login_admin($username,$password){
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		return $this->db->get('administrator');
	}

	// Update login adminstrator
	function update_login_admin($where,$update){
		$this->db->where($where);
		$this->db->update('administrator', $update);
	}

	//ambil data
	function get_data($orderby,$ordertype,$tabel)
	{
		$this->db->order_by($orderby, $ordertype);
		return $this->db->get($tabel);
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

	// Update data
	function update_data($where,$update,$table){
		$this->db->where($where);
		$this->db->update($table, $update);
	}

	// Ambil data administrator
	function get_list_admin($cariadmin,$offset,$jml){
		$this->db->like('username', $cariadmin);
		$this->db->or_like('nama', $cariadmin);
		$this->db->order_by('nama', 'ASC');
		$this->db->limit($jml, $offset);
		return $this->db->get('administrator');
	}

	// Ambil data paging administrator
	function get_paging_admin($cariadmin){
		$this->db->like('username', $cariadmin);
		$this->db->or_like('nama', $cariadmin);
		return $this->db->get('administrator');
	}

	// Ambil data ahli
	function get_list_ahli($cariahli,$offset,$jml){
		$this->db->like('nama', $cariahli);
		$this->db->order_by('nama', 'ASC');
		$this->db->limit($jml, $offset);
		return $this->db->get('ahli');
	}

	// Ambil data paging ahli
	function get_paging_ahli($cariahli){
		$this->db->like('nama', $cariahli);
		return $this->db->get('ahli');
	}

	// Ambil data member
	function get_list_member($idpaket,$carimember,$offset,$jml){
		if (!empty($idpaket)) {
			$this->db->where('paket', $idpaket);
		}
		if (!empty($carimember)) {
			$this->db->like('nama', $carimember);
		}
		$this->db->order_by('id', 'ASC');
		$this->db->limit($jml, $offset);
		return $this->db->get('user');
	}

	// Ambil data paging member
	function get_paging_member($idpaket,$carimember){
		if (!empty($idpaket)) {
			$this->db->where('paket', $idpaket);
		}
		if (!empty($carimember)) {
			$this->db->like('nama', $carimember);
		}
		return $this->db->get('user');
	}

	// Input data ke database
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	// Input data batch ke database
	function input_batch($data,$table){
		$this->db->insert_batch($table,$data);
	}

	// Hapus data dari database
	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	// Ambil data member
	function list_member_where($where,$idpaket,$carimember,$offset,$jml){
		$this->db->where($where);
		if (!empty($idpaket)) {
			$this->db->where('paket', $idpaket);
		}
		if (!empty($carimember)) {
			$this->db->like('nama', $carimember);
		}
		$this->db->order_by('id', 'ASC');
		$this->db->limit($jml, $offset);
		return $this->db->get('user');
	}

	// Ambil data paging member
	function paging_member_where($where,$idpaket,$carimember){
		$this->db->where($where);
		if (!empty($idpaket)) {
			$this->db->where('paket', $idpaket);
		}
		if (!empty($carimember)) {
			$this->db->like('nama', $carimember);
		}
		return $this->db->get('user');
	}

	// Ambil data
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
	function get_data_nolimit($where,$like,$orderby,$ordertype,$table){
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($like)) {
			$this->db->like($like);
		}
		$this->db->order_by($orderby, $ordertype);
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

	// Ambil data select distinct
	function get_data_distinct($select,$where,$table){
		$this->db->distinct();
		$this->db->select($select);
		$this->db->where($where); 
		return $this->db->get($table);
	}

}
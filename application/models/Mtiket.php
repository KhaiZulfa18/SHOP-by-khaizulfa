<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtiket extends CI_Model{
	public function tampil_data($tabel)
	{
		return $this->db->get($tabel);
	}

	public function tampil_data_where($where,$tabel)
	{
		$this->db->where($where);
		return $this->db->get($tabel);
	}

	public function input_data($input,$tabel)
	{
		$this->db->insert($tabel,$input);
	}

	public function tampil_data_like($like,$tabel)
	{
		$this->db->like($like);
		return $this->db->get($tabel);
	}

	function get_list_paging($like,$offset,$jml,$tabel){
		$this->db->like($like);
		//$this->db->order_by('nama', 'ASC');
		$this->db->limit($jml, $offset);
		return $this->db->get($tabel);
	}
	//Update data
	function update_data($where,$update,$tabel){
		$this->db->where($where);
		$this->db->update($tabel, $update);
	}
	//Hapus data
	function delete_data($where,$tabel){
		$this->db->where($where);
		$this->db->delete($tabel);
	}

	function cek_login($where,$tabel){		
		$this->db->where($where);
		return $this->db->get($tabel);
	}

}
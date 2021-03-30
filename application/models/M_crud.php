<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model {


	public function get_loket($table, $order){
		$this->db->select('*');
		$this->db->from($table);		
		$this->db->order_by($order);
		$sql = $this->db->get();
		return $sql;
	}

	public function get_antri($field, $table, $where){
		$this->db->select_max($field);
		$this->db->from($table);
		$this->db->where($where);		
		$sql = $this->db->get();
		return $sql;
	}

	public function get_antri_loket($field, $table, $where, $order){
		$this->db->select($field);
		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by($order);		
		$sql = $this->db->get();
		return $sql;
	}

	public function get_inisial_loket($field, $table, $where){
		$this->db->select($field);
		$this->db->from($table);
		$this->db->where($where);
		$sql = $this->db->get();
		return $sql;

	}

	public function get_antrian_terakhir($field, $table, $where){
		$this->db->select_max($field);
		$this->db->from($table);
		$this->db->where($where);
		$sql = $this->db->get();
		return $sql;
	}

	public function get_antrian_selanjutnya($field, $table, $where){	
		$this->db->select_min($field);
		$this->db->from($table);
		$this->db->where($where);
		$sql = $this->db->get();
		return $sql;
	}

	public function get_sisa_antrian($field, $table, $where){
		$this->db->select($field);
		$this->db->from($table);
		$this->db->where($where);
		$sql = $this->db->get();
		return $sql;
	}

	public function get_nomer($field, $table, $order){
		$this->db->select($field);
		$this->db->from($table);
		$this->db->order_by($order);
		$sql = $this->db->get();
		return $sql;
	}

	public function get_antrian_panggil($field, $table, $where){
		//$this->db->query('SELECT MIN(NoAntri) as anterian, SUBSTRING(NoAntri, 1, 1) as Abjad FROM tbnoantri WHERE SUBSTRING(NoAntri, 1, 1) = "'.$abjad.'" AND DATE(Tanggal) = "'.$tanggal.'" AND Panggil = 1 AND Selesai = 0 AND LOKET = "'.$loket.'" ')->row();
		$this->db->select_min($field);
		$this->db->from($table);
		$this->db->where($where);
		$sql = $this->db->get();
		return $sql;

	}


}

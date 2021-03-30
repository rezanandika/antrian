<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {
  public function __construct(){
    parent:: __construct();

    $this->load->model('M_crud');
  }


  public function index()
  {
    $tanggal = date('Ymd');
  	
    $data['loket'] = $this->M_crud->get_loket('tbloket', 'Nama ASC')->result_array();
    $this->load->view('Antrian-tampilan-fix.php', $data);

    //$data['loket'] = $this->M_crud->show('tbloket', 'Nama ASC')->result();
    //$data['loket'] = $this->db->query('SELECT * FROM tbloket ORDER BY Nama ASC')->result_array();
    //$data['antri'] = $this->db->query('SELECT MAX(AWAL) as awal, SUBSTRING(AWAL, 1) as antrianmax, loket FROM tbpanggil WHERE DATE(Tanggal) = "'.$tanggal.'" ')->row();
    
    
  }

  	public function get_antri(){

		$id_loket = $_POST['nourut'];
    $tanggal = date('Ymd');
    $where = array('DATE(Tanggal)' => $tanggal, 'loket' => $id_loket);
    $antri = $this->M_crud->get_antri('awal', 'tbpanggil', $where, 'awal desc')->row();

    echo json_encode($antri->awal);
		
    //pakai
    // $antri = $this->db->query('SELECT MAX(AWAL) as awal, SUBSTRING(AWAL, 1) as antrianmax, loket FROM tbpanggil WHERE loket = "'.$id_loket.'"  AND DATE(Tanggal) = "'.$tanggal.'" ')->row();
    //echo $antri->awal;
	}

  public function get_antri_loket(){

    $tanggal = date('Ymd');
    $where = array('DATE(Tanggal)' => $tanggal);
    $antri = $this->M_crud->get_antri_loket('awal, NmLoket', 'tbpanggil', $where, 'awal desc')->row();
   
    if(!empty($antri->awal)){
      echo json_encode($antri->awal.'-'.$antri->NmLoket);
    }else{
      echo json_encode("-");
    }

    // $antri = $this->db->query('SELECT MAX(AWAL) as awal, loket, NmLoket FROM tbpanggil WHERE DATE(Tanggal) = "'.$tanggal.'" ')->row();
    //$antri = $this->db->query('SELECT AWAL, NmLoket FROM tbpanggil WHERE DATE(Tanggal) = "'.$tanggal.'" ORDER BY AWAL DESC')->row();
  }

   public function get_antri_ini(){

    $tanggal = date('Ymd');
    $where = array('DATE(Tanggal)' => $tanggal);
    $antri = $this->M_crud->get_antri('awal', 'tbpanggil', $where, 'awal desc')->row();
    echo json_encode($antri->awal);
  }

   

}
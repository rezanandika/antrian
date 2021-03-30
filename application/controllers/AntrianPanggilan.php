<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AntrianPanggilan extends CI_Controller {
	public function __construct(){
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent:: __construct();

		$this->load->model('M_crud');
		$this->load->library('session');
		$this->load->helper('url'); 
		$this->redirect_url = 'AntrianPanggilan';
		
	}
	public function index()
	{
		$id = $this->session->userdata('nomorloket');
		$abjad = $this->session->userdata('sessionabjad');
		$tanggal = date('Ymd');

		$where1 = array('NOURUT' => $id);
		$where2 = array('KODE' => $abjad, 'DATE(Tanggal)' => $tanggal, 'Loket' => $id, 'panggil' => 0);
		$data['inisialloket'] = $this->M_crud->get_inisial_loket('Nama', 'tbloket', $where1 )->row();
		$data['antrian'] = $this->M_crud->get_antrian_terakhir('AWAL', 'tbpanggil', $where2 )->row();
		
		$this->load->view('Antrian-panggilan-fix', $data);
		$this->load->view('Panggil.php');
		//$data['inisialloket'] = $this->db->query('SELECT Nama FROM tbloket WHERE NOURUT = "'.$id.'" ')->row();
		//$data['loket'] = $this->db->query("SELECT NoAntri as NoAntri FROM tbnoantri ORDER BY NoAntri ASC")->result_array();
		//$data['antrian'] = $this->db->query('SELECT MAX(AWAL) as AWAL FROM tbpanggil WHERE KODE = "'.$abjad.'"  AND DATE(Tanggal) = "'.$tanggal.'" AND Loket = "'.$id.'" AND panggil = 0 ')->row();


		// $data['antrianxyz'] = $this->db->query('SELECT MAX(NoAntri) as anterian, SUBSTRING(NoAntri, 1, 1) as Abjad FROM tbnoantri WHERE  DATE(Tanggal) = "'.$tanggal.'" AND Panggil = 1 AND Selesai = 0 ')->row();
		// $data['antrian'] = $this->db->query('SELECT MIN(NoAntri) as NoAntri, SUBSTRING(NoAntri, 1, 1) as Abjad FROM tbnoantri WHERE SUBSTRING(NoAntri, 1, 1) = "'.$abjad.'"  AND DATE(Tanggal) = "'.$tanggal.'" AND panggil = 0 ')->row();
		// $data['sisaantrian'] = $this->db->query('SELECT COUNT(NoAntri) as sisa FROM tbnoantri WHERE DATE(Tanggal) = "'.$tanggal.'" AND Panggil = 0 AND Selesai = 0')->row();
		// $data['getantrian'] = $this->db->query('SELECT MIN(NoAntri) as antrian FROM tbnoantri WHERE DATE(Tanggal) = "'.$tanggal.'" AND Panggil = 0 AND Selesai = 0 ')->row();
		// $data['abjad'] = $this->db->query('SELECT SUBSTRING(NoAntri, 1, 1) as Abjad FROM tbnoantri WHERE DATE(Tanggal) = "'.$tanggal.'" AND Panggil = 0 AND Selesai = 0')->row();
		// $data['sisaantrian'] = $this->db->query('SELECT COUNT(NoAntri) as NoAntri FROM tbnoantri WHERE DATE(Tanggal) = "'.$tanggal.'" AND Panggil = 0 AND Selesai = 0')->row();
		// $data['sisaantrian'] = $this->db->query('SELECT MAX(NoAntri) as NoAntri, SUBSTRING(NoAntri, 1, 1) as Abjad FROM tbnoantri WHERE DATE(Tanggal) = "'.$tanggal.'" ')->row();
		
	}
	
	public function antrian_selanjutnya(){
		$tanggal = date('Ymd');
		$abjad = $_GET['abjad'];
		$where = array('SUBSTRING(NoAntri, 1, 1)=' => $abjad, 'DATE(Tanggal)' => $tanggal, 'Panggil' => 0, 'Selesai' => 0);
		$query = $this->M_crud->get_antrian_selanjutnya('NoAntri', 'tbnoantri', $where)->row();

		//echo json_encode($query->NoAntri);
		//$this->update_antrian(); 
		
		$query2 = $this->db->query("SELECT NoAntri from tbnoantri WHERE Panggil = 1 AND Selesai = 0  ORDER BY NoAntri DESC ")->row();
		
		$a = isset($query->NoAntri) ? TRUE : FALSE;
		$b = isset($query2->NoAntri) ? TRUE : FALSE;
		$c = $query->NoAntri;

		$hasil = array('aktif' => $a, 'before' => $b, 'hasil' => $c);
		if($a == TRUE && $b == FALSE){
			
			$this->update_antrian(); 
			echo json_encode($hasil);
		}else echo false;


		

		//$loket = $_GET['loket'];
		//$query = $this->db->query('SELECT MIN(NoAntri) as NoAntri FROM tbnoantri WHERE SUBSTRING(NoAntri, 1, 1) = "'.$abjad.'" AND DATE(Tanggal) = "'.$tanggal.'" AND Panggil = 0 AND Selesai = 0 ')->row();

	}

	public function update_antrian(){
		$tanggal = date('Ymd');
		$loket = $_GET['loket'];
		$abjad = $_GET['abjad'];

		$query = $this->db->query('SELECT MIN(NoAntri) as NoAntri FROM tbnoantri WHERE SUBSTRING(NoAntri, 1, 1) = "'.$abjad.'" AND DATE(Tanggal) = "'.$tanggal.'" AND Panggil = 0 AND Selesai = 0 ')->row();

		$data = array(
		'Panggil' => '1',
		'Loket' => $loket
		// 'Selesai' => '1',
		//'date' => $date
		);

		$this->db->where('NoAntri', $query->NoAntri);
		$this->db->update('tbnoantri', $data);
	}

	public function update_selesai(){
		$tanggal = date('Ymd');
		$antrian = $_POST['antrian'];

		$data = array(
		'Selesai' => '1'
		//'Loket' => $loket
		// 'Selesai' => '1',
		//'date' => $date
		);

		$where = array('NoAntri' => $antrian, 'DATE(Tanggal)' => $tanggal);
		$this->db->where($where);
		$this->db->update('tbnoantri', $data);
	}

	public function get_sisa_antrian(){
		$tanggal = date('Ymd');
		$abjad = $_GET['abjad'];
		$where = array('SUBSTRING(NoAntri, 1, 1)=' => $abjad, 'DATE(Tanggal)' => $tanggal, 'Panggil' => 0, 'Selesai' => 0);
		$query = $this->M_crud->get_sisa_antrian('NoAntri', 'tbnoantri', $where)->num_rows();
		echo json_encode($query);

		// $loket = $_GET['loket'];
		//$query = $this->db->query('SELECT COUNT(NoAntri) as NoAntri FROM tbnoantri WHERE SUBSTRING(NoAntri, 1, 1) = "'.$abjad.'" AND DATE(Tanggal) = "'.$tanggal.'" AND Panggil = 0 AND Selesai = 0 ')->row();

	}

	public function insert_panggil(){
		$tanggal = date('Ymd');
		$kode = $_POST['kode'];
		$urutanloket = $_POST['urutanloket'];
		$loket = $_POST['loket'];
		$namaloket = $_POST['namaloket'];
		if($loket == 0){
			$bunyiloket = '1.wav';
		}else if($loket == 1){
			$bunyiloket = '2.wav';
		}
		$urutanloket1 = substr($urutanloket,2, 3);
		$urutanloket2 = intval($urutanloket1);

		$query = $this->db->query('SELECT AWAL FROM tbPanggil WHERE AWAL = "'.$urutanloket.'" AND DATE(Tanggal) = "'.$tanggal.'"')->num_rows();

		if($query > 0){
			
		}else{
			$data = array(
				'KODE' => $kode,
				'AWAL' => $urutanloket,
				'AKHIR' => $urutanloket,
				'Loket' => $loket,
				'NmLoket' => $namaloket,
				'NamaPanggil' => $namaloket,
				'NoAntrian' => ', '.$kode.','.$urutanloket2.'',
				'Panggil' => 0,
				'Tanggal' => date('Y-m-d H:i:s'),
				'fileLoket' => 'DILOKET.wav',
				'fileNoLoket' => $bunyiloket,
				'LEWATI' => 0,
			);
			
			$this->db->insert('tbPanggil', $data);

		}


	}
	public function set_session(){
		$_SESSION['nomorloket'] = $_POST['nomor'];
	}

	public function set_session_abjad(){
		$_SESSION['sessionabjad'] = $_POST['nomorabjad'];
	}

	public function destroy(){
		unset($_SESSION['nomorloket']);
		unset($_SESSION['sessionabjad']);
		redirect($this->redirect_url, 'refresh');
	}

	public function panggil(){
		$id = $this->session->userdata('nomorloket');
		$tanggal = date('Ymd');
		$loket = $_GET['loket'];
		$abjad = $_GET['abjad'];

		$where1 = array('NOURUT' => $id);
		//$where2 = array('SUBSTRING(NoAntri, 1, 1)' => $abjad, 'DATE(Tanggal)' => $tanggal, 'Loket' => $loket, 'panggil' => 0, 'selesai' => 0);
		$data['inisialloket'] = $this->M_crud->get_inisial_loket('Nama', 'tbloket', $where1 )->row();
		$data['loket'] = $this->M_crud->get_nomer('NoAntri', 'tbnoantri', 'NoAntri ASC')->result_array();
		$this->load->view('panggil', $data);

		//$data['antrianx'] = $this->M_crud->get_antrian_panggil('NoAntri, SUBSTRING()', 'tbpanggil', $where2 )->row();
		$data['antrianx'] = $this->db->query('SELECT MIN(NoAntri) as anterian, SUBSTRING(NoAntri, 1, 1) as Abjad FROM tbnoantri WHERE SUBSTRING(NoAntri, 1, 1) = "'.$abjad.'" AND DATE(Tanggal) = "'.$tanggal.'" AND Panggil = 1 AND Selesai = 0 AND LOKET = "'.$loket.'" ')->row();
		//$data['inisialloket'] = $this->db->query('SELECT Nama FROM tbloket WHERE NOURUT = "'.$id.'" ')->row();
		//$data['loket'] = $this->db->query("SELECT NoAntri as NoAntri FROM tbnoantri ORDER BY NoAntri ASC")->result_array();

	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent:: __construct();

		$this->load->model('M_crud');
		// if($this->session->userdata('level') !== 'Penjaga'){
		// 	redirect('welcome/');
		// }
	}
public function index()
	{
		$this->load->view('cek');
	}
}

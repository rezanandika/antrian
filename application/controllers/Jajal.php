<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jajal extends CI_Controller {

public function index()
	{
        $data['awal'] = 1;
        $this->load->view('jajal', $data);
    }
}
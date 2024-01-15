<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TentangKami extends CI_Controller {
	public function index()
	{
		$this->load->view('tentangKami');
	}
}
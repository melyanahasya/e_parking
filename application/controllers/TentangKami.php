<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TentangKami extends CI_Controller {
	public function index()
	{
		$data['title'] = 'Home Page';
		$this->load->view('tentangKami', $data);
	}
}
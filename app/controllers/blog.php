<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$page = $this->uri->segment(3);
		$config['base_url'] = base_url()."blog/index";
		$config['total_rows'] = $this->postModel->numposts();
		$config['per_page'] = 5; 
		$config['full_tag_open'] = '<p class="pagination">';
		$config['full_tag_close'] = '</p>';
		$config['last_link'] = 'Last';
		$config['next_link'] = '>>';
		$config['prev_link'] = '<<';
		$config['cur_tag_open'] = '<b class="active">';
		$config['cur_tag_close'] = '</b>';
		$this->pagination->initialize($config); 
		$data['posts'] = $this->postModel->getposts($page);
		$data['recentposts'] = $this->postModel->getrecentposts();
		$this->load->view('home',$data);
	}

	
}

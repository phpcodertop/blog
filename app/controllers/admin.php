<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('postModel');
	}
	
	public function index()
	{
		
		$this->load->view('admin/index');
	}

	public function addPost()
	{
		$this->form_validation->set_rules('title','post title','required');
		$this->form_validation->set_rules('body','post body','required');
		if($this->form_validation->run() == false){
			$this->load->view('admin/addpost');
		}else{
			$data = array(
					'title' => $this->input->post('title'),
					'body' => $this->input->post('body')
				);
			if($this->postModel->addpost($data)){
				$this->session->set_flashdata('added','post added successfuly');
				$this->load->view('admin/addpost');
			}
		}
		
	}

	public function editPost()
	{
		//get post data
		$postid = $this->uri->segment(3);
		$row = $this->postModel->getpostdata($postid);
		$data['title'] = $row->title;
		$data['body'] = $row->body;
		$this->form_validation->set_rules('title','post title','required');
		$this->form_validation->set_rules('body','post body','required');
		if($this->form_validation->run() == false){
			$this->load->view('admin/editpost',$data);
		}else{
			$data2 = array(
					'title' => $this->input->post('title'),
					'body' => $this->input->post('body')
				);
			if($this->postModel->editpost($postid,$data2)){
				$this->session->set_flashdata('edited','post edited successfuly');
				$row = $this->postModel->getpostdata($postid);
				$data['title'] = $row->title;
				$data['body'] = $row->body;
				$this->load->view('admin/editPost',$data);
			}
		}
		
	}

	public function viewposts()
	{
		# code...
		$page = $this->uri->segment(3);
		$config['base_url'] = base_url()."admin/viewPosts";
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
		$this->load->view('admin/viewPosts',$data);
	}

	public function deletepost()
	{
		# code...
		$postid = $this->uri->segment(3);
		if($this->postModel->deletepost($postid)){
			redirect(base_url().'admin/viewposts');
		}
	}
}

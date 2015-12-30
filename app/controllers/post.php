<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
	public function index(){
		$postId = $this->uri->segment(3);
		$data['comments'] = $this->postModel->getpostcomments($postId);
		$data['post'] = $this->postModel->getpostdata($postId);
		$data['recentposts'] = $this->postModel->getrecentposts();
		$this->load->view('post',$data);
	}

	public function comment()
	{
		$postId = $this->input->post('postid');
		$this->form_validation->set_rules('postername','Name','required');
		$this->form_validation->set_rules('commentbody','Comment','required');
		if($this->form_validation->run() == false){
			redirect(base_url().'post/index/'.$postId);
		}else{
			$postId = $this->input->post('postid');
			$data = array(
				'posterName' => $this->input->post('postername'),
				'commentBody' => $this->input->post('commentbody'),
				'postId' => $this->input->post('postid')
				);
			if($this->postModel->addcomment($data)){
				redirect(base_url().'post/index/'.$postId);
			}
		}
	}
}
?>	
<?php 
class PostModel extends CI_Model {
	public function addpost($data){
		return $this->db->insert('posts',$data);
	}

	public function editpost($postid,$data){
		$this->db->where('postId',$postid);
		return $this->db->update('posts',$data);
	}

	public function deletepost($postid){
		$this->db->where('postId',$postid);
		return $this->db->delete('posts');
	}

	public function numposts(){
		$query = $this->db->get('posts');
		return $query->num_rows();
	}

	public function getpostdata($postid){
		$this->db->where('postId',$postid);
		$query = $this->db->get('posts');
		return $query->row();
	}

	public function getposts($page){
		$this->db->limit(5,$page);
		$query = $this->db->get('posts');
		return $query->result();
	}

	public function getrecentposts(){
		$this->db->limit(5);
		$this->db->order_by('postId','desc');
		$query = $this->db->get('posts');
		return $query->result();
	}

	public function getpostcomments($postId){
		$this->db->where('postId',$postId);
		$query = $this->db->get('comments');
		return $query->result();
	}

	public function addcomment($data){
		return $this->db->insert('comments',$data);
	}

}
?>
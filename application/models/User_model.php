<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class User_model extends CI_Model
{
	public function get_user($data){
		$this->db->where('id', $data['id']);
		$result = $this->db->get('tbl_user')->result();
		return $result;
	}
	public function login($data){
		$this->db->where('email', $data['email']);
		$this->db->where('password', $data['password']);
    $this->db->where('active', 1);
		$result = $this->db->get('tbl_user')->result();

		return $result;
	}

	public function read(){
       $query = $this->db->query("select * from `tbl_user`");
       return $query->result_array();
   }
   public function insert($data){
       
       $data = array(
       		'first_name' => $data['first_name'],
       		'last_name' => $data['last_name'],
       		'email' => $data['email'],
       		'password' => $data['password'],
       		'profile_pic' => $data['profile_pic'],
       		'role' => $data['role'],
       		'active' => $data['active'] 
       );
       if($this->db->insert('tbl_user'))
       {    
           return 'done';
       }
         else
       {
           return "fail";
       }
   }
   public function update($id,$data){
   
       $data = array(
       		'first_name' => $data['first_name'],
       		'last_name' => $data['last_name'],
       		'email' => $data['email'],
       		'password' => $data['password'],
       		'profile_pic' => $data['profile_pic'],
       		'role' => $data['role'],
       		'active' => $data['active'] 
       );
       $result = $this->db->update('tbl_user');
       if($result)
       {
           return "done";
       }
       else
       {
           return "fail";
       }
   }
   public function delete($id){
   		
   		$this->db->where('id', $id);
       $result = $this->db->delete("tbl_user");
       if($result)
       {
           return "done";
       }
       else
       {
           return "fail";
       }
   }
}


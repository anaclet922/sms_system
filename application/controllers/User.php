<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
    }


	public function index()
	{
		
		if(!isset($this->session->user_data)){
        	redirect('user/login', 'refresh');
        }else{
			if($this->session->user_data[0]->role == 'member'){
	        	redirect('admin', 'refresh');
	        }else if($this->session->user_data[0]->role == 'member'){
	        	redirect('user', 'refresh');
	        }
        }

	}
	public function login()
	{
	
		$seo_data['seo_data'] = array(
			'title' => 'Login',
		);

		$this->load->view('_parts/_header', $seo_data);
		$this->load->view('login');
		$this->load->view('_parts/_footer');

	}
	public function forgot_password(){
		$seo_data['seo_data'] = array(
			'title' => 'Forgot password',
		);

		$this->load->view('_parts/_header', $seo_data);
		$this->load->view('forgot_password');
		$this->load->view('_parts/_footer');
	}
	public function post_login(){

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE){
			redirect('user/login', 'refresh');
		}

		$data = array(
			'email' => $_POST['email'],
			'password' => hash("sha512", $_POST['password'])
		);
		$r = $this->user_model->login($data);
		if(count($r) > 0){
			$this->session->set_userdata('user', $r); 
			redirect('admin', 'refresh');
		}else{
			 $this->session->set_flashdata('msg', 'Incorrect e-mail or password!!');
             $this->session->set_flashdata('alert', 'danger');
			redirect('user/login', 'refresh');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}
	public function change_user_password(){
		if(!$this->session->user){
        	redirect('user/login', 'refresh');
        }


		$this->form_validation->set_rules('old_password', 'Old Password', 'required|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|min_length[5]');

        if (!$this->form_validation->run()){
        	$this->session->set_flashdata('msg', validation_errors());
			$this->session->set_flashdata('alert', 'danger');
			redirect($this->agent->referrer(), 'refresh');
		}

		$old_password = hash("sha512", $_POST['old_password']);

		if($old_password != $this->session->user[0]->password){
			$this->session->set_flashdata('msg', 'Old password is incorrect!');
			$this->session->set_flashdata('alert', 'danger');
			redirect($this->agent->referrer(), 'refresh');
			// echo $old_password . '<hr>' . $this->session->user[0]->password;
		}

		$password = hash("sha512", $_POST['password']);

		$this->db->set('password', $password);
		$this->db->where('id', $this->session->user[0]->id);
		$this->db->update('tbl_user');

		$this->db->where('id', $this->session->user[0]->id);
		$result = $this->db->get('tbl_user')->result();
		$this->session->set_userdata('user', $result);

		$this->session->set_flashdata('msg', 'Password changed!');
		$this->session->set_flashdata('alert', 'success');

		redirect($this->agent->referrer(), 'refresh');
	}
	public function change_info(){

		if(!$this->session->user){
        	redirect('user/login', 'refresh');
        }

        if(empty($_FILES['imgInpLogoChooser']['name'])){
        	$this->db->set('first_name', $_POST['first_name']);
            $this->db->set('last_name', $_POST['last_name']);
            $this->db->set('email', $_POST['email']);
            $this->db->where('id', $this->session->user[0]->id);
			$this->db->update('tbl_user');

            $this->db->where('id', $this->session->user[0]->id);
			$result = $this->db->get('tbl_user')->result();
			$this->session->set_userdata('user', $result);

			$this->session->set_flashdata('msg', 'Profile updated!!');
	        $this->session->set_flashdata('alert', 'success');
        }else{
			$config['upload_path'] = './assets/img/';
	        $config['allowed_types'] = 'jpg|png';
	        $new_name = time();
	        $config['file_name'] = $new_name;
	        $this->upload->initialize($config);

	         if ($this->upload->do_upload('imgInpLogoChooser')){

	         	$image_metadata = $this->upload->data();

	            $this->db->set('profile_pic', $image_metadata['file_name']);
	            $this->db->set('first_name', $_POST['first_name']);
	            $this->db->set('last_name', $_POST['last_name']);
	            $this->db->set('email', $_POST['email']);
	            $this->db->where('id', $this->session->user[0]->id);
				$this->db->update('tbl_user');

	            $this->db->where('id', $this->session->user[0]->id);
				$result = $this->db->get('tbl_user')->result();
				$this->session->set_userdata('user', $result);

	            $this->session->set_flashdata('msg', 'Profile updated!!');
	            $this->session->set_flashdata('alert', 'success');
	         }else{
	         	$this->session->set_flashdata('msg', $this->upload->display_errors());
				$this->session->set_flashdata('alert', 'danger');
	         }
	    }
         redirect($this->agent->referrer(), 'refresh');
	}
	public function generateRandomString($length = 6) {
	    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	
	public function forgot(){
		$email = $_POST['email'];

		$this->db->where('email', $email);
		$r = $this->db->get('tbl_user')->result();

		if(count($r) == 1){
			$password = $this->generateRandomString(6);
			$new_p = hash("sha512", $password);

			$this->db->set('password', $new_p);
			$this->db->where('email', $email);
			$this->db->update('tbl_user');

			//mail a code
			$subject = 'New Password';

			//$email = $_POST['email'];
       	   //Email content
	        $htmlContent = '<center><h2>' . webSettings()['site_name'] . '</h2>';
	        $htmlContent .= '<p>';
	        $htmlContent .= 'Hello!, Your new password is <br/>' . $password . '</p>';
	       
	        $htmlContent .= '<p>Thank you!</p> </center>';
	                
	       $a = $this->email_model->mailAgent($email, $htmlContent, $subject);
	       $this->session->set_flashdata('msg', 'Check email inbox for new password!!');
			$this->session->set_flashdata('alert', 'success');
	       
		}else{
			$this->session->set_flashdata('msg', 'No account associated with this email!!');
			$this->session->set_flashdata('alert', 'danger');
		}
		redirect($this->agent->referrer(), 'refresh');
	}
}

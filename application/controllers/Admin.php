<?php
	defined('BASEPATH') OR exit('No direct script access allowed');



class Admin extends CI_Controller {

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

        if(!$this->session->user){
        	redirect('user/login', 'refresh');
        }
    }


	public function index()
	{

		$seo_data['seo_data'] = array(
			'title' => 'Dashboard',
		);

		$data = array();


		$this->db->order_by('created_at', 'DESC');
		$m = $this->db->get('tbl_incoming_sms')->result();
		$data['last_id'] = $m[0]->sms_id;


		$data['groups'] = count($this->db->get('tbl_groups')->result());
		$data['sent_sms'] = count($this->db->get('tbl_sent_sms')->result());
		$data['incoming_sms'] = count($this->db->get('tbl_incoming_sms')->result());
		$data['users'] = count($this->db->get('tbl_user')->result());

		$this->load->view('user/_header', $seo_data);
		$this->load->view('user/home', $data);
		$this->load->view('user/_footer');
	}

	

	public function settings(){
		$seo_data['seo_data'] = array(
			'title' => 'Settings',
		);

		$data = array();

		$this->db->order_by('created_at', 'DESC');
		$m = $this->db->get('tbl_incoming_sms')->result();
		$data['last_id'] = $m[0]->sms_id;

		$this->load->view('user/_header', $seo_data);
		$this->load->view('user/settings', $data);
		$this->load->view('user/_footer');
	}
	public function change_logo(){

		$config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png|svg';
        $new_name = time();
        $config['file_name'] = $new_name;
        $this->upload->initialize($config);

         if ($this->upload->do_upload('imgInpLogoChooser')){
                $image_metadata = $this->upload->data();

                $this->db->set('value', $image_metadata['file_name']);
                $this->db->where('config_key', 'logo');
                $this->db->update('tbl_config');

                $this->session->set_flashdata('msg', 'Website logo changed!!');
                $this->session->set_flashdata('alert', 'success');
         }else{
         	// print_r($this->upload->display_errors());
			$this->session->set_flashdata('msg', $this->upload->display_errors());
			$this->session->set_flashdata('alert', 'danger');
         }
         
         redirect($this->agent->referrer(), 'refresh');

	}
	public function change_favicon(){
		$config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png|svg';
        $new_name = time();
        $config['file_name'] = $new_name;
        $this->upload->initialize($config);

         if ($this->upload->do_upload('imgInpLogoChooser')){
                $image_metadata = $this->upload->data();

                $this->db->set('value', $image_metadata['file_name']);
                $this->db->where('config_key', 'favicon');
                $this->db->update('tbl_config');

                $this->session->set_flashdata('msg', 'Website favicon changed!!');
                $this->session->set_flashdata('alert', 'success');
         }else{
         	// print_r($this->upload->display_errors());
			$this->session->set_flashdata('msg', $this->upload->display_errors());
			$this->session->set_flashdata('alert', 'danger');
         }
         
         redirect($this->agent->referrer(), 'refresh');
	}
	public function change_info(){
		$this->db->set('value', $_POST['site_name']);
        $this->db->where('config_key', 'site_name');
        $this->db->update('tbl_config');

        $this->db->set('value', $_POST['site_description']);
        $this->db->where('config_key', 'site_description');
        $this->db->update('tbl_config');
        
        $this->db->set('value', $_POST['site_keywords']);
        $this->db->where('config_key', 'site_keywords');
        $this->db->update('tbl_config');
        
		 $this->session->set_flashdata('msg', 'Website info changed!!');
	     $this->session->set_flashdata('alert', 'success');

		redirect($this->agent->referrer(), 'refresh');
	}
	public function profile(){
		$seo_data['seo_data'] = array(
			'title' => 'Profile',
		);

		$data = array();

		$this->db->order_by('created_at', 'DESC');
		$m = $this->db->get('tbl_incoming_sms')->result();
		$data['last_id'] = $m[0]->sms_id;

		$this->load->view('user/_header', $seo_data);
		$this->load->view('user/profile', $data);
		$this->load->view('user/_footer');
	}
	public function add_group(){
		$seo_data['seo_data'] = array(
			'title' => 'New stream',
		);

		$this->load->view('user/_header', $seo_data);
		$this->load->view('user/create_group');
		$this->load->view('user/_footer');
	}
	
	public function change_currency(){
		$this->db->set('value', $_POST['site_currency']);
        $this->db->where('config_key', 'site_currency');
        $this->db->update('tbl_config');

        $this->session->set_flashdata('msg', 'Website currency changed!!');
	    $this->session->set_flashdata('alert', 'success');

		redirect($this->agent->referrer(), 'refresh');
	}


	// public function update_vod(){

	// }
	// public function vods(){
		
	// }
	
	function generateRandomString($length = 3) {
	    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	
	public function p_404(){
		$seo_data['seo_data'] = array(
			'title' => 'Lost in space'
		);

		$this->load->view('user/_header', $seo_data);
		$this->load->view('user/_404');
		$this->load->view('user/_footer');		
	}
	
	public function change_social_media(){

		$this->db->set('value', $_POST['facebook']);
		$this->db->where('config_key', 'footer_facebook');
		$this->db->update('tbl_config');

		$this->db->set('value', $_POST['twitter']);
		$this->db->where('config_key', 'footer_twitter');
		$this->db->update('tbl_config');

		$this->db->set('value', $_POST['youtube']);
		$this->db->where('config_key', 'footer_youtube');
		$this->db->update('tbl_config');

		$this->db->set('value', $_POST['linkedin']);
		$this->db->where('config_key', 'footer_linkedin');
		$this->db->update('tbl_config');

		redirect($this->agent->referrer(), 'refresh');
	}
	public function change_footer_about(){
		$this->db->set('value', $_POST['about']);
		$this->db->where('config_key', 'footer_about');
		$this->db->update('tbl_config');

		redirect($this->agent->referrer(), 'refresh');
	}
	public function change_footer_address(){
		$this->db->set('value', $_POST['address']);
		$this->db->where('config_key', 'footer_address');
		$this->db->update('tbl_config');

		redirect($this->agent->referrer(), 'refresh');
	}
	public function change_site_email(){
		$this->db->set('value', $_POST['email']);
		$this->db->where('config_key', 'site_email');
		$this->db->update('tbl_config');

		redirect($this->agent->referrer(), 'refresh');
	}
	
	public function users(){
		$seo_data['seo_data'] = array(
			'title' => 'Users',
		);

		$users = $this->db->get('tbl_user')->result();
		$data = array();

		$data['users'] = $users; 

		$this->db->order_by('created_at', 'DESC');
		$m = $this->db->get('tbl_incoming_sms')->result();
		$data['last_id'] = $m[0]->sms_id;

		$this->load->view('user/_header', $seo_data);
		$this->load->view('user/users', $data);
		$this->load->view('user/_footer');
	}
	public function delete_user($id){

		// $this->db->set('active', 0);
		$this->db->where('id', $id);
		$this->db->delete('tbl_user');

		 $this->session->set_flashdata('msg', 'Deleted!!');
         $this->session->set_flashdata('alert', 'success');

         redirect($this->agent->referrer(), 'refresh');
	}
	public function update_user_data(){


		$this->db->where('email', $_POST['email']);
		$u = $this->db->get('tbl_user')->result();

		if(count($u) > 0){
			$this->db->set('first_name', $_POST['first_name']);
			$this->db->set('last_name', $_POST['last_name']);
			// $this->db->set('email', $_POST['email']);
			$this->db->set('role', $_POST['role']);
			$this->db->where('id', $_POST['id']);
			$this->db->update('tbl_user');

			 $this->session->set_flashdata('msg', 'Data changed except e-mail!!');
	         $this->session->set_flashdata('alert', 'danger');

	         redirect($this->agent->referrer(), 'refresh');
		}

		$this->db->set('first_name', $_POST['first_name']);
		$this->db->set('last_name', $_POST['last_name']);
		$this->db->set('email', $_POST['email']);
		$this->db->set('role', $_POST['role']);
		$this->db->where('id', $_POST['id']);
		$this->db->update('tbl_user');

		$this->session->set_flashdata('msg', 'User info updated!!');
         $this->session->set_flashdata('alert', 'success');

         redirect($this->agent->referrer(), 'refresh');
	}

	public function add_new_user(){
		$this->db->where('email', $_POST['email']);
		$u = $this->db->get('tbl_user')->result();

		if(count($u) > 0){
			 $this->session->set_flashdata('msg', 'User with this e-mail exist!!');
	         $this->session->set_flashdata('alert', 'danger');

	         redirect($this->agent->referrer(), 'refresh');
		}

		$password = $this->generateRandomString(6);
		$new_p = hash("sha512", $password);


		$data = array(
			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'email' => $_POST['email'],
			'password' => $new_p,
			'role' => $_POST['role']
		);

		$this->db->insert('tbl_user', $data);

		$this->session->set_flashdata('msg', 'New user added!!<br>Password sent to his/her e-mail.');
        $this->session->set_flashdata('alert', 'success');

        //mail a code
		$subject = 'New Member';

		$email = $_POST['email'];
   	   //Email content
        $htmlContent = '<center><h2>' . webSettings()['site_name'] . '</h2>';
        $htmlContent .= '<p>';
        $htmlContent .= 'Hello!, Your added to our platform as new <br/>' . $_POST['role'] . '.<br>Your password: ' . $password . '<br>Email:<i>This email.</i></p>';
       
        $htmlContent .= '<p>Thank you!</p> </center>';
                
       $a = $this->email_model->mailAgent($email, $htmlContent, $subject);

         redirect($this->agent->referrer(), 'refresh');
	}
	public function post_new_group(){

		$insert_id = '';

		if(empty($_FILES['imgChooser']['name'])){
        	//no thumbnail
        	$this->session->set_flashdata('msg', 'Thumbnail is required!!');
	    	$this->session->set_flashdata('alert', 'danger');

	    	redirect($this->agent->referrer(), 'refresh');

        }else{
        	$config['upload_path'] = './assets/img/';
	        $config['allowed_types'] = 'jpg|png';
	        $new_name = time();
	        $config['file_name'] = $new_name;
	        $this->upload->initialize($config);

	        if ($this->upload->do_upload('imgChooser')){

	         	$image_metadata = $this->upload->data();

	         	$data = array(
	         		'group_name' => $_POST['name'],
	         		'group_description' => $_POST['description'],
	         		'group_icon' => $image_metadata['file_name'],
	         		'user_id' => $this->session->user[0]->id
	         	);
         		$this->db->insert('tbl_groups', $data);

	         	$insert_id = $this->db->insert_id();
		    }else{
		    	$this->session->set_flashdata('msg', $this->upload->display_errors());
				$this->session->set_flashdata('alert', 'danger');

				redirect($this->agent->referrer(), 'refresh');
		    }
		}

	    $this->session->set_flashdata('msg', $this->upload->display_errors());
		$this->session->set_flashdata('alert', 'danger');

		redirect('admin/members/' . $insert_id , 'refresh');
	}

	public function members($id){
		$seo_data['seo_data'] = array(
			'title' => 'Members',
		);

		$data = array();

		$this->db->where('id', $id);
		$g = $this->db->get('tbl_groups')->result();

		if(count($g) <= 0){
			redirect('admin/p_404', 'refresh');
		}
        
        $this->db->where('group_id', $id);
		$members = $this->db->get('tbl_group_members')->result();

		$data['group'] = $g;
		$data['members'] = $members;

		$this->db->order_by('created_at', 'DESC');
		$m = $this->db->get('tbl_incoming_sms')->result();
		$data['last_id'] = $m[0]->sms_id;

		$this->load->view('user/_header', $seo_data);
		$this->load->view('user/members', $data);
		$this->load->view('user/_footer');
	}
	public function groups(){
		$seo_data['seo_data'] = array(
			'title' => 'Members',
		);

		$data = array();

		// $this->db->where('id', $id);
		if($this->session->user[0]->role != 'admin'){
			$this->db->where('user_id', $this->session->user[0]->id);
		}
		$g = $this->db->get('tbl_groups')->result();

		$response = array();
		$i = 0;

		foreach ($g as $key => $group) {
			$this->db->where('group_id', $group->id);
			$members = $this->db->get('tbl_group_members')->result();

			$response[$i] = array(
				'group' => $group,
				'count' => count($members)
			);
			$i++;
		}

		$data['groups'] = $response;

		$this->db->order_by('created_at', 'DESC');
		$m = $this->db->get('tbl_incoming_sms')->result();
		$data['last_id'] = $m[0]->sms_id;

		$this->load->view('user/_header', $seo_data);
		$this->load->view('user/groups', $data);
		$this->load->view('user/_footer');
	} 
	public function edit_group($id){
		$seo_data['seo_data'] = array(
			'title' => 'Edit group',
		);

		$data = array();

		$this->db->where('id', $id);
		$g = $this->db->get('tbl_groups')->result();

		if(count($g) <= 0){
			redirect('admin/p_404', 'refresh');
		}

		$data['group'] = $g;

		$this->db->order_by('created_at', 'DESC');
		$m = $this->db->get('tbl_incoming_sms')->result();
		$data['last_id'] = $m[0]->sms_id;

		$this->load->view('user/_header', $seo_data);
		$this->load->view('user/update_group', $data);
		$this->load->view('user/_footer');
	}

	public function uploadListFile(){
		
		$config['upload_path'] = './assets/other/';
        $config['allowed_types'] = 'xlsx|xls';
        $new_name = time();
        $config['file_name'] = $new_name;
        $this->upload->initialize($config);

        $a = array();

        if ($this->upload->do_upload('file_')){
            $file_metadata = $this->upload->data();
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			$reader->setReadDataOnly(true);
			$spreadsheet = $reader->load('./assets/other/' . $file_metadata['file_name']);

			$list = $spreadsheet->getActiveSheet()->toArray();

			$str = array();
			$i = 0;
			foreach ($list as $t) {
				$str[$i] = array(
					'names' => $t[0],
					'phone' => $t[1]
				);
				$i++;
			}
			$a['list'] = $str;

			$trs = '';
			$i = 1;
			foreach ($str as $user) {
				$btn = '<a href="#" onclick="removefromgroup('. $_POST['group_id'] .',\''. $user['phone'] .'\',\'tr-id-'. $user['phone'] . $i .'\')"><i class="fas fa-times-circle"></i></a>';
				$trs .= '<tr id="tr-id-'. $user['phone'] . $i .'"><td>' . $i . '</td><td>' . $user['names'] . '</td><td>' . $user['phone'] . '</td><td> ' . $btn . ' </td></tr>';
				$i++;

				$j = array(
					'names' => $user['names'],
					'phone' => $user['phone'],
					'group_id' => $_POST['group_id']
				);
				$this->db->insert('tbl_group_members', $j);
			}



			$a['table'] = $trs;
			$a['status'] = 'yes';
			$a['file_name'] =  $file_metadata['file_name'];

			unlink('./assets/other/' . $file_metadata['file_name']);

         }else{
     		$a['status'] = 'no';
     		$a['error'] = $this->upload->display_errors();
         }
         echo json_encode($a);
	}

	public function compose_sms(){
		$seo_data['seo_data'] = array(
			'title' => 'Compose SMS',
		);

		$data = array();

		if($this->session->user[0]->role != 'admin'){
			$this->db->where('id', $this->session->user[0]->id);
		}
		$g = $this->db->get('tbl_groups')->result();

		if(count($g) <= 0){
			redirect('admin/p_404', 'refresh');
		}

		$data['groups'] = $g;

		$this->db->order_by('created_at', 'DESC');
		$m = $this->db->get('tbl_incoming_sms')->result();
		$data['last_id'] = $m[0]->sms_id;

		$this->load->view('user/_header', $seo_data);
		$this->load->view('user/compose_sms', $data);
		$this->load->view('user/_footer');
	}

	public function removefromgroup(){

		$this->db->where('group_id', $_POST['group_id']);
		$this->db->where('phone', $_POST['phone']);
		$this->db->delete('tbl_group_members');

		$a = array(
			'status' => 'yes'
		);
		echo json_encode($a);
	}
	public function post_update_group(){

		if(empty($_FILES['imgChooser']['name'])){

			$this->db->set('group_name', $_POST['name']);
			$this->db->set('group_description', $_POST['description']);
			$this->db->where('id', $_POST['group_id']);
			$this->db->update('tbl_groups');
        	//no thumbnail
        	$this->session->set_flashdata('msg', 'Group updated!!');
	    	$this->session->set_flashdata('alert', 'success');

	    	redirect($this->agent->referrer(), 'refresh');

        }else{
        	$config['upload_path'] = './assets/img/';
	        $config['allowed_types'] = 'jpg|png';
	        $new_name = time();
	        $config['file_name'] = $new_name;
	        $this->upload->initialize($config);

	        if ($this->upload->do_upload('imgChooser')){

	         	$image_metadata = $this->upload->data();

	         	$this->db->set('group_name', $_POST['name']);
				$this->db->set('group_description', $_POST['description']);
				$this->db->set('group_icon', $image_metadata['file_name']);
				$this->db->where('id', $_POST['group_id']);
				$this->db->update('tbl_groups');

				$this->session->set_flashdata('msg', 'Group updated!!');
	    		$this->session->set_flashdata('alert', 'success');

	    		redirect($this->agent->referrer(), 'refresh');

		    }else{
		    	$this->session->set_flashdata('msg', $this->upload->display_errors());
				$this->session->set_flashdata('alert', 'danger');

				redirect($this->agent->referrer(), 'refresh');
		    }
		}
	}

	public function sent_sms(){
		$seo_data['seo_data'] = array(
			'title' => 'Sent SMS',
		);

		$data = array();

		if($this->session->user[0]->role != 'admin'){
			$this->db->where('id', $this->session->user[0]->id);
		}
		$g = $this->db->get('tbl_groups')->result();

		if($this->session->user[0]->role != 'admin'){
			$this->db->where('user_id', $this->session->user[0]->id);
		}
		$sms = $this->db->get('tbl_sent_sms')->result();

		if(count($g) <= 0){
			redirect('admin/p_404', 'refresh');
		}
		
		$mygroups = array();

		foreach ($g as $group) {
			$mygroups[$group->id] = $group->group_name;
		}

		$data['groups'] = $mygroups;

		$data['sms'] = $sms;	

		$this->db->order_by('created_at', 'DESC');
		$m = $this->db->get('tbl_incoming_sms')->result();
		$data['last_id'] = $m[0]->sms_id;


		$this->load->view('user/_header', $seo_data);
		$this->load->view('user/sent_sms', $data);
		$this->load->view('user/_footer');
	}

	public function incoming_sms(){
		$seo_data['seo_data'] = array(
			'title' => 'Inbox',
		);

		$data = array();

		$this->db->order_by('created_at', 'DESC');
		$m = $this->db->get('tbl_incoming_sms')->result();

		$lastId = 0;

		if(count($m) > 0){
			$lastId = $m[0]->sms_id;
		}

		$messages = $this->sms_model->fetch_sms($lastId); 

		// echo '<pre>';print_r($messages);die();

		foreach ($messages['data']->SMSMessageData->Messages as $message) {
			$arr = array(
				'sms_id' => $message->id,
				'text' => $message->text,
				'linkId' => $message->linkId,
				'date' => $message->date,
				'from_' => $message->from,
				'to_' => $message->to,
			);
			$this->db->insert('tbl_incoming_sms', $arr);
		}

		$this->db->order_by('created_at', 'DESC');
		$m = $this->db->get('tbl_incoming_sms')->result();
		$data['last_id'] = $m[0]->sms_id;


		$data['messages'] = $m;

		$this->db->order_by('created_at', 'DESC');
		$m = $this->db->get('tbl_incoming_sms')->result();
		$data['last_id'] = $m[0]->sms_id;

		$this->load->view('user/_header', $seo_data);
		$this->load->view('user/inbox', $data);
		$this->load->view('user/_footer');
	}
	public function check_new_sms(){

		$last_id = $_POST['last_id'];

		$messages = $this->sms_model->fetch_sms($last_id); 

		// echo '<pre>';print_r($messages);die();

		$sms_ = '';

		foreach ($messages['data']->SMSMessageData->Messages as $message) {
			$arr = array(
				'sms_id' => $message->id,
				'text' => $message->text,
				'linkId' => $message->linkId,
				'date' => $message->date,
				'from_' => $message->from,
				'to_' => $message->to,
			);
			$this->db->insert('tbl_incoming_sms', $arr);

				$sms_ .= '<tr>' . 
						'<td>' . date('D, d-m-Y h:i A', strtotime($message->date)) . '</td>' .
						'<td>' . $message->text . '</td>' .
						'<td>' . $message->from . '</td>' .
					'</tr>';
		} 

		$this->db->order_by('created_at', 'DESC');
		$m = $this->db->get('tbl_incoming_sms')->result();

		if(count($messages['data']->SMSMessageData->Messages) > 0){
			$arr = array(
				'status' => 'new',
				'rows' => $sms_,
				'last_id' => $m[0]->sms_id,
				'count' => count($messages['data']->SMSMessageData->Messages)
			);
			echo json_encode($arr);
		}else{
			$arr = array(
				'status' => 'no',
				'rows' => $sms_,
				'last_id' => $m[0]->sms_id,
				'count' => 0
			);
			echo json_encode($arr);
		}
	}
	public function change_inobx_mode(){
		// print_r($_POST);
		$this->db->set('value', $_POST['inbox_mode'][0]);
        $this->db->where('config_key', 'inbox_mode');
        $this->db->update('tbl_config');
        redirect($this->agent->referrer(), 'refresh');
	}

	public function post_new_sms(){

		$this->db->where('group_id', $_POST['group_id']);
		$members = $this->db->get("tbl_group_members")->result();

		$message = $_POST['message'];

		$recipients = '';

		foreach ($members as $member) {
			$recipients .= '+250' . $member->phone . ',';
		}

		$recipients = chop($recipients, ',');

		$s = $this->sms_model->send_sms($message, $recipients);

		if($s){

			$data = array(
				'sms' => $message,
				'group_id' => $_POST['group_id'],
				'user_id' => $this->session->user[0]->id,
				'status' => 'Sent'
			);

			$this->db->insert('tbl_sent_sms', $data);

			$this->session->set_flashdata('msg', 'Message sent!!');
			$this->session->set_flashdata('alert', 'success');
			redirect('admin/sent_sms', 'refresh');
		}else{
			$data = array(
				'sms' => $message,
				'group_id' => $_POST['group_id'],
				'user_id' => $this->session->user[0]->id,
				'status' => 'Fail'
			);

			$this->db->insert('tbl_sent_sms', $data);

			$this->session->set_flashdata('msg', 'Error try again;<br>Check if numbers are valid.');
			$this->session->set_flashdata('alert', 'danger');

			redirect($this->agent->referrer(), 'refresh');
		}
		
	}
	public function shortcodes(){
		$seo_data['seo_data'] = array(
			'title' => 'Shortcoeds',
		);

		$data = array();

		$shortcodes = $this->db->get('tbl_short_codes')->result();

		$i = 0;
		$response = array();

		foreach($shortcodes as $shortcode){
			$this->db->where('id', $shortcode->user_id);
			$user = $this->db->get('tbl_user')->result();
			$response[$i] = array(
				'shortcode' => $shortcode,
				'user' => $user
			);
			$i++;
		}

		$data['shortcodes'] = $response;

		$data['users'] = $this->db->get('tbl_user')->result();

		$this->load->view('user/_header', $seo_data);
		$this->load->view('user/shortcodes', $data);
		$this->load->view('user/_footer');
	}
	public function add_new_shortcode(){
		$data = array(
			'short_code' => $_POST['shortcode'],
			'user_id' => $_POST['user_id'],
		);

		$this->db->insert('tbl_short_codes', $data);

		$this->session->set_flashdata('msg', 'Shortcode addded!!');
		$this->session->set_flashdata('alert', 'success');

		redirect($this->agent->referrer(), 'refresh');
	}
	public function delete_shortcode($id){
		$this->db->where('id', $id);
		$this->db->delete('tbl_short_codes');
		
		$this->session->set_flashdata('msg', 'Shortcode deleted!!');
		$this->session->set_flashdata('alert', 'success');

		redirect($this->agent->referrer(), 'refresh');
	}
	public function update_shortcode(){

		$this->db->set('short_code', $_POST['shortcode']);
		$this->db->set('user_id', $_POST['user_id']);
		$this->db->where('id', $_POST['shortcode_id']);
		$this->db->update('tbl_short_codes');

		$this->session->set_flashdata('msg', 'Shortcode updated!!');
		$this->session->set_flashdata('alert', 'success');

		redirect($this->agent->referrer(), 'refresh');
	}

}

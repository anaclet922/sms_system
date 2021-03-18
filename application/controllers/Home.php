<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function index()
	{

		$seo_data['seo_data'] = array(
			'title' => 'Home',
		);

		

		//////

		$this->load->view('_parts/_header', $seo_data);
		$this->load->view('home');
		$this->load->view('_parts/_footer');
	}

	public function about(){
		$seo_data['seo_data'] = array(
			'title' => 'About',
		);

		$this->db->where('config_key', 'site_about');		
		$data['about'] = $this->db->get('tbl_config')->result(); 

		$this->load->view('_parts/_header', $seo_data);
		$this->load->view('about', $data);
		$this->load->view('_parts/_footer');
	}
	public function terms(){
		$seo_data['seo_data'] = array(
			'title' => 'Terms and condition',
		);

		$this->db->where('config_key', 'site_terms');		
		$data['about'] = $this->db->get('tbl_config')->result(); 

		$this->load->view('_parts/_header', $seo_data);
		$this->load->view('about', $data);
		$this->load->view('_parts/_footer');
	}
	public function privacy(){
		$seo_data['seo_data'] = array(
			'title' => 'Privacy policy',
		);

		$this->db->where('config_key', 'site_privacy');

		$data['about'] = $this->db->get('tbl_config')->result();  

		$this->load->view('_parts/_header', $seo_data);
		$this->load->view('about', $data);
		$this->load->view('_parts/_footer');
	}
	public function contact(){
		$seo_data['seo_data'] = array(
			'title' => 'Contact',
		);

		$this->load->view('_parts/_header', $seo_data);
		$this->load->view('contact');
		$this->load->view('_parts/_footer');
	}

	public function p_404(){
		$seo_data['seo_data'] = array(
			'title' => 'Not Found',
		);

		
		$this->load->view('_parts/_header', $seo_data);
		$this->load->view('404');
		$this->load->view('_parts/_footer');
	}
	
}

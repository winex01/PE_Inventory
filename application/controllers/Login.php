<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	protected $home;

	public function __construct()
	{
		parent::__construct();

		$this->load->library('auth/user_auth', '', 'user_auth');

		// $this->user_auth->redirect_if_auth();
	
		$this->home = 'dashboard';
	}

	public function index()
	{
		$this->login_form();
	}

	public function login_form()
	{
		$page = 'login';
		
		// $this->load->view('layouts/master', compact('page'));
		$this->load->view($page, compact('page'));
	}

	public function login_user()
	{

		$response = [
			'authenticated' => false,
			'redirect_to' => null,
		];

		if ($this->user_auth->validate()) {
			$response = [
				'authenticated' => true,
				'redirect_to' => $this->home 
			];
		}

		echo json_encode($response);
	}

	public function logout()
	{
		$temp = $this->user_auth->logout();
	
		redirect('/');	
	}

	// test purpose
	public function test()
	{
		echo '<pre>';
			var_dump($_SESSION);
		echo '</pre>';
	}
}

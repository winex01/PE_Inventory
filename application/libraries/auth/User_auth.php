<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_auth {

	protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('user_model');
	}

	public function validate()
	{
		$username = $this->ci->input->post('un');
		$password = $this->ci->input->post('pwd');

		if (empty($username) || empty($password)) {
			return;
		}

		$data = $this->ci->user_model->check($username, $password);
	
		if (empty($data)) {
			return;
		}

		// session here
		$this->__save_user_session($data);

		return $data;
	}

	public function logout()
	{
		session_destroy();
	}

	private function __save_user_session($data)
	{
		if (empty($data)) {
			return;
		}

		$newdata = array(
		        'username'  => $data->username,
		        'first_name' => $data->first_name,
		        'last_name' => $data->last_name,
		        'logged_in' => true,
		);

		$this->ci->session->set_flashdata(
			'welcome', 'Welcome back '.ucwords($data->first_name).' '. ucwords($data->last_name).'!'
		);

		$this->ci->session->set_userdata($newdata);
	}

	public function redirect_if_auth()
	{
		if (if_auth()) {
			redirect('dashboard');
		}
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		redirect_if_not_auth();

		$this->load->model('user_model');
	}

	public function index()
	{
		$data = [
			'page' => 'user/dashboard',
			'title' => lang('dashboard'),
			'boxes' => $this->boxes()
		];

		$this->load->view('layouts/master', $data);
	}

	private function boxes()
	{
		
		return [
			array(
				'count' => $this->user_model->count(),
				'title' => lang('users'),
				'color' => 'bg-green',
				'fa_icon' => lang('users_icon'),
				'link' => base_url('users'),
			),
			// array(
			// 	'count' => $this->supplier_model->count(),
			// 	'title' => lang('suppliers'),
			// 	'color' => 'bg-yellow',
			// 	'fa_icon' => lang('suppliers_icon'),
			// 	'link' => base_url('suppliers'),
			// ),
			// array(
			// 	'count' => $this->item_model->count(),
			// 	'title' => lang('items'),
			// 	'color' => 'bg-red',
			// 	'fa_icon' => lang('items_icon'),
			// 	'link' => base_url('items'),
			// )
		];
	}
	
}

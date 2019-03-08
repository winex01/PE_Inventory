<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipment extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		redirect_if_not_auth();

		$this->load->model('equipment_model');
		$this->load->model('user_model');
	}

	public function index()
	{
		$data = [
			'page' => 'user/equipments',
			'title' => lang('equipments')
		];

		$this->load->view('layouts/master', $data);
	}

	public function get_lists()
	{
		$equipments = $this->equipment_model->all();

		$data = [];

		$i = 0;
		foreach($equipments as $equipment) {
			$data[$i]['equipment_name'] = ucwords($equipment->equipmentname);
			$data[$i]['quantity'] = $equipment->quantity;
			$data[$i]['brand'] = ucwords($equipment->brand);
			$data[$i]['date_arrived'] = $equipment->datearrived;
			$data[$i]['date_added'] = $equipment->dateadded;
			$data[$i]['added_by'] = $equipment->added_by;
			$data[$i]['condition'] = $equipment->description;


			$action = "<center>";
			$action .= ' <button class="btn btn-warning btn-xs" onclick="edit_user('.$equipment->equipmentid.')"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>';
			$action .= ' <button class="btn btn-danger btn-xs" onclick="delete_user('.$equipment->equipmentid.')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>';
			$action .= '</center>';

			$data[$i]['action'] = $action;
			$i++;
		}

		
		echo json_encode($data);
	}

	/*
	public function create()
	{
		$this->form_validation->set_rules('first_name', lang('first_name_input'), 'required|trim');
		$this->form_validation->set_rules('last_name', lang('last_name_input'), 'required|trim');
		$this->form_validation->set_rules('username', lang('username_input'), 'required|trim|min_length[6]');
		$this->form_validation->set_rules('password', lang('password_input'), 'required|trim|min_length[6]');

		$return = [];
		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();

			$return = [
				'inserted' => false,
				'flash' => $error
			];
        }
        else{
        	// success
			$data = [
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			];

			$query = $this->user_model->create($data);


			$return = [
				'inserted' => $query,
				'flash' => lang('save_user_flash')
			];

        }//end if else

		echo json_encode($return);
	}

	public function delete()
	{
		if (empty($this->input->post('id'))) {
			exit;
		}
		
		 $delete = $this->user_model->delete(
		 	$this->input->post('id')
		 );

		 $return = [
		 	'deleted' => false,
		 	'flash' => null
		 ];

		 if ($delete) {
		 	$return = [
		 		'deleted' => true,
		 		'flash' => lang('delete_flash')
		 	];
		 }

		 echo json_encode($return);
	}

	public function edit()
	{
		if (empty($this->input->post('id'))) {
			exit;
		}

		echo json_encode(
			$this->user_model->edit(
				$this->input->post('id')
			)
		);
	}

	public function update()
	{
		$this->form_validation->set_rules('id', lang('invalid_input'), 'required|trim');
		$this->form_validation->set_rules('first_name', lang('first_name_input'), 'required|trim');
		$this->form_validation->set_rules('last_name', lang('last_name_input'), 'required|trim');
		$this->form_validation->set_rules('username', lang('username_input'), 'required|trim|min_length[6]');

		$return = [
			'update' => false,
			'flash' => null
		];
		if ($this->form_validation->run() == FALSE){
			$error = validation_errors();

			$return = [
				'updated' => false,
				'flash' => $error
			];
        }
        else{
        	// success
			$data = [
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'username' => $this->input->post('username')
			];

			$query = $this->user_model->update($this->input->post('id'), $data);

			if ($query) {
				$return = [
					'updated' => $query,
					'flash' => lang('update_flash')
				];
			}

        }//end if else

		echo json_encode($return);
	}
	*/
}

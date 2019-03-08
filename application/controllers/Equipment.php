<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipment extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		redirect_if_not_auth();

		$this->load->model('equipment_model');
		$this->load->model('condition_model');
	}

	public function index()
	{
		$data = [
			'page' => 'user/equipments',
			'title' => lang('equipments'),
			'conditions' => $this->condition_model->all()
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
			$action .= ' <button class="btn btn-warning btn-xs" onclick="edit_equipment('.$equipment->equipmentid.')"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>';
			$action .= ' <button class="btn btn-danger btn-xs" onclick="delete_equipment('.$equipment->equipmentid.')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>';
			$action .= '</center>';

			$data[$i]['action'] = $action;
			$i++;
		}

		
		echo json_encode($data);
	}

	public function delete()
	{
		if (empty($this->input->post('id'))) {
			exit;
		}
		
		 $delete = $this->equipment_model->delete(
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

	public function create()
	{
		$this->form_validation->set_rules('equipment_name', lang('equipment_name'), 'required|trim');
		$this->form_validation->set_rules('quantity', lang('quantity'), 'required|trim|numeric|is_natural_no_zero');
		$this->form_validation->set_rules('brand', lang('brand'), 'required|trim');
		$this->form_validation->set_rules('date_arrived', lang('date_arrived'), 'required|trim');
		$this->form_validation->set_rules('condition_id', lang('condition_id'), 'required|trim');

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
				'equipmentname' => $this->input->post('equipment_name'),
				'quantity' => $this->input->post('quantity'),
				'brand' => $this->input->post('brand'),
				'datearrived' => $this->input->post('date_arrived'),
				'dateadded' => date_now(),
				'added_by' => $this->session->username,
				'condition_id' => $this->input->post('condition_id'),
			];

			$query = $this->equipment_model->create($data);


			$return = [
				'inserted' => $query,
				'flash' => lang('save_user_flash')
			];

        }//end if else

		echo json_encode($return);
	}

	public function edit()
	{
		if (empty($this->input->post('id'))) {
			exit;
		}

		echo json_encode(
			$this->equipment_model->edit(
				$this->input->post('id')
			)
		);
	}

	public function update()
	{
		$this->form_validation->set_rules('equipmentid', lang('invalid_input'), 'required|trim');
		$this->form_validation->set_rules('equipmentname', lang('equipment_name'), 'required|trim');
		$this->form_validation->set_rules('quantity', lang('quantity'), 'required|trim|numeric|is_natural_no_zero');
		$this->form_validation->set_rules('brand', lang('brand'), 'required|trim');
		$this->form_validation->set_rules('datearrived', lang('date_arrived'), 'required|trim');
		$this->form_validation->set_rules('condition_id', lang('condition_id'), 'required|trim');

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
				'equipmentname' => $this->input->post('equipmentname'),
				'quantity' => $this->input->post('quantity'),
				'brand' => $this->input->post('brand'),
				'datearrived' => $this->input->post('datearrived'),
				'condition_id' => $this->input->post('condition_id'),
			];

			$query = $this->equipment_model->update($this->input->post('equipmentid'), $data);

			if ($query) {
				$return = [
					'updated' => $query,
					'flash' => lang('update_flash')
				];
			}

        }//end if else

		echo json_encode($return);
	}
}

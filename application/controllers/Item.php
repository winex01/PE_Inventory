<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		redirect_if_not_auth();

		$this->load->model('item_model');
	}

	public function index()
	{
		$data = [
			'page' => 'user/items',
			'title' => lang('items')
		];

		$this->load->view('layouts/master', $data);
	}

	public function get_lists()
	{
		$items = $this->item_model->all();

		$data = [];

		$i = 0;
		foreach($items as $item) {
			$data[$i]['id'] = $item->id;
			$data[$i]['material_name'] = ucwords($item->material_name);
			$data[$i]['material_desc'] = ucwords($item->material_desc);
			$data[$i]['supplier'] = ucwords($item->name);
			$data[$i]['added_by'] = ucwords($item->first_name.' '.$item->last_name);
			$data[$i]['added_at'] = $item->added_at;

			$action = "<center>";
			$action .= '<button class="btn btn-warning btn-xs" onclick="edit_item('.$item->id.')"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>';
			$action .= ' <button class="btn btn-danger btn-xs" onclick="delete_item('.$item->id.')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>';
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
		
		 $delete = $this->item_model->delete(
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
		$this->form_validation->set_rules('supplier_name', 'Supplier name', 'required|trim');

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
				'name' => $this->input->post('supplier_name')
			];

			$query = $this->supplier_model->create($data);


			$return = [
				'inserted' => $query,
				'flash' => lang('save_flash')
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
			$this->supplier_model->edit(
				$this->input->post('id')
			)
		);
	}

	public function update()
	{
		$this->form_validation->set_rules('id', 'Invalid Input', 'required|trim');
		$this->form_validation->set_rules('supplier_name', lang('supplier_name_input'), 'required|trim');

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
				'name' => $this->input->post('supplier_name'),
			];

			$query = $this->supplier_model->update($this->input->post('id'), $data);

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

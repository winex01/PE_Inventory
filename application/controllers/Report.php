<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		redirect_if_not_auth();

		$this->load->model('report_model');

	}

	public function index()
	{
		$data = [
			'page' => 'user/reports',
			'title' => lang('reports'),
		];

		$this->load->view('layouts/master', $data);
	}

	public function get_lists()
	{
		$reports = $this->report_model->all(
			$this->input->post('date')
		);

		$data = [];

		$i = 0;
		foreach($reports as $report) {
			$data[$i]['studentid'] = $report->studentid;
			$data[$i]['studentname'] = ucwords($report->studentname);
			$data[$i]['studentcourse'] = $report->studentcourse;
			$data[$i]['lostitem'] = $report->lostitem;
			$data[$i]['reason'] = $report->reason;
			$data[$i]['datelost'] = $report->datelost;
			$data[$i]['dateadded'] = $report->dateadded;
			$data[$i]['quantity'] = $report->quantity;
			$data[$i]['brand'] = $report->brand;

			$i++;
		}

		
		echo json_encode($data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

	protected $table = 'report';

	public function __construct()
	{
		parent::__construct();
	}


	public function create(array $data)
	{
		if (empty($data)) {
			return;
		}

		return $this->db->insert($this->table, $data);
	}

	public function all(string $date)
	{
		if (empty($date)) {
			return;
		}

		return $this->db->where('datelost', $date)->get($this->table)->result();
	}
}
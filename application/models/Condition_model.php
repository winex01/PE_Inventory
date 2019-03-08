<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Condition_model extends CI_Model {

	protected $table = 'conditions';

	public function __construct()
	{
		parent::__construct();
	}

	public function all()
	{
		return $this->db->get($this->table)->result();
	}

}
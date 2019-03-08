<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipment_model extends CI_Model {

	protected $table = 'equipments';

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

	public function all()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('conditions', 'conditions.id = equipments.condition_id');

		return $this->db->get()->result();
	}

	public function delete(int $id)
	{
		if (empty($id)) {
			return;
		}

		$this->db->where('equipmentid', $id);
		return $this->db->delete($this->table);
	}

	public function edit(int $id)
	{
		if (empty($id)) {
			return;
		}

		$this->db->where('equipmentid', $id);

		return $this->db->get($this->table)->row();
	}

	public function update(int $id, array $data)
	{
		if (empty($id) || empty($data)) {
			return;
		}

		$this->db->where('equipmentid', $id);
		return $this->db->update($this->table, $data);
	}

	public function count()
	{
		return $this->db->count_all_results($this->table);
	}

	public function find(int $equipmentid)
	{
		return $this->edit($equipmentid);
	}

	public function deduct_quantity(int $equipmentid, $difference)
	{
		if (empty($equipmentid) || empty($difference)) {
			return;
		}

		$this->db->set('quantity', $difference);
		$this->db->where('equipmentid', $equipmentid);
		return $this->db->update($this->table);
	}

}
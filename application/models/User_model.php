<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	protected $table = 'users';

	public function __construct()
	{
		parent::__construct();
	}

	/*
	* return array: use for checking user
	*/
	public function check(string $username, string $password)
	{
		if (empty($username) || empty($password)) {
			return;
		}

		$password = md5($password);

		return $this->db->query("SELECT * FROM $this->table WHERE username = ? AND password = ?", [
			$username,
			$password
		])->row();
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
		return $this->db->get($this->table)->result();
	}

	public function delete(int $id)
	{
		if (empty($id)) {
			return;
		}

		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function edit(int $id)
	{
		if (empty($id)) {
			return;
		}

		$this->db->where('id', $id);

		return $this->db->get($this->table)->row();
	}

	public function update(int $id, array $data)
	{
		if (empty($id) || empty($data)) {
			return;
		}

		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

	public function count()
	{
		return $this->db->count_all_results($this->table);
	}
}
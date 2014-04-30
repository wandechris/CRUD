<?php
class School_model extends CI_Model {

	function School_model() {
		// Call the Model constructor
		parent::__construct();
	}

	function read() {
		
		$query = $this -> db -> get('students');

		if ($query -> num_rows() > 0) {
			return $query -> result();
		} else {
			//show_error('Database is empty!');
		}
	}

	function create() {
		$firstname = $this -> input -> post('firstname');
		$lastname = $this -> input -> post('lastname');
		$email = $this -> input -> post('email');
		$data = array(
		'Firstname' => $firstname,
		'Lastname' => $lastname,
		'Email' => $email);
		$this -> db -> insert('students', $data);
	}
	
	function delete($id) {
  		$this->db->delete('students', array('id' => $id)); 
	}

	function update() {
		$id = $this -> input -> post('id2');
		$firstname = $this -> input -> post('firstname');
		$lastname = $this -> input -> post('lastname');
		$email = $this -> input -> post('email');
		$data = array(
		'id' => $id,
		'Firstname' => $firstname,
		'Lastname' => $lastname,
		'Email' => $email);
		$this->db->where('id',$id);
		$this -> db -> update('students', $data);
	}
}
?>
<?php
class School extends CI_Controller {
	function index() {
		$this -> load -> model('School_model');

		$data['result'] = $this -> School_model -> read();
		$data['page_title'] = "School Database";

		$this -> load -> view('school_view', $data);
	}

	function save() {
		$this -> load -> model('School_model');
		if ($this -> input -> post('submit')) {
			$this -> School_model -> create();
		}
		redirect('School');
	}

	function del($id) {
		$this -> load -> model('School_model');

		if ((int)$id > 0) {
			$this -> School_model -> delete($id);
		}
		
		redirect('School');
	}
	
	function update() {
		$this -> load -> model('School_model');
		if (1 > 0) {
			$this -> School_model -> update();
		}
		redirect('School');
	}
}
?>
<?php
class Course extends Authenticated {

	public function all()
	{
		$data = array(
			'head' => array('Course Number', 'Course Name'),
			'rows' => array()
			);
		$this->load->view('include/header');
		$this->load->view('templates/table', $data);
		$this->load->view('include/footer');
	}
	public function offered()
	{
		$data = array(
			'head' => array('Course Number', 'Course Name', 'Instructor-in-charge'),
			'rows' => array()
			);
		$this->load->view('include/header');
		$this->load->view('templates/table', $data);
		$this->load->view('include/footer');
	}
	public function details($id)
	{
		$data = array();
		$this->load->view('course/details', $data);
	}
}
?>

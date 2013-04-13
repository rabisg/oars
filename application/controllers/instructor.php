<?php
class Instructor extends Authenticated {

	function __construct()
	{
		parent::__construct();
      	if (!strstr($this->session->userdata('role'), 'prof')) {
			show_error('You are not an Instructor! This will be reported', 403);
		}
	}
	public function index()
	{
		$data = array(
			'head' => array('Course Number', 'Course Name'),
			'rows' => array()
			);
		$query = $this->db->query('SELECT course_no, title, course_offering FROM "Course" NATURAL JOIN "CourseOffering" NATURAL JOIN "Instructor" NATURAL JOIN "Faculty" WHERE acad_year = ? AND semester = ? AND email = ?', array($this->config->item('PR_year'), $this->config->item('PR_sem'), $this->session->userdata('email')));
		if ($query->num_rows() > 0)
			$data['rows'] = $query->result();
		foreach ($data['rows'] as $r) {
			$r->course_no = anchor('/instructor/manage/' . $r->course_offering, $r->course_no);
			unset($r->course_offering);
		}
		$this->load->view('include/header');
		$this->load->view('templates/table', $data);
		$this->load->view('include/footer');
	}
	public function current()
	{
		$data = array(
			'head' => array('Course Number', 'Course Name'),
			'rows' => array()
			);
		$query = $this->db->query('SELECT course_no, title, course_offering FROM "Course" NATURAL JOIN "CourseOffering" NATURAL JOIN "Instructor" NATURAL JOIN "Faculty" WHERE acad_year = ? AND semester = ? AND email = ?', array($this->config->item('C_year'), $this->config->item('C_sem'), $this->session->userdata('email')));
		if ($query->num_rows() > 0)
			$data['rows'] = $query->result();
		foreach ($data['rows'] as $r) {
			$r->course_no = anchor('/instructor/grade/' . $r->course_offering, $r->course_no);
			unset($r->course_offering);
		}
		$this->load->view('include/header');
		$this->load->view('templates/table', $data);
		$this->load->view('include/footer');
	}
	public function manage($id)
	{
		$header = array();
		if (isset($_POST['rollno'])) {
			$this->db->where('roll_no', $_POST['rollno']);			
			$this->db->where('course_offering', $id);
			$this->db->update('CourseRequest', array('status' => $_POST['status']));
			$header['alert'] = array('type' => 'success', 'text' => 'Status has been changed!');
		}
		
		$data = array(
			'head' => array('Roll No', 'Name', 'Department', 'Status'),
			'rows' => array()
			);
		$query = $this->db->query('SELECT roll_no, name, department, status FROM "CourseRequest" NATURAL JOIN "Student" WHERE course_offering = ?', array($id));
		if ($query->num_rows() > 0)
			$data['rows'] = $query->result();
		foreach ($data['rows'] as $r) {
			$r->status = status($id, $r->roll_no, $r->status);
		}
		$this->load->view('include/header', $header);
		$this->load->view('templates/table', $data);
		$this->load->view('include/footer');
	}
	public function grade($id)
	{
		$header = array();
		if (isset($_POST['rollno'])) {
			$this->db->where('roll_no', $_POST['rollno']);			
			$this->db->where('course_offering', $id);
			$this->db->update('Registration', array('grade' => $_POST['grade']));
			$header['alert'] = array('type' => 'success', 'text' => 'Status has been changed!');
		}
		
		$data = array(
			'head' => array('Roll No', 'Name', 'Department', 'Status'),
			'rows' => array()
			);
		$query = $this->db->query('SELECT roll_no, name, department, grade FROM "Registration" NATURAL JOIN "Student" WHERE course_offering = ?', array($id));
		if ($query->num_rows() > 0)
			$data['rows'] = $query->result();
		foreach ($data['rows'] as $r) {
			$r->grade = grade($id, $r->roll_no, $r->grade);
		}
		$this->load->view('include/header', $header);
		$this->load->view('templates/table', $data);
		$this->load->view('include/footer');
	}
}
?>

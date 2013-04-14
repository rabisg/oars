<?php
class Student extends Authenticated {

	function __construct()
	{
		parent::__construct();
      	if (!strstr($this->session->userdata('role'), 'student')) {
			show_error('You are not a student! What do you expect should be here?', 403);
		}
	}
	public function backlog()
	{
		$data = array(
			'head' => array('Course Number', 'Course Name', 'Year-Sem', 'Units'),
			'rows' => array(),
			'title' => 'Backlogs for ' . $this->session->userdata('username'),
			);
		$query = $this->db->query('SELECT course_no, title, (acad_year || semester) as yearsem, units FROM "Registration" NATURAL JOIN "CourseOffering" NATURAL JOIN "Course" WHERE roll_no = ? AND grade = ? ORDER BY acad_year, semester', array($this->session->userdata('rollno'), 'F'));
		$data['rows'] = $query->result();
		$this->load->view('include/header');
		$this->load->view('templates/table', $data);
		$this->load->view('include/footer');
	}
	public function registration()
	{
		$data = array(
			'head' => array('Course Number', 'Course Name', 'Course Type', 'Units'),
			'rows' => array(),
			'title' => 'Registration details for ' . $this->config->item('C_year') . ' ' . $this->config->item('C_sem'),
			);
		$query = $this->db->query('SELECT course_no, title, course_type, units FROM "Registration" NATURAL JOIN "CourseOffering" NATURAL JOIN "Course" WHERE roll_no = ? AND acad_year = ? AND semester = ?', array($this->session->userdata('rollno'), $this->config->item('C_year'), $this->config->item('C_sem')));
		$data['rows'] = $query->result();
		$this->load->view('include/header');
		$this->load->view('templates/table', $data);
		$this->load->view('include/footer');
	}
	public function transcript()
	{
		$data = array(
			'head' => array('Course Number', 'Course Name', 'Course Type', 'Units', 'Grade'),
			'rows' => array(),
			'title' => 'Unofficial transcript for ' . $this->session->userdata('rollno')
			);
		$query = $this->db->query('SELECT course_no, title, course_type, units, grade FROM "Registration" NATURAL JOIN "CourseOffering" NATURAL JOIN "Course" WHERE roll_no = ? AND grade NOTNULL ORDER BY acad_year, semester', array($this->session->userdata('rollno')));
		$data['rows'] = $query->result();
		$this->load->view('include/header');
		$this->load->view('templates/table', $data);
		$this->load->view('include/footer');
	}
	public function timetable()
	{
		$data = array(
			'head' => array('Course Number', 'Day', 'Start Time', 'Duration', 'Location'),
			'rows' => array(),
			'title' => 'Timetable for current semester'
			);
		$query = $this->db->query('SELECT course_no, day, start_time, duration, location FROM "CourseOffering" NATURAL JOIN "Registration" NATURAL JOIN "TimeTable" NATURAL JOIN "Course" WHERE roll_no = ? AND acad_year = ? AND semester = ? ORDER BY  day', array($this->session->userdata('rollno'), $this->config->item('C_year'), $this->config->item('C_sem')));
		if($query->num_rows()>0)
			$data['rows'] = $query->result();
		$this->load->view('include/header');
		$this->load->view('templates/table', $data);
		$this->load->view('include/footer');
	}
}
?>

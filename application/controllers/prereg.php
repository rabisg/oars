<?php
class Prereg extends Authenticated {

	public function index()
	{
		if(isset($_POST['course_offering'])) {
			$c = explode(': ', $_POST['course_offering']);
			$query = $this->db->query('SELECT course_offering FROM "CourseOffering" WHERE course_no = ?', array($c[0]));
			$course_offering = $query->row()->course_offering;
			$data = array(
				'course_offering' => $_POST['course_offering'],
				'regn_type' => $_POST['regn_type'],
				'course_type' => $_POST['course_type'],
				'roll_no' => $this->session->userdata('rollno'),
				);
			$this->db->insert('CourseRequest', $data);
		}

		$allCourses = array('options' => array());
		$query = $this->db->query('SELECT course_no, title FROM "CourseOffering" NATURAL JOIN "Course" WHERE acad_year = ? AND semester = ?', array($this->config->item('PR_year'), $this->config->item('PR_sem')));
		if($query->num_rows()>0)
			foreach ($query->result() as $res) {
				$allCourses['options'][] = $res->course_no . ': ' . $res->title;
			}
		//List of courses he has requested
		$data = array(
			'head' => array('Course Type', 'Course Number', 'Course Name', 'Status'),
			'rows' => array()
			);
		$query = $this->db->query('SELECT course_type, course_no, title, status FROM "CourseRequest" NATURAL JOIN "CourseOffering" NATURAL JOIN "Course" WHERE roll_no = ?', array($this->session->userdata('rollno')));
		$count = $query->num_rows(); //No of courses requested
		if ($count > 0)
			$data['rows'] = $query->result();
		$this->load->view('include/header');
		$this->load->view('templates/table', $data);
		if ($count<9)
			$this->load->view('course/request', $allCourses);
		else
			echo '<div class="alert">You have already requested maximum number of courses</div>';
		$this->load->view('include/footer');
	}

	public function submit()
	{
		$table = array(
			'head' => array('Course Type', 'Course Number', 'Course Name', 'Credits'),
			'rows' => array()
			);
		$query = $this->db->query('SELECT course_type, course_no, title, units FROM "Registration" NATURAL JOIN "CourseOffering" NATURAL JOIN "Course" WHERE roll_no = ?', array($this->session->userdata('rollno')));
		if ($query->num_rows() > 0)
			$table['rows'] = $query->result();

		$options = array();
		$query = $this->db->query('SELECT course_offering, course_no, title FROM "CourseRequest" NATURAL JOIN "CourseOffering" NATURAL JOIN "Course" WHERE roll_no = ? AND status = ?', array($this->session->userdata('rollno'), 'Accepted'));
		if ($query->num_rows() > 0) {
			$options = $query->result();
			foreach ($options as $option) {
				$option->text = '<b>' . $option->course_no . ':</b> ' . $option->title;
			}
		}

		if(isset($_POST['course_offering'])) {
			$query = $this->db->query('SELECT * FROM "CourseRequest" WHERE course_offering = ? AND roll_no = ? AND status= ?', array($_POST['course_offering'], $this->session->userdata('rollno'), 'Accepted'));
			if($query->num_rows()>0) {
				$row = $query->row();
				$data = array(
					'course_offering' => $row->course_offering,
					'regn_type' => $row->regn_type,
					'course_type' => $row->course_type,
					'roll_no' => $this->session->userdata('rollno'),
					);
				$this->db->insert('Registration', $data);
			}
		}
		$req = array('options' => $options);
		//List of accepted courses
		$this->load->view('include/header');
		$this->load->view('templates/table', $table);
		$this->load->view('course/submit', $req);
		$this->load->view('include/footer');
	}
	public function timetable()
	{
		$this->load->view('include/header');
		$this->load->view('include/footer');
	}
}
?>

<?php
class Course extends Authenticated {

	public function all()
	{
		$data = array(
			'head' => array('Course Number', 'Course Name', 'Units'),
			'rows' => array()
			);
		$query = $this->db->query('SELECT course_no, title, units FROM "Course"');
		if ($query->num_rows() > 0)
			$data['rows'] = $query->result();
		foreach ($data['rows'] as $r) {
			$r->course_no = modalLinks('course/details/' . $r->course_no, $r->course_no);
		}
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
		$query = $this->db->query('SELECT course_no, title, name FROM "Course" NATURAL JOIN "CourseOffering" NATURAL JOIN "Instructor" NATURAL JOIN "Faculty" WHERE acad_year = ? AND semester = ? AND incharge = ?', array($this->config->item('PR_year'), $this->config->item('PR_sem'), 'Y'));
		if ($query->num_rows() > 0)
			$data['rows'] = $query->result();
		foreach ($data['rows'] as $r) {
			$r->course_no = modalLinks('/course/details/' . $r->course_no, $r->course_no);
		}
		$this->load->view('include/header');
		$this->load->view('templates/table', $data);
		$this->load->view('include/footer');
	}
	public function details($id)
	{
		$query = $this->db->query('SELECT course.*, faculty.name, faculty.office_bldg, faculty.room_no, faculty.email FROM "Course" course NATURAL JOIN "CourseOffering" NATURAL JOIN "Instructor" NATURAL JOIN "Faculty" faculty WHERE course.course_no = ? AND acad_year = ? AND semester = ?', array($id, $this->config->item('PR_year'), $this->config->item('PR_sem')));
		$data['fields'] = $query->row();
		$this->load->view('course/details', $data);
	}
}
?>

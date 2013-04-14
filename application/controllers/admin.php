<?php
class Admin extends Authenticated {

	function __construct()
	{
		parent::__construct();
      	if (!strstr($this->session->userdata('role'), 'admin')) {
			show_error('You are not an admin! This will be reported', 403);
		}
	}
	public function addCourse()
	{
		$header = array();
		$id = null;
		$prereq = isset($_POST['prereq']) ? $_POST['prereq'] : array();
		if (isset($_POST['title'])) {
			if (isset($_POST['prereq'])) unset($_POST['prereq']);
			if (!isset($_POST['syllabus'])) $_POST['syllabus'] = " ";
			if($this->db->insert('Course', $_POST)) {
				$header['alert'] = array('type' => 'success', 'text' => $this->input->post('course_no') . ' has been succesfully created');
				$id = $this->input->post('course_no');
			}
			else
				$header['alert'] = array('type' => 'error', 'text' => $this->db->_error_message());
		}
		if(count($prereq)>0 && $id)
			foreach ($prereq as $p) {
				$arr['course_no'] = $id;
				$arr['req_course_no'] = $p;
				$this->db->insert('PreRequisite', $arr);
			}
		$this->load->view('include/header', $header);
		$this->load->view('admin/addcourse');
		$this->load->view('include/footer');
	}
	public function addOffering()
	{
		$header = array();
		if (isset($_POST['course_no'])) {
			$data = array(
				'course_no' => $_POST['course_no'],
				'acad_year' => $_POST['acad_year'],
				'semester' => $_POST['semester'],
				);
			if($this->db->insert('CourseOffering', $data)) {
				$id = $this->db->insert_id();
				$data = array();
				for ($i=0; $i < count($_POST['meeting_type']); $i++) { 
					$data[] = array(
						'course_offering' => $id,
						'meeting_type' => $_POST['meeting_type'][$i],
						'start_time' => $_POST['start_time'][$i],
						'duration' => $_POST['duration'][$i],
						'day' => $_POST['day'][$i],
						'location' => $_POST['location'][$i] );
				}
				$this->db->insert_batch('TimeTable', $data);
				$idata = array();
				for ($i=0; $i < count($_POST['FS']); $i++) {
					$d = array();
					$d['course_offering'] = $id;
					$d['roll_no'] = null;
					$d['faculty_id'] = null;
					$d['incharge'] = strcmp($_POST['FS'][$i], 'FI') == 0 ? 'Y' : 'N';
					if(strcmp($_POST['FS'][$i], 'S')==0) {
						$query = $this->db->query('SELECT roll_no FROM "Student" WHERE email = ?', array($_POST['email'][$i]));
						if(($row = $query->row()))
							$d['roll_no'] = $row->roll_no;
					}
					else {
						$query = $this->db->query('SELECT faculty_id FROM "Faculty" WHERE email = ?', array($_POST['email'][$i]));
						if(($row = $query->row()))
							$d['faculty_id'] = $row->faculty_id;
					}
					$idata[] = $d;
				}
				$this->db->insert_batch('Instructor', $idata);
				$header['alert'] = array('type' => 'success', 'text' => $this->input->post('course_no') . ' has been succesfully added to the offered courses');
			}
			else
				$header['alert'] = array('type' => 'error', 'text' => $this->db->_error_message());
		}
		$this->load->view('include/header', $header);
		$this->load->view('admin/addoffering');
		$this->load->view('include/footer');
	}
}
?>

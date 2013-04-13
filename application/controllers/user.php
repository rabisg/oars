<?php
class User extends Authenticated {

	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('include/welcome');
		$this->load->view('include/footer');
	}
	public function profile()
	{
		$header = array();
		if (isset($_POST['name'])) {
			$this->db->where('roll_no', $this->session->userdata('rollno'));
			$this->db->update('Student', $_POST);
			$header['alert'] = array('type' => 'success', 'text' => 'Your details have been successfully updated!');
		}
		$query = $this->db->query('SELECT * FROM "Student" WHERE roll_no = ?', array($this->session->userdata('rollno')));
		$row = $query->row();
		$data['fields'] = array(
			array(
				'label' => 'Name',
				'name' => 'name',
				'type' => 'text',
				'default' => $row->name,
				),
			array(
				'label' => 'Hall No',
				'name' => 'hall_no',
				'type' => 'select',
				'default' => $row->hall_no,
				'options' => array('1','2','3','4','5','GH2','7','8','9','10','GH1')
				),
			array(
				'label' => 'Room No',
				'name' => 'room_no',
				'type' => 'text',
				'default' => $row->room_no,
				),
			array(
				'label' => 'Gender',
				'name' => 'gender',
				'type' => 'select',
				'default' => $row->gender,
				'options' => array('Male', 'Female')
				),
			array(
				'label' => 'Program',
				'name' => 'program',
				'type' => 'select',
				'default' => $row->program,
				'options' => array('B.Tech','M.Tech','MBA','M.Des','M.Sc','PhD')
				),
			array(
				'label' => 'Department',
				'name' => 'department',
				'type' => 'select',
				'default' => $row->department,
				'options' => array('Computer Science and Engineering','Electrical Engineering','Mechanical Engineering','Civil Engineering','Aerospace Engineering','Biological Sciences and Bio-Engineering','Chemical Engineering','Environmental Engineering','Industrial and Management Engineering','Materials and Metallurgical Engineering','Material Science and Engineering','Humanities and Social Sciences','Chemistry','Physics','Statistics','Mathematics and Statistics')
				),
			);
		$this->load->view('include/header', $header);
		$this->load->view('templates/form', $data);
		$this->load->view('include/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
?>

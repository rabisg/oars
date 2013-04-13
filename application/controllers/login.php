<?php
class Login extends MY_Controller {

	public function index()
	{
		//Check whether user exists and assign him role
		$role = '';
		$sql = 'SELECT * FROM "Student" WHERE email = ?'; 
		$query = $this->db->query($sql, array($this->input->post('email')));
		if(($row = $query->row())) {
			$role .= ' student';
			$session['email'] = $row->email;
			$session['name'] = $row->name;
			$session['rollno'] = $row->roll_no;
		}

		$sql = 'SELECT * FROM "Faculty" WHERE email = ?'; 
		$query = $this->db->query($sql, array($this->input->post('email')));
		if(($row = $query->row())) {
			$role .= ' prof';
			$session['email'] = $row->email;
			$session['name'] = $row->name;
		}

		$sql = 'SELECT * FROM "Admin" WHERE email = ?'; 
		$query = $this->db->query($sql, array($this->input->post('email')));
		if(($row = $query->row())) {
			$role .= ' admin';
			$session['email'] = $row->email;
			$session['name'] = $row->name;
		}

		$session['role'] = trim($role);
		$this->session->set_userdata($session);
		redirect('user/');
	}
}
?>

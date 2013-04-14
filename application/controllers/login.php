<?php
class Login extends MY_Controller {

	public function index()
	{
		/*$this->load->library('ftp');
		$config['hostname'] = 'webhome.cc.iitk.ac.in';
		$config['username'] = $this->input->post('email');
		$config['password'] = $this->input->post('password');
		$config['debug']	= FALSE;

		if(!$this->ftp->connect($config))
			redirect('index.php');*/
		
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

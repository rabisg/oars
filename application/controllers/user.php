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
		$data['fields'] = array(
			array(
				'name' => 'Name',
				'type' => 'text',
				'default' => '',
				),
			array(
				'name' => 'Roll Number',
				'type' => 'text',
				'default' => '',
				),
			array(
				'name' => 'Hall No',
				'type' => 'select',
				'default' => '',
				'options' => array('1','2','3','4','5','GH2','7','8','9','10','GH1')
				),
			array(
				'name' => 'Room No',
				'type' => 'text',
				'default' => '',
				),
			array(
				'name' => 'Gender',
				'type' => 'select',
				'default' => '',
				'options' => array('Male', 'Female')
				),
			array(
				'name' => 'Program',
				'type' => 'select',
				'default' => '',
				'options' => array('B.Tech','M.Tech','MBA','M.Des','M.Sc','PhD')
				),
			array(
				'name' => 'Department',
				'type' => 'select',
				'default' => '',
				'options' => array('Computer Science and Engineering','Electrical Engineering','Mechanical Engineering','Civil Engineering','Aerospace Engineering','Biological Sciences and Bio-Engineering','Chemical Engineering','Environmental Engineering','Industrial and Management Engineering','Materials and Metallurgical Engineering','Material Science and Engineering','Humanities and Social Sciences','Chemistry','Physics','Statistics','Mathematics and Statistics')
				),
			);
		$this->load->view('include/header');
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

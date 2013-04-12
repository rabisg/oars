<?php
class Login extends MY_Controller {

	public function index()
	{
		//Check whether user exists and assign him role

		$role = 'admin prof student';
		$user = array('username' => $this->input->post('username'), 'role' => $role);
		$this->session->set_userdata($user);
		redirect('user/');
	}
}
?>

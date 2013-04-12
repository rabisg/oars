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
		$this->load->view('include/header');
		$this->load->view('admin/addcourse');
		$this->load->view('include/footer');
	}
	public function addOffering()
	{
		$this->load->view('include/header');
		$this->load->view('admin/addoffering');
		$this->load->view('include/footer');
	}
}
?>

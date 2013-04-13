<?php if (!defined('BASEPATH')) die();
class Frontpage extends MY_Controller {

   	public function index()
	{
		if($this->session->userdata('email'))
			redirect('/user');
	  	$this->load->view('templates/login');
	}
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */

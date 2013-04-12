<?php
class Page extends MY_Controller {

	public function faq()
	{
		$this->load->view('static/faq');
	}
	public function contact()
	{
		$this->load->view('static/contact');
	}
	public function about()
	{
		$this->load->view('static/about');
	}
}
?>

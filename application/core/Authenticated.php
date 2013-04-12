<?php
class Authenticated extends MY_Controller 
{
   function __construct()
   {
      parent::__construct();
      //var_dump($this->session->userdata('username'));
      if (!$this->session->userdata('username'))
      	redirect('');
   }
}

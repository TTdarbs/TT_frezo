<?php

class Controller_Login extends Controller_Template
{

	public function action_login()
	{
		$data["subnav"] = array('login'=> 'active' );
		$this->template->title = 'Login &raquo; Login';
		$this->template->content = View::forge('login/login', $data);
	}

	public function action_logut()
	{
		$data["subnav"] = array('logut'=> 'active' );
		$this->template->title = 'Login &raquo; Logut';
		$this->template->content = View::forge('login/logut', $data);
	}

	public function action_registration()
	{
		$data["subnav"] = array('registration'=> 'active' );
		$this->template->title = 'Login &raquo; Registration';
		$this->template->content = View::forge('login/registration', $data);
	}

	public function action_lostpassword()
	{
		$data["subnav"] = array('lostpassword'=> 'active' );
		$this->template->title = 'Login &raquo; Lostpassword';
		$this->template->content = View::forge('login/lostpassword', $data);
	}

}

<?php
namespace app\home\controller;
use think\Controller;

class User extends Controller
{
	public function login(){
		return $this->view->fetch('login');
	}

	public function register(){
		return $this->view->fetch('regist');
	}
}
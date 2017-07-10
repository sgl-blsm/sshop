<?php
namespace app\admin\controller;
use think\Controller;

class Admin extends Controller
{
    public function login()
    {
        return $this->view->fetch('login');
    }
}

<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Index extends Controller
{
	public function index(){
        // $temp = db::query('select * from sshop_goods');
        // dump($temp);
        return $this->view->fetch();
    }

    public function head(){
        return $this->view->fetch();
    }

    public function left(){
        return $this->view->fetch();
    }

    public function right(){
        return $this->view->fetch();
    }
}
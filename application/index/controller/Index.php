<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
    	$this->assign('msg', '');
        return view();
    }

    public function hello($name='hanabi', $id='1')
    {
    	return 'hello, '.$name.' ('.$id.').';
    }
}

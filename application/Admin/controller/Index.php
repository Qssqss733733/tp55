<?php
namespace App\Admin\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
//    public function index($name = 'qss')
//    {
//    	$this->assign('name',$name);
//    	return $this->fetch();
//    }
    public  function index()
    {
        $data = Db::name('data')->find();
        $this->assign('result',$data);
        return $this->fetch();
    }
    public function add()
    {
        $res = Db::table('think_data')
            ->insert(['id' => 7, 'data' => 'thinkphp']);
        dump($res);
    }
    public function edit()
    {
    	$res = Db::table('think_data')->where('id',7)->update(['data'=>'qss']);
    	dump($res);
    }
    public function select()
    {
    	$res = Db::table('think_data')->where('id',7)->select();
    	dump($res);
    	$this->assign('res',$res);
    	return $this->fetch('index/index');
    }
   
}

<?php
namespace app\admin\controller;

use app\admin\model\User;
use think\Controller;

class index extends Common
{


    protected $beforeActionList = [
        'first'  =>  ['only'=>'index'],


    ];

    protected function first()
    {
        $this->assign('t',0);

    }


    //首页，就是登陆页面
    public function index(){

        return $this->fetch();
    }







}

<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/7
 * Time: 16:34
 */

namespace app\admin\controller;




use think\Controller;

class Common extends Controller
{
     public function _initialize()
     {
         parent::_initialize(); // TODO: Change the autogenerated stub
         if (session('login') !== true || session('ll_username') == null ){
                //没有登陆
             $this->redirect('login/login');
         } 
     }
}
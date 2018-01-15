<?php
namespace app\admin\controller;

use app\admin\model\User;
use think\Controller;

class Login extends Controller
{

    //首页，就是登陆页面
    public function index(){
        $this->redirect('login');
    }

    //首页，就是登陆页面
    public function login(){

        return $this->fetch('login');
    }


    /*
     * 检查登陆信息
     *
     * */
    public function check(){
        $send = input();
        $user = new  User();
        $w['ll_username']=$send['ll_username'];
        $w['ll_type']=1;
        $u = $user->where($w)->find();
        if ($u!=null){

            if ($u['ll_password'] == md5($send['ll_password'])){
//                $this->redirect('index/index');
                session('login',true);
                session('ll_username',$send['ll_username']);
                session('ll_uid',$u['ll_uid']);
                return [
                    'code' => 1,
                    'msg'  => '登陆成功'
                ];
            }else{
                return [
                    'code' => 0,
                    'msg'  => '密码错误'
                ];
            }
        }else{
            return [
                'code' => 0,
                'msg'  => '没有该用户名'
            ];
        }
    }


    /*
     * 退出登陆
     *
     * */
    public function logout(){
        session(null);
        $this->redirect('login');
    }





}

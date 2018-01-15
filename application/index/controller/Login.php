<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/11
 * Time: 12:23
 */

namespace app\index\controller;


use app\admin\model\User;
use think\Controller;
use think\Db;

class Login extends Controller
{

    /*
     *
     * 登录页面
     * */
    public function login(){


        return $this->fetch();
    }


    /*
      * 检查登陆信息
      *
      * */
    public function check(){
        $send = input();
        $user = new  User();
        $w['ll_username']=$send['ll_username'];
        $u = $user->where($w)->find();
        if ($u!=null){

            if ($u['ll_password'] == md5($send['ll_password'])){
//                $this->redirect('index/index');
                session('slogin',true);
                session('ll_susername',$send['ll_username']);
                session('ll_suid',$u['ll_uid']);
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
    
    
    
    /*
     * 注册页面
     * 
     * */
    
    public function register(){
        
        
        return $this->fetch();
    }



    /*
     * 处理注册
     * */

    public function doregist(){

        $send = input();
//        dump($send);
        if ($send['ll_password'] == $send['qpassword']){
            unset($send['qpassword']);
            $send['ll_password'] = md5($send['ll_password']);
            $send['ll_type'] = 3;
            Db::startTrans();
            try{

                Db::table('ll_user')->insert($send);;//新闻的表的更新
                $suid = Db::getLastInsID();
                session('ll_suid',$suid);

                // 提交事务
                Db::commit();

            } catch (\Exception $e) {
                // 回滚事务
//            dump($e);
                $this->error('填写的信息错误，请检查！');
                Db::rollback();
            }
            session('slogin',true);
            session('ll_susername',$send['ll_username']);
            $this->success('新增成功','Admin/index');
        }else{
            $this->error('密码和确认密码不一致');

        }
    }
    
    
    
    /*
     * 是否登录了
     * 
     * */
    public function islogin(){
        if (session('slogin')){
            echo  1;
        }else{
            echo 0;
        }
    }



}
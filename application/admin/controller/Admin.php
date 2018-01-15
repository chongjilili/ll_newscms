<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/8
 * Time: 20:42
 */

namespace app\admin\controller;


use app\admin\model\Apply;
use app\admin\model\User;
use think\Db;

class Admin extends Common
{


    protected $beforeActionList = [
        'fourth'  ,


    ];

    protected function fourth()
    {
        $this->assign('t',4);

    }

    /*
     * 
     * 用户列表
     * 
     * */
    public function index(){
        
        $user = new User();
        $users = collection($user->getAllUser())->toArray();
        $this->assign('users',$users);
        return $this->fetch();
    }


    /*
     * 
     * 用户列表
     * 
     * */
    public function detail(){
        
        $send = input();
        $user = new User();
        $user = collection($user->getUserByuid($send['ll_uid']))->toArray();
        $this->assign('user',$user);
        return $this->fetch();
    }

    /*
     * 修改
     *
     * */
    public function modify(){
        $send = input();
//        dump($send);

        Db::startTrans();
        try{

            Db::name('user')->where('ll_uid',$send['ll_uid'])->update($send);//新闻的表的更新

            // 提交事务
            Db::commit();

        } catch (\Exception $e) {
            // 回滚事务
//            dump($e);
            $this->error('填写的信息错误，请检查！');
            Db::rollback();
        }

        $this->success('修改成功');
    }

    /*
     * 删除分类
     *
     * */
    public function delete(){
        $send = input();
//        dump($send);
        Db::startTrans();
        try{

            Db::name('user')->where('ll_uid',$send['ll_uid'])->delete();//新闻的表的更新

            // 提交事务
            Db::commit();

        } catch (\Exception $e) {
            // 回滚事务
//            dump($e);
            $this->error('删除失败');
            Db::rollback();
        }

        $this->success('删除成功');

    }


    /*
     * 增加页面.
     *
     * */
    public function add(){



        return $this->fetch();
    }


    /*
     * 增加操作.
     *
     * */
    public function doadd(){
        $send = input();
//        dump($send);
        if ($send['ll_password'] == $send['qpassword']){
            unset($send['qpassword']);
            $send['ll_password'] = md5($send['ll_password']);
            $send['ll_type'] = 3;
            Db::startTrans();
            try{

                Db::name('user')->insert($send);;//新闻的表的更新

                // 提交事务
                Db::commit();

            } catch (\Exception $e) {
                // 回滚事务
//            dump($e);
                $this->error('填写的信息错误，请检查！');
                Db::rollback();
            }

            $this->success('新增成功','Admin/index');
        }else{
            $this->error('密码和确认密码不一致');

        }


    }
    
  
}
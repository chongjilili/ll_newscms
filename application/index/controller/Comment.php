<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/8
 * Time: 20:42
 */

namespace app\index\controller;


use app\admin\model\Comments;
use app\admin\model\User;
use think\Controller;
use think\Db;

class Comment  extends Controller
{


    /*
     * 增加评论
     *
     *
     * */
    public function doadd(){
        $send = input();
        $send['ll_cmtime'] = time();
        $cmtid = Db::name('comments')->insertGetId($send)  ;

        echo $cmtid;
    }


    /*
     * 删除评论
     *
     * */
    public function delete(){
        $send = input();
//        dump($send);
        Db::startTrans();
        try{

            Db::table('ll_comments')->where('ll_cmtid',$send['ll_cmtid'])->delete();//新闻的表的更新

            // 提交事务
            Db::commit();

        } catch (\Exception $e) {
            // 回滚事务
//            dump($e);
            $this->error('删除失败');
//            echo 0;
            Db::rollback();
        }

        $this->success('删除成功');

    }


     




}
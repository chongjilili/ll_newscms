<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/8
 * Time: 20:42
 */

namespace app\admin\controller;


use app\admin\model\Comments;
use app\admin\model\User;
use think\Db;

class Comment extends Common
{

    protected $beforeActionList = [
        'fifth'  ,


    ];

    protected function fifth()
    {
        $this->assign('t',5);

    }
    
    /*
     * 
     * 评论列表
     * 
     * */
    public function index(){
        
       /* $commentsmodel = new Comments();
        $comments = collection($commentsmodel->getAllComments())->toArray();
        $this->assign('users',$comments);*/
        return $this->fetch();
    }

    //评论列表json数据
    public function commentsjson(){
        $send = input();
        $page = $send['page'];
        $limit = $send['limit'];
        $commentsmodel = new Comments();
        $commentlist = $commentsmodel->getAllComments($page,$limit);//新闻列表
        $count = $commentsmodel->getCountOfComments();
//        var_dump($count);
        $commentlist = collection($commentlist)->toArray();
        $commentlistdata = json_encode($commentlist);
        $commentlistdatajson = '{ "code": 0, "msg": "","count": '.$count.', "data":'.$commentlistdata .'}';
        echo $commentlistdatajson;
    }


    /*
     * 
     * 用户列表
     * 
     * */
    public function detail(){
        
        $send = input();
        $commentsmodel = new Comments();
        $comment = collection($commentsmodel->getCommentsDetailBycomtid($send['ll_cmtid']))->toArray();
        $this->assign('comment',$comment);
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

            Db::table('ll_comments')->where('ll_cmtid',$send['ll_cmtid'])->update($send);//新闻的表的更新

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
            Db::rollback();
        }

        $this->success('删除成功');

    }


     




}
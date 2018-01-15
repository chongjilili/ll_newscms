<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/8
 * Time: 20:42
 */

namespace app\admin\controller;


use app\admin\model\Collect;
use app\admin\model\Comments;
use app\admin\model\User;
use think\Db;

class Collection extends Common
{

    protected $beforeActionList = [
        'sixth'  ,


    ];

    protected function sixth()
    {
        $this->assign('t',6);

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
    public function Collectionjson(){
        $send = input();
        $page = $send['page'];
        $limit = $send['limit'];
        $collectsmodel = new Collect();
        $collectlist = $collectsmodel->getAllCollections($page,$limit);//新闻列表
        $count = $collectsmodel->getCountOfCollections();
//        var_dump($count);
        $collectlist = collection($collectlist)->toArray();
        $collectlistdata = json_encode($collectlist);
        $collectlistdatajson = '{ "code": 0, "msg": "","count": '.$count.', "data":'.$collectlistdata .'}';
        echo $collectlistdatajson;
    }






    /*
     * 删除收藏
     *
     * */
    public function delete(){
        $send = input();
//        dump($send);
        Db::startTrans();
        try{

            Db::table('ll_collect')->where('ll_coid',$send['ll_coid'])->delete();//新闻的表的更新

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
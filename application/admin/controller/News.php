<?php
namespace app\admin\controller;

use app\admin\model\Article;
use app\admin\model\Category;
use app\admin\model\User;
use think\Controller;
use think\Db;

class News extends Common
{

    protected $beforeActionList = [
        'first'  =>  ['only'=>'index,detail'],

        'three'  =>  ['only'=>'addnews'],
    ];

    protected function first()
    {
        $this->assign('t',1);

    }

    protected function three()
    {
        $this->assign('t',3);

    }


    //新闻列表
    public function index(){

       
        return $this->fetch();
    }
    
    //新闻列表json数据
    public function newlistjson(){
        $send = input();
        $page = $send['page'];
        $limit = $send['limit'];
        $articlemodel = new Article();
        $newslist = $articlemodel->getNewslist($page,$limit);//新闻列表
        $count = $articlemodel->getCountOfNews();
//        var_dump($count);
        $newslist = collection($newslist)->toArray();
        $newslistdata = json_encode($newslist);
        $newslistjson = '{ "code": 0, "msg": "","count": '.$count.', "data":'.$newslistdata .'}';
        echo $newslistjson;
    }


    /*
     * 新闻详细页面
     *
     * */
    public function detail(){
        $send = input();
//        dump(strtotime('now'));
        $aid = $send['ll_aid'];
        $articlemodel = new Article();
        $newsdetail = $articlemodel->getNewsDetailByAid($aid);//获得详细资料
        $this->assign('nd',$newsdetail);


        $catmodel = new  Category();
        $categorys = $catmodel->getAllCategory();//获得所有的分类，树状的结构
//        dump($categorys);
        $catnottree = $catmodel->getCatNotTree($categorys);
        $this->assign('catnottree',$catnottree);

        return $this->fetch();
    }

    /*
     * 修改
     *
     * */
    public function modify(){
        $send = input();
        $cid = $send['ll_cid'];
        $uid = $send['ll_uid'];
        $send['ll_state'] = empty($send['ll_state'])||$send['ll_state']!='on' ? 2 :1;
        $send['ll_time'] = strtotime($send['ll_time']) ;
        unset($send['file']);
        Db::startTrans();
        try{

            Db::name('article')->where('ll_aid',$send['ll_aid'])->update($send);//新闻的表的更新

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
     *
     * 增加新闻页面
     *
     * */
    public function addnews(){

        $articlemodel = new Article();
        $usermodel = new  User();
        $catmodel = new  Category();
        $users = $usermodel->getAllUser();//所有的用户
        $categorys = $catmodel->getAllCategory();//获得所有的分类，树状的结构
//        dump($categorys);
        $catnottree = $catmodel->getCatNotTree($categorys);
//        dump($users);
        $this->assign('users',$users);
        $this->assign('catnottree',$catnottree);

        return $this->fetch();
        
    }


    /*
     * 添加操作
     *
     * */
    public function doadd(){
        $send = input();
//        var_dump($send);
        /*
 array(5) {
  ["ll_title"]=>
  string(9) "急急急"
  ["ll_cid"]=>
  string(1) "4"
  ["ll_uid"]=>
  string(1) "1"
  ["ll_state"]=>
  string(2) "on"
  ["ll_content"]=>
  string(15) "防守打法是"
}
         *
         * */
        $send['ll_state'] = empty($send['ll_state'])||$send['ll_state']!='on' ? 2 :1;
        $send['ll_time'] = strtotime('now') ;
        unset($send['file']);

        Db::startTrans();
        try{
            Db::name('article')->insert($send);//新闻的表的更新
            // 提交事务
            Db::commit();
        } catch (\Exception $e) {
            // 回滚事务

            $this->error('填写的信息错误，请检查！');
            Db::rollback();
        }

        $this->success('增加成功','news/index');

    }

    /*
     * 
     * 删除页面
     * 
     * */
    public function delete(){
        $send=input();
        $aid = $send['ll_aid'];



        Db::startTrans();
        try{
            if (Db::name('article')->delete($aid)<=0){//删除数据
                $this->error('删除失败');
            }
            // 提交事务
            Db::commit();
        } catch (\Exception $e) {
            // 回滚事务

            $this->error('删除失败');
            Db::rollback();
        }

        $this->success('删除成功');


    }




}

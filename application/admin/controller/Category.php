<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/8
 * Time: 16:14
 */

namespace app\admin\controller;


use think\Db;

class Category extends Common
{


    protected $beforeActionList = [
        'second'  ,


    ];

    protected function second()
    {
        $this->assign('t',2);

    }


    /*
     * 新闻类型列表
     *
     * */
    public function index(){
        $catmodel = new  \app\admin\model\Category();
        $categorys = $catmodel->getAllCategory();//获得所有的分类，树状的结构
//        dump($categorys);
        $catnottree = $catmodel->getCatNotTree($categorys);//一维分类数据
        $this->assign('catnottree',$catnottree);

        return $this->fetch();
    }

    /*
     * 详细页面
     *
     * */
    public function detail(){


        $send = input();
        $cid = $send['ll_cid'];
        $catmodel = new  \app\admin\model\Category();
        $catdet = $catmodel->getDetailByCid($cid);//详细信息

        $catnottree = $catmodel->getCatNotTree($catmodel->getAllCategory());//一维分类数据
        $this->assign('catdet',$catdet);
        $this->assign('catnottree',$catnottree);
        $this->assign('cid',$cid);

//        dump($catdet);
        return $this->fetch();

    }
    
    
    /*
     * 修改分类
     * 
     * */
    public function modify(){
        $send = input();
//        dump($send);
        Db::startTrans();
        try{

            Db::table('ll_category')->where('ll_cid',$send['ll_cid'])->update($send);//新闻的表的更新

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

            Db::table('ll_category')->where('ll_cid',$send['ll_cid'])->delete();//新闻的表的更新

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

        $catmodel = new  \app\admin\model\Category();


        $catnottree = $catmodel->getCatNotTree($catmodel->getAllCategory());//一维分类数据

        $this->assign('catnottree',$catnottree);
        
        return $this->fetch();
    }


    /*
     * 增加操作.
     *
     * */
    public function doadd(){
        $send = input();
//        dump($send);
        Db::startTrans();
        try{

            Db::table('ll_category')->insert($send);;//新闻的表的更新

            // 提交事务
            Db::commit();

        } catch (\Exception $e) {
            // 回滚事务
//            dump($e);
            $this->error('填写的信息错误，请检查！');
            Db::rollback();
        }

        $this->success('新增成功','category/index');

    }
    
    
    
    
    
    
    
    
}
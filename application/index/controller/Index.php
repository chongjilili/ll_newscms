<?php
namespace app\index\controller;

use app\admin\model\Article;
use app\admin\model\Category;
use think\Controller;

class Index extends Controller
{



    

    //前台首页
    public function index(){

        $send = input();
        $ll_cid = empty($send['ll_cid'])? 1 : $send['ll_cid'] ;
        $catmodel = new  Category();
        $cattree = $catmodel->getAllCategory();//目录信息
        $catnottree = $catmodel->getCatNotTree($cattree);//分类变成一维

        $articlemodel = new Article();
        $articlearr = $articlemodel->getNewslistMoreMsg($ll_cid);//新闻列表数据
        

        $this->assign('catnt',$catnottree);
        $this->assign('ll_cid',$ll_cid);
        $this->assign('articlearr',$articlearr);

        return $this->fetch();
    }


}

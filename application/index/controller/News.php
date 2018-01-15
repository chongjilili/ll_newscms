<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/10
 * Time: 20:38
 */

namespace app\index\controller;

use app\admin\model\Article;
use app\admin\model\Category;
use app\admin\model\Comments;
use think\Controller;
use think\Db;

class News extends Controller
{

    /*
     * 新闻详细页面
     *
     * */
    public function detail(){

        $send = input();
        $ll_aid = empty($send['ll_aid'])? 1 : $send['ll_aid'] ;

        $catmodel = new  Category();
        $cattree = $catmodel->getAllCategory();//目录信息
        $catnottree = $catmodel->getCatNotTree($cattree);//分类变成一维

        $articlemodel = new  Article();
        $newsdetail = $articlemodel->getNewsDetailByAid($ll_aid);//新闻的详细的信息

        $ll_cid = $newsdetail['ll_cid'];
//        dump($newsdetail);

        $commentmodel = new Comments();
        $comments = $commentmodel->getCommentsDetailByAid($ll_aid);//获得文章下面的所有的评论
         
        Db::name('article')->where('ll_aid',$ll_aid)->setInc('ll_rnum');//浏览数增加1
        
        $this->assign('dz',Db::name('collect')->where($send)->count());
        $this->assign('catnt',$catnottree);
        $this->assign('newsdetail',$newsdetail);
        $this->assign('comments',$comments);
        $this->assign('ll_cid',$ll_cid);
        $this->assign('ll_aid',$ll_aid);

        return $this->fetch();
    }
}
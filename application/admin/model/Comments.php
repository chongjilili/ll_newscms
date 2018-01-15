<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/9
 * Time: 13:25
 */

namespace app\admin\model;


use think\Model;

class Comments extends Model
{
    /*
     * 搜索所有的评论
     *
     * */
    public function getAllComments($page=1,$limit=10){
        $start = ($page-1)*$limit;
        $sql = "SELECT cm.* , a.ll_title ,u.ll_username FROM ll_comments as cm 
LEFT JOIN ll_user as u ON cm.ll_uid = u.ll_uid 
LEFT JOIN ll_article as a ON cm.ll_aid = a.ll_aid "." limit  ".$start.', '.$limit;
        $comments = $this->query($sql);
        return $comments;
    }



    /*
     * 搜索所有的评论的总数
     *
     * */
    public function getCountOfComments(){

        $sql = "SELECT COUNT(*) as count FROM ll_comments as cm 
LEFT JOIN ll_user as u ON cm.ll_uid = u.ll_uid 
LEFT JOIN ll_article as a ON cm.ll_aid = a.ll_aid ";
        $count = $this->query($sql);
        return $count[0]['count'];
    }


    /*
     * 获得评论详细数据
     *
     * */
    public function getCommentsDetailBycomtid($cmtid){
        $sql = "SELECT cm.* , a.ll_title ,u.ll_username FROM ll_comments as cm 
LEFT JOIN ll_user as u ON cm.ll_uid = u.ll_uid 
LEFT JOIN ll_article as a ON cm.ll_aid  = a.ll_aid WHERE cm.ll_cmtid =".$cmtid;
        $commentdetail = $this->query($sql);
        $commentdetail = $commentdetail[0];
        return $commentdetail;

    }


    /*
     * 获得评论详细数据
     *
     * */
    public function getCommentsDetailByAid($Aid){
        $sql = "SELECT cm.* , a.ll_title ,u.ll_username FROM ll_comments as cm 
LEFT JOIN ll_user as u ON cm.ll_uid = u.ll_uid 
LEFT JOIN ll_article as a ON cm.ll_aid  = a.ll_aid WHERE a.ll_aid =".$Aid." order by cm.ll_cmtime desc";
        $commentdetail = $this->query($sql);
         
        return $commentdetail;

    }
    





}
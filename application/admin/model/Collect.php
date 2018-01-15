<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/9
 * Time: 13:25
 */

namespace app\admin\model;


use think\Model;

class Collect extends Model
{
    /*
     * 搜索所有的评论
     *
     * */
    public function getAllCollections($page=1,$limit=10){
        $start = ($page-1)*$limit;
        $sql = "SELECT co.* , a.ll_title ,u.ll_username FROM ll_collect as co 
LEFT JOIN ll_user as u ON co.ll_uid = u.ll_uid 
LEFT JOIN ll_article as a ON co.ll_aid = a.ll_aid "." limit  ".$start.', '.$limit;
        $collections = $this->query($sql);
        return $collections;
    }



    /*
     * 搜索所有的评论的总数
     *
     * */
    public function getCountOfCollections(){

        $sql = "SELECT COUNT(*) as count FROM ll_collect as co 
LEFT JOIN ll_user as u ON co.ll_uid = u.ll_uid 
LEFT JOIN ll_article as a ON co.ll_aid = a.ll_aid ";
        $count = $this->query($sql);
        return $count[0]['count'];
    }


    /*
     * 获得评论详细数据
     *
     * */
    public function getCollectionsDetailByAid($coid){
        $sql = "SELECT co.* , a.ll_title ,u.ll_username FROM ll_collect as co 
LEFT JOIN ll_user as u ON co.ll_uid = u.ll_uid 
LEFT JOIN ll_article as a ON co.ll_aid = a.ll_aid   WHERE co.ll_coid =".$coid;
        $collectionsdetail = $this->query($sql);
        $collectionsdetail = $collectionsdetail[0];
        return $collectionsdetail;

    }





}
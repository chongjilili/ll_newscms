<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/7
 * Time: 23:01
 */

namespace app\admin\model;


use think\Model;

class Article extends Model
{
    //获得新闻列表json
    public function getNewslist($page=1,$limit=10){

        $start = ($page-1)*$limit;
        $sql = "SELECT a.ll_aid,a.ll_title,FROM_UNIXTIME(a.ll_time) as ll_time ,a.ll_rnum,u.ll_username,c.ll_catname FROM ll_article as a 
LEFT JOIN ll_user as u ON a.ll_uid = u.ll_uid
LEFT JOIN ll_category as c ON a.ll_cid = c.ll_cid "." limit  ".$start.', '.$limit;
        $newslist = $this->query($sql);
        return $newslist;

    }

    //获得新闻列表的总数
    public function getCountOfNews(){
        $sql = "SELECT count(*) as count FROM ll_article as a 
LEFT JOIN ll_user as u ON a.ll_uid = u.ll_uid
LEFT JOIN ll_category as c ON a.ll_cid = c.ll_cid";
        $count = $this->query($sql);
        return $count[0]['count'];
    }

    /*
     * 获得新闻详细数据
     * 
     * */
    public function getNewsDetailByAid($aid){
        $sql = "SELECT * FROM ll_article as a 
LEFT JOIN ll_user as u ON a.ll_uid = u.ll_uid
LEFT JOIN ll_category as c ON a.ll_cid = c.ll_cid WHERE a.ll_aid = ".$aid;
        $newsdetail = $this->query($sql);
        $newsdetail = $newsdetail[0];
        return $newsdetail;
        
    }



    /*
     * 保存上传信息
     *
     * */
    public function saveupload($aid,$path){
        $sql = "update ll_article set ll_pics = '".$path."' where ll_aid = ".$aid;
        $this->query($sql);
    }



    //获得新闻列表json
    public function getNewslistMoreMsg($cid=1,$page=1,$limit=10){

        $where = '';
        if ($cid != 1) {
            $where = "WHERE a.ll_cid = " . $cid;
        }

        $start = ($page-1)*$limit;
        $sql = "
SELECT a.*,FROM_UNIXTIME(a.ll_time) as ll_time ,(unix_timestamp(now())-a.ll_time) AS passtime ,   u.ll_username,c.ll_catname, COUNT( DISTINCT cm.ll_comments) as commentnum FROM ll_article as a 
LEFT JOIN ll_user as u ON a.ll_uid = u.ll_uid
LEFT JOIN ll_category as c ON a.ll_cid = c.ll_cid 
LEFT JOIN ll_comments as cm ON cm.ll_aid = a.ll_aid      ".$where." GROUP BY a.ll_aid   "." limit  ".$start.', '.$limit;
        $newslist = $this->query($sql);
        return $newslist;

    }
     




}
<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/11
 * Time: 15:27
 */

namespace app\admin\model;


use think\Model;

class Apply extends Model
{
     public function getapplylist($page=1,$limit=10){
         $start = ($page-1)*$limit;
         $sql = "SELECT ap.* ,FROM_UNIXTIME(ap.ll_aptime) as ll_aptime,FROM_UNIXTIME(ap.ll_ptime) as ll_ptime, u.ll_username ,ut.ll_typename FROM ll_apply as ap 
LEFT JOIN ll_user as u ON ap.ll_uid = u.ll_uid 
LEFT JOIN ll_usertype as ut ON ap.ll_type = ut.ll_type ORDER BY ap.ll_aptime DESC "." limit  ".$start.', '.$limit;
         $res = $this->query($sql);

         return $res;
     }


    //获得新闻列表的总数
    public function getCountOfApply(){
        $sql = "SELECT count(*)  as count FROM ll_apply as ap 
LEFT JOIN ll_user as u ON ap.ll_uid = u.ll_uid 
LEFT JOIN ll_usertype as ut ON ap.ll_type = ut.ll_type ";
        $count = $this->query($sql);
        return $count[0]['count'];
    }


    /*
     * 通过uid获得申请
     *
     * */
    public function getapplyByUid($uid){

        $sql = "SELECT ap.* ,FROM_UNIXTIME(ap.ll_aptime) as ll_aptime,FROM_UNIXTIME(ap.ll_ptime) as ll_ptime, u.ll_username ,ut.ll_typename FROM ll_apply as ap 
LEFT JOIN ll_user as u ON ap.ll_uid = u.ll_uid 
LEFT JOIN ll_usertype as ut ON ap.ll_type = ut.ll_type WHERE ap.ll_uid = ".$uid." ORDER BY ap.ll_aptime DESC ";
        $res = $this->query($sql);

        return $res;
    }
    
    
    
    
}
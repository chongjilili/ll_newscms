<?php
namespace app\admin\model;
use think\Model;

/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/7
 * Time: 16:16
 */
class User extends Model
{

    /*
     * 搜索所有的用户
     *
     * */
    public function getAllUser(){
        $sql = "select ll_uid,ll_username from ll_user ";
        $users = $this->query($sql);
        return $users;
    }
    
    
    /*
     * 
     * 通过uid获得用户
     * 
     * 
     * */
    
    public function getUserByuid($uid){
        $sql = "SELECT u.ll_uid,u.ll_username,ut.* FROM ll_user as u 
LEFT JOIN ll_usertype AS ut ON u.ll_type = ut.ll_type  WHERE u.ll_uid = ".$uid;
        $users = $this->query($sql);
        return $users[0];
    }
    
    
    
}
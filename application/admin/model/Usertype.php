<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/11
 * Time: 15:04
 */

namespace app\admin\model;


use think\Model;

class Usertype extends Model
{

    /*
     * 获得类型列表
     * */
    public function getUsertypelist(){
        $utlist = $this->select();
        return $utlist;
    }
    
    
    
    
    
    
    
}
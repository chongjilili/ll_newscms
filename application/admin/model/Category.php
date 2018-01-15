<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/8
 * Time: 12:35
 */

namespace app\admin\model;


use think\Model;

class Category extends  Model
{
    /*
     * 获得所有的分类,递归
     *
     * */
    public function getAllCategory($cid=1,$floor=0){

        $floor++;
        $cat = $this->field('ll_cid,ll_catname')->where('ll_pcid',$cid)->select();
        $cat = collection($cat)->toArray();

        if (!empty($cat)){
            //不为空就继续递归
            foreach ($cat as $key => &$cc){
                $cc['child'] = [];
//                dump($cc);
                $cc['child'] = $this->getAllCategory($cc['ll_cid'],$floor);
                $cc['floor'] = $floor;
            }


        }
         
        return $cat;
    }



    /*
     * 树状的结构的分类变一维
     *
     * */

    public function getCatNotTree($cattree, &$catnottree=[] ){
        if (!empty($cattree) &&  count($cattree)!=0){
            foreach ($cattree as $ckey => $cv){
                $data['ll_cid'] = $cv['ll_cid'];
                $data['ll_catname'] = $cv['ll_catname'];
                $data['floor'] = $cv['floor'];
                array_push($catnottree, $data);
                $this->getCatNotTree($cv['child'],$catnottree);
            }
        }

        return $catnottree;

    }


    /*
     * 
     * 获得分类详细信息
     * 
     * */
    public function getDetailByCid($cid){
        $w['ll_cid'] = $cid;
        $catdet = $this->where($w)->find();
        return $catdet;
    }





}
<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/10
 * Time: 15:40
 */

namespace app\admin\controller;


use app\admin\model\Article;

class Upload extends Common
{

    /*
     *上传图片
     *
     * */
    public function index(){

//        $aid = input('ll_aid');
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');

        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
//                echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
//                echo $info->getSaveName();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
//                echo $info->getFilename();
                $imgname = $info->getSaveName();
                $imgname = str_replace('\\','/' ,$imgname );
//                dump($imgname);
                $upjson = '{"code": 0,"msg": "","data": { "src":"'.$imgname.'"}}';
               /* $articlemodel = new  Article();
                $articlemodel->saveupload($aid, $imgname);//存进数据库*/
                echo $upjson;




            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }

    }
}
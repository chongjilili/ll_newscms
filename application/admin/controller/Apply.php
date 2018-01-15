<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 2018/1/11
 * Time: 15:52
 */

namespace app\admin\controller;


use think\Db;

class Apply extends Common
{


    protected $beforeActionList = [
        'seventh'  ,


    ];

    protected function seventh()
    {
        $this->assign('t',7);

    }

    /*
   * 申请列表
   *
   * */
    public function index()
    {
        $applymodel = new  \app\admin\model\Apply();
        $applylist = $applymodel->getapplylist();

        return $this->fetch();
    }


    //新闻列表json数据
    public function applylistjson()
    {
        $send = input();
        $page = $send['page'];
        $limit = $send['limit'];
        $applymodel = new  \app\admin\model\Apply();
        $applylist = $applymodel->getapplylist($page, $limit);//列表
        $count = $applymodel->getCountOfApply();
//        var_dump($count);
        $applylist = collection($applylist)->toArray();
        $applylistdata = json_encode($applylist);
        $applylistjson = '{ "code": 0, "msg": "","count": ' . $count . ', "data":' . $applylistdata . '}';
        echo $applylistjson;


    }


    /*
     * 通过
     *
     * */
    public function pass(){
        $send = input();
        $send['ll_ptime'] = time();
        $send['ll_pass'] = 1;


        Db::startTrans();
        try{

            Db::name('apply')->update($send);
            $ap = Db::name('apply')->where('ll_apid',$send['ll_apid'])->find();
            $ap = collection($ap)->toArray();
            $d['ll_uid'] = $ap['ll_uid'];
            $d['ll_type'] = $ap['ll_type'];
            Db::name('user')->update($d);


            // 提交事务
            Db::commit();

        } catch (\Exception $e) {
            // 回滚事务
//            dump($e);
            $this->error('通过失败');
            Db::rollback();
        }


        $this->success('通过');
    }

    public function refused(){
        $send = input();

        $send['ll_pass'] = 3;
        Db::name('apply')->update($send);
        $this->success('拒绝');
    }

}
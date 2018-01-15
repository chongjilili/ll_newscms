<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"D:\program\phpStudy\WWW\ll_newscms./application/index\view\index_index.html";i:1515644425;s:73:"D:\program\phpStudy\WWW\ll_newscms\application\index\view\public_nav.html";i:1515648960;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>llnews-首页</title>
    <link rel="stylesheet" type="text/css" href="/ll_newscms/public/static/bootstrap/css/bootstrap.css">
    <script src="/ll_newscms/public/static/jquery-2.js" type="text/javascript" charset="utf-8"  ></script>

    <script src="/ll_newscms/public/static/bootstrap/js/bootstrap.js" type="text/javascript" charset="utf-8"  ></script>
    <link rel="stylesheet" href="/ll_newscms/public/index/css/style.css">

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">llnews</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo url('index/index'); ?>">首页 </a></li>
                <li ><a href="#">广州 7° </a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">




                <?php if(session('slogin')): ?>
                <li><a href="<?php echo url('member/index'); ?>">你好，<?php echo \think\Session::get('ll_susername'); ?></a></li>
                <li><a href="<?php echo url('login/logout'); ?>" onclick="return confirm('你真的要退出吗')">退出</a></li>

                <?php else: ?>
                <li><a href="<?php echo url('login/login'); ?>" >登录</a></li>

                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>







<div class="wrap row">

    <!-- <div class="leftbox     col-md-2 col-sm-4 hidden-xs " >
        <div class="leftnav">
                <div class="nav_title">导航</div>
                <div class="clear"></div>
                <div class="navcat">
                        <ul>
                            <li><a href="" title="">科技</a></li>
                            <li><a href="" title="">科技</a></li>
                            <li><a href="" title="">科技</a></li>
                            <li><a href="" title="">科技</a></li>
                            <li><a href="" title="">科技</a></li>
                            <li><a href="" title="">科技</a></li>
                            <li><a href="" title="">科技</a></li>
                            <li><a href="" title="">科技</a></li>
                        </ul>
                </div>
        </div>

    </div> -->


    <div class="col-md-2 col-md-offset-2 col-sm-4   hidden-xs"  id="myScrollspy">
        <ul class="nav nav-tabs nav-stacked" id="myNav">


            <li <?php if($ll_cid == 1): ?> class="active" <?php endif; ?>><a href="<?php echo url('index/index',['ll_cid'=>1 ]); ?>">所有 </a></li>

            <?php if(is_array($catnt) || $catnt instanceof \think\Collection || $catnt instanceof \think\Paginator): $i = 0; $__LIST__ = $catnt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
                 <li <?php if($c['ll_cid'] == $ll_cid): ?> class="active" <?php endif; ?>><a href="<?php echo url('index/index',['ll_cid'=>$c['ll_cid']]); ?>"><?php echo $c['ll_catname']; ?> </a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>




        </ul>
    </div>




    <div class="newslist col-md-6 col-sm-8">
        <ul class="newsul">




            <?php if(is_array($articlearr) || $articlearr instanceof \think\Collection || $articlearr instanceof \think\Paginator): $i = 0; $__LIST__ = $articlearr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
            <li>
                <a href="<?php echo url('news/detail',['ll_aid'=> $art['ll_aid']]); ?>" title="" class="imga">
                    <img src="/ll_newscms/public/uploads/<?php echo $art['ll_pics']; ?>" alt="<?php echo $art['ll_title']; ?>">
                </a>
                <div class="rbox">
                    <div class="rtitle">
                        <a href="<?php echo url('news/detail',['ll_aid'=> $art['ll_aid']]); ?>" title=""><?php echo $art['ll_title']; ?></a>
                    </div>
                    <div class="rfooter">
                        <a href="#" title=""><?php echo $art['ll_username']; ?></a>*
                        <a href="news.html" title=""><?php echo $art['commentnum']; ?>评论</a>
                        <span><?php echo timeToFormat($art['passtime']); ?> </span>
                    </div>
                </div>

            </li>

            <?php endforeach; endif; else: echo "" ;endif; ?>





        </ul>
    </div>


</div>

<script>
    $(document).ready(function(){
        $("#myNav").affix({
            offset: {
                top: 125 ,

            }
        });
    });
</script>

</body>

</html>
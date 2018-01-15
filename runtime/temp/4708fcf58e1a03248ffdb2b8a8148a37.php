<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"D:\program\phpStudy\WWW\ll_newscms./application/index\view\member_apply.html";i:1515666775;s:73:"D:\program\phpStudy\WWW\ll_newscms\application\index\view\public_nav.html";i:1515648960;s:80:"D:\program\phpStudy\WWW\ll_newscms\application\index\view\public_memberleft.html";i:1515686841;}*/ ?>
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




        <div class="col-md-2 col-md-offset-2 col-sm-4   hidden-xs"  id="myScrollspy">
    <ul class="nav nav-tabs nav-stacked" id="myNav">
        <li <?php if($l == 1): ?> class="active" <?php endif; ?>  ><a href="<?php echo url('member/index'); ?>">个人资料</a></li>
        <li <?php if($l == 2): ?> class="active" <?php endif; ?>  ><a href="<?php echo url('member/apply'); ?>">小编申请</a></li>


        <?php if(in_array(($ll_type), explode(',',"1,2"))): ?>
        <li <?php if($l == 3): ?> class="active" <?php endif; ?>  ><a href="<?php echo url('member/addnews'); ?>">编写新闻</a></li>
        <li <?php if($l == 4): ?> class="active" <?php endif; ?>  ><a href="<?php echo url('member/newslist'); ?>">新闻管理</a></li>
        <?php endif; ?>

        <li <?php if($l == 5): ?> class="active" <?php endif; ?>  ><a href="<?php echo url('member/notice'); ?>">通知</a></li>

    </ul>
</div>


			<div class="newslist col-md-6   col-sm-8">
                <form action="<?php echo url('member/doapply'); ?>" method="post" id="form">

                <div class="form-group">
                         <label for="ll_uid">用户id</label>
                         <input type="text" class="form-control" id="ll_uid" name="ll_uid" value="<?php echo $umsg['ll_uid']; ?>" disabled="" >
                         <input type="hidden" name="ll_uid" value="<?php echo $umsg['ll_uid']; ?>"  >
                     </div>

                     <div class="form-group">
                         <label  >用户名</label>
                         <input type="text" class="form-control"     value="<?php echo $umsg['ll_username']; ?>"   >

                     </div>
                     <div class="form-group">
                         <label for="ll_type">身份</label>
                         <!--<input type="text" class="form-control" id="ll_typename" name="ll_typename" value="<?php echo $umsg['ll_typename']; ?>"  disabled>-->
                         <select class="form-control" id="ll_type" name="ll_type" >
                             <?php if(is_array($utlist) || $utlist instanceof \think\Collection || $utlist instanceof \think\Paginator): $i = 0; $__LIST__ = $utlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uv): $mod = ($i % 2 );++$i;?>
                             <option value="<?php echo $uv['ll_type']; ?>" <?php if($uv['ll_type'] == $umsg['ll_type']): ?> selected <?php endif; ?> ><?php echo $uv['ll_typename']; ?></option>
                             <?php endforeach; endif; else: echo "" ;endif; ?>
                         </select>


                     </div>

                    <div class="form-group">
                        <label for="ll_msg">留言</label>

                        <textarea name="ll_msg" id="ll_msg"></textarea>
                    </div>
 
           
             
            <button type="submit" class="btn btn-default" id="btn" >提交</button>
          </form> 
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
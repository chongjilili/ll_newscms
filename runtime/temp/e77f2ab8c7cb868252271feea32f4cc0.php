<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"D:\program\phpStudy\WWW\ll_newscms./application/index\view\member_notice.html";i:1515670410;s:73:"D:\program\phpStudy\WWW\ll_newscms\application\index\view\public_nav.html";i:1515648960;s:80:"D:\program\phpStudy\WWW\ll_newscms\application\index\view\public_memberleft.html";i:1515686841;}*/ ?>
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
				<div class="table-responsive">
					<table class="table table-hover">
						<thead >
							<td>id</td>
							<td>申请身份</td>
							<td>申请时间</td>
							<td>申请进度</td>
							<td>通过时间</td>
						</thead>

						<?php if(is_array($applylist) || $applylist instanceof \think\Collection || $applylist instanceof \think\Paginator): $i = 0; $__LIST__ = $applylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$al): $mod = ($i % 2 );++$i;?>
						  <tr>
							  <td><?php echo $al['ll_apid']; ?></td>
							  <td><?php echo $al['ll_typename']; ?></td>
							  <td><?php echo $al['ll_aptime']; ?></td>
							  <td>
								  <?php switch($al['ll_pass']): case "1": ?>通过<?php break; case "2": ?>审核中<?php break; case "3": ?>拒绝<?php break; default: ?>审核中
								  <?php endswitch; ?>
							  </td>
							  <td><?php echo $al['ll_ptime']; ?></td>
						  </tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>

					</table>
				</div>
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
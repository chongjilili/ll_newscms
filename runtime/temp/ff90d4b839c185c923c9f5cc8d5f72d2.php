<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"D:\program\phpStudy\WWW\ll_newscms./application/index\view\member_addnews.html";i:1515677601;s:73:"D:\program\phpStudy\WWW\ll_newscms\application\index\view\public_nav.html";i:1515648960;s:80:"D:\program\phpStudy\WWW\ll_newscms\application\index\view\public_memberleft.html";i:1515686841;}*/ ?>
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
    <script src="/ll_newscms/public/static/layui/layui.js"></script>
    <link rel="stylesheet" href="/ll_newscms/public/static/layui/css/layui.css">
    <script type="text/javascript" src="/ll_newscms/public/static/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/ll_newscms/public/static/ueditor/ueditor.all.js"></script>

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
				   <form action="<?php echo url('member/doadd'); ?>" method="post">
            <div class="form-group">
              <label for="ll_title">新闻题目</label>
              <input type="text" class="form-control" id="ll_title" name="ll_title" value="新闻题目"   >
              
            </div>
            <div class="form-group">
              <label for="ll_cid">新闻分类</label>
               <select class="form-control" name="ll_cid" id="ll_cid">

                   <?php if(is_array($catnottree) || $catnottree instanceof \think\Collection || $catnottree instanceof \think\Paginator): $i = 0; $__LIST__ = $catnottree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?>
                   <option value="<?php echo $cat['ll_cid']; ?>" ><?php $__FOR_START_2464__=1;$__FOR_END_2464__=$cat['floor'];for($i=$__FOR_START_2464__;$i < $__FOR_END_2464__;$i+=1){ ?>----<?php } ?><?php echo $cat['ll_catname']; ?></option>
                   <?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
            </div>



                       <div class="form-group">
                       <label class="radio-inline">
                           <input type="radio" name="ll_state" id="ll_state1" value="1"> 发布
                       </label>
                       <label class="radio-inline">
                           <input type="radio" name="ll_state" id="ll_state2" value="2" checked> 不发布
                       </label>
                       </div>


            <div class="layui-upload">
               <button type="button" class="layui-btn" id="upimgbtn">上传图片</button>
                  <div class="layui-upload-list">
                          <img class="layui-upload-img" id="upimg" src="">
                          <input type="hidden" name="ll_pics"   id="ll_pics">

                      <p id="demoText"></p>
                     </div>
            </div>

                       <div class="form-group">
              <label for="ll_content">新闻内容</label>
               <textarea name="ll_content" id="ll_content"></textarea>
                           <script type="text/javascript">
                               UEDITOR_CONFIG.UEDITOR_HOME_URL = '/ll_newscms/public/static/ueditor/'; //一定要用这句话，否则你需要去ueditor.config.js修改路径的配置信息
                               UE.getEditor('ll_content',{
                                   initialFrameWidth : '100%',
//                            initialFrameHeight: '90%'
                               });
                           </script>
            </div>


                       <input type="hidden" name="ll_uid"   id="ll_uid" value="<?php echo \think\Session::get('ll_suid'); ?>">

                       <button type="submit" class="btn btn-default">提交</button>
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
<script>
    layui.use('upload', function(){
        var $ = layui.jquery
                ,upload = layui.upload;

        //普通图片上传
        var uploadInst = upload.render({
            elem: '#upimgbtn'
            ,url: "<?php echo url('member/upload'); ?>"
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#upimg').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                //如果上传失败
                console.log(res);
                if(res.code > 0){
                    return layer.msg('上传失败');
                }else {
                    $('#ll_pics').val(res.data.src);
                }
                //上传成功
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });






    });
</script>
</body>
 
</html>
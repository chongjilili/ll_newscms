<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"D:\program\phpStudy\WWW\ll_newscms./application/index\view\news_detail.html";i:1515937824;s:73:"D:\program\phpStudy\WWW\ll_newscms\application\index\view\public_nav.html";i:1515648960;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>llnews-首页</title>
    <link rel="stylesheet" type="text/css" href="/ll_newscms/public/static/layui/css/layui.css">

    <link rel="stylesheet" type="text/css" href="/ll_newscms/public/static/bootstrap/css/bootstrap.css">
    <script src="/ll_newscms/public/static/jquery-2.js" type="text/javascript" charset="utf-8"  ></script>
    <script src="/ll_newscms/public/static/layui/layui.js" type="text/javascript" charset="utf-8"  ></script>

    <script src="/ll_newscms/public/static/bootstrap/js/bootstrap.js" type="text/javascript" charset="utf-8"  ></script>
	<link rel="stylesheet" href="/ll_newscms/public/index/css/comment.css">
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






	<div class="wrap row ">


        <div class="col-md-2 col-md-offset-2 col-sm-4   hidden-xs"  id="myScrollspy">
            <ul class="nav nav-tabs nav-stacked" id="myNav">


                <li <?php if($ll_cid == 1): ?> class="active" <?php endif; ?>><a href="<?php echo url('index/index',['ll_cid'=>1 ]); ?>">所有 </a></li>

                <?php if(is_array($catnt) || $catnt instanceof \think\Collection || $catnt instanceof \think\Paginator): $i = 0; $__LIST__ = $catnt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
                <li <?php if($c['ll_cid'] == $ll_cid): ?> class="active" <?php endif; ?>><a href="<?php echo url('index/index',['ll_cid'=>$c['ll_cid']]); ?>"><?php echo $c['ll_catname']; ?> </a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>




            </ul>
        </div>
			



			<div class=" col-md-6 col-sm-8">
				  
				  <div class="newscontent">
				  		<h1><?php echo $newsdetail['ll_title']; ?></h1>

                      <p style="margin: 10px 0 ;"><span>发布人：<?php echo $newsdetail['ll_username']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                          <span>发布时间：<?php echo date("Y-m-d",$newsdetail['ll_time']); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                          <span>浏览数：<?php echo $newsdetail['ll_rnum']; ?></span>
                      </p>

                      <div class="cont">


                          <?php echo $newsdetail['ll_content']; ?>
                      </div>


				  </div>

				 <div class="commentAll">
					    <!--评论区域 begin-->
					    <div class="reviewArea clearfix">
					        <textarea class="content comment-input" placeholder="请输入你的评论&hellip;" onkeyup="keyUP(this)"></textarea>

                            <?php if(session('slogin')): if($dz != 1): ?>
                            <a href="javascript:;" type="button" style="margin-right: 2px; margin-top: 20px;" class="btn btn-default dz">点赞</a>

                            <?php else: ?>
                            <a href="javascript:;" type="button" style="margin-right: 2px; margin-top: 20px;" class="btn btn-danger dz">已点赞</a>

                            <?php endif; endif; ?>


                            <a href="javascript:;" class="plBtn">评论</a>
					    </div>
					    <!--评论区域 end-->
					    <!--回复区域 begin-->
					    <div class="comment-show">



                            <?php if(is_array($comments) || $comments instanceof \think\Collection || $comments instanceof \think\Paginator): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cm): $mod = ($i % 2 );++$i;?>
                            <div class="comment-show-con clearfix">
					            <div class="comment-show-con-img pull-left"><img src="/ll_newscms/public/index/img/header-img-comment_03.png" alt=""></div>
					            <div class="comment-show-con-list pull-left clearfix">
					                <div class="pl-text clearfix">
					                    <a href="#" class="comment-size-name"><?php echo $cm['ll_username']; ?> : </a>
					                    <span class="my-pl-con">&nbsp;<?php echo $cm['ll_comments']; ?></span>
					                </div>
					                <div class="date-dz">
					                    <span class="date-dz-left pull-left comment-time"><?php echo date("Y-m-d H:i:s",$cm['ll_cmtime']); ?></span>
					                    <div class="date-dz-right pull-right comment-pl-block">
					                        <!--<a href="javascript:;" class="removeBlock">删除</a>-->
					                        <!--<a href="javascript:;" class="date-dz-pl pl-hf hf-con-block pull-left">回复</a>-->
                                            <a nhref="<?php echo url('comment/delete',['ll_cmtid'=>$cm['ll_cmtid']]); ?>" onclick="cmdel(this); " class="pull-left date-dz-line">删除</a>

                                            <!--<span class="pull-left date-dz-line">|</span>-->
					                        <!--<a href="javascript:;" class="date-dz-z pull-left"><i class="date-dz-z-click-red"></i>赞 (<i class="z-num">666</i>)</a>-->
					                    </div>
					                </div>
					                <div class="hf-list-con"></div>
					            </div>
					        </div>

                            <?php endforeach; endif; else: echo "" ;endif; ?>




					    </div>
					    <!--回复区域 end-->
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
<script>
    $('.dz').click(function (e) {
        e.preventDefault();
        $.ajax({
            url:"<?php echo url('member/getgood'); ?>",
            type:"post",
            data:{
              'll_aid':'<?php echo $ll_aid; ?>'  ,
               'll_uid':'<?php echo \think\Session::get('ll_suid'); ?>'
            },
            success:function (res) {
                if (res.code == 1){
                    if(res.msg == '点赞成功'){
                        $('.dz').text('已点赞');
                        $('.dz').removeClass('btn-default').addClass('btn-danger');

                    }else {
                        $('.dz').text('点赞');
                        $('.dz').removeClass('btn-danger').addClass('btn-default');
                    }
                }else {
                    layui.use('layer', function(){
                        var layer = layui.layer;

                        layer.msg('点赞失败');
                    });
                }

            }
        })

    })
</script>
<script type="text/javascript" src="/ll_newscms/public/index/js/jquery.flexText.js"></script>
<!--textarea高度自适应-->
<script type="text/javascript">
    $(function () {
        $('.content').flexText();
    });
</script>
<!--textarea限制字数-->
<script type="text/javascript">
    function keyUP(t){
        var len = $(t).val().length;
        if(len > 139){
            $(t).val($(t).val().substring(0,140));
        }
    }
</script>
<!--点击评论创建评论条-->
<script type="text/javascript">
    $('.commentAll').on('click','.plBtn',function(){

        $.ajax({
            url:"<?php echo url('login/islogin'); ?>",
            success:function (res) {
                if(res == 0 ){
                    location.href = "<?php echo url('login/login'); ?>";
                }
            }
        })


        var self = $(this);
        var myDate = new Date();
        //获取当前年
        var year=myDate.getFullYear();
        //获取当前月
        var month=myDate.getMonth()+1;
        //获取当前日
        var date=myDate.getDate();
        var h=myDate.getHours();       //获取当前小时数(0-23)
        var m=myDate.getMinutes();     //获取当前分钟数(0-59)
        if(m<10) m = '0' + m;
        var s=myDate.getSeconds();
        if(s<10) s = '0' + s;
        var now=year+'-'+month+"-"+date+" "+h+':'+m+":"+s;
        //获取输入内容
        var oSize = $(this).siblings('.flex-text-wrap').find('.comment-input').val();
        var username = '<?php echo \think\Session::get('ll_susername'); ?>';
        var uid = '<?php echo \think\Session::get('ll_suid'); ?>';
        var aid = '<?php echo $ll_aid; ?>';
        console.log(oSize);
        //动态创建评论模块
        oHtml = '<div class="comment-show-con clearfix">' +
                '<div class="comment-show-con-img pull-left">' +
                '<img src="/ll_newscms/public/index/img/header-img-comment_03.png" alt="">' +
                '</div> <div class="comment-show-con-list pull-left clearfix">' +
                '<div class="pl-text clearfix"> ' +
                '<a href="#" class="comment-size-name">' +
                ''+username+' : ' +
                '</a> <span class="my-pl-con">&nbsp;'+ oSize +'</span> </div> ' +
                '<div class="date-dz"> <span class="date-dz-left pull-left comment-time">'+now+'</span> ' +
                '<div class="date-dz-right pull-right comment-pl-block">' +
                '<a class="pull-left date-dz-line cmdel" nhref="<?php echo url('comment/delete'); ?>" onclick="cmdel(this); " >删除</a>' +
                /*'<a href="javascript:;" class="removeBlock">删除</a>' +*/
                /*' <a href="javascript:;" class="date-dz-pl pl-hf hf-con-block pull-left">回复</a> ' +*/
                /*'<span class="pull-left date-dz-line">|</span> ' +*/
                /*'<a href="javascript:;" class="date-dz-z pull-left"><i class="date-dz-z-click-red"></i>赞 ' +
                '(<i class="z-num">666</i>)</a> ' +*/
                '</div> ' +
                '</div><div class="hf-list-con"></div></div> </div>';
        if(oSize.replace(/(^\s*)|(\s*$)/g, "") != ''){
            $.ajax({
                url:"<?php echo url('comment/doadd'); ?>",
                data:{
                    ll_uid:uid,
                    ll_comments:oSize,
                    ll_aid:aid
                } ,
                success:function (data) {
                    console.log(data);
                    if(data>0){
                        self.parents('.reviewArea ').siblings('.comment-show').prepend(oHtml);
                        self.siblings('.flex-text-wrap').find('.comment-input').prop('value','').siblings('pre').find('span').text('');

                        var href = self.parents('.reviewArea ').siblings('.comment-show').find('.comment-show-con').eq(0).find('a.date-dz-line').attr('nhref');
//                        console.log(href);

                        href += ('?ll_cmtid='+data);
                        console.log(href);

                        self.parents('.reviewArea ').siblings('.comment-show').find('.comment-show-con').eq(0).find('a.date-dz-line').attr('nhref',href);
                    }else {
                        layui.use('layer', function(){
                            var layer = layui.layer;

                            layer.msg('恢复失败');
                        });

                    }
                }
            });


        }






    });


    function cmdel(t){
//        alert();
//        e.preventDefault();
                if (confirm("你真的要删除吗")){
                    //do something
                    var href = $(t).attr('nhref');
                    console.log(href);
                    $.ajax({
                        url:href,
                        success:function (res) {
                            console.log(res);
                            if (res.code == 1){
                                $(t).parents('.comment-show-con').hide("slow",function () {
                                    $(t).parents('.comment-show-con').remove();

                                });

                            }
                        }
                    })
                }

//                layer.close(index);

    }


</script>

<!--删除评论块-->
<script type="text/javascript">
    $('.commentAll').on('click','.removeBlock',function(){
        var oT = $(this).parents('.date-dz-right').parents('.date-dz').parents('.all-pl-con');
        if(oT.siblings('.all-pl-con').length >= 1){
            oT.remove();
        }else {
            $(this).parents('.date-dz-right').parents('.date-dz').parents('.all-pl-con').parents('.hf-list-con').css('display','none')
            oT.remove();
        }
        $(this).parents('.date-dz-right').parents('.date-dz').parents('.comment-show-con-list').parents('.comment-show-con').remove();

    })
</script>
<!--点赞-->
<script type="text/javascript">
    $('.comment-show').on('click','.date-dz-z',function(){
        var zNum = $(this).find('.z-num').html();
        if($(this).is('.date-dz-z-click')){
            zNum--;
            $(this).removeClass('date-dz-z-click red');
            $(this).find('.z-num').html(zNum);
            $(this).find('.date-dz-z-click-red').removeClass('red');
        }else {
            zNum++;
            $(this).addClass('date-dz-z-click');
            $(this).find('.z-num').html(zNum);
            $(this).find('.date-dz-z-click-red').addClass('red');
        }
    })
</script>
</body>
 
</html>
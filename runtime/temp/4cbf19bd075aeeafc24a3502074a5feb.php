<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\program\phpStudy\WWW\ll_newscms./application/admin\view\login_login.html";i:1515861488;}*/ ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="/ll_newscms/public/admin/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/ll_newscms/public/admin/css/demo.css" />
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="/ll_newscms/public/admin/css/component.css" />
    <!--[if IE]>
    <script src="/ll_newscms/public/admin/js/html5.js"></script>
    <![endif]-->
    <script src="/ll_newscms/public/static/jquery-2.js"></script>
    <link rel="stylesheet" href="/ll_newscms/public/static/layui/css/layui.css">
    <script src="/ll_newscms/public/static/layui/layui.js"></script>

</head>
<body>
<div class="container demo-1">
    <div class="content">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <div class="logo_box">
                <h3>欢迎你</h3>
                <form   method="post" id="loginform">
                    <div class="input_outer">
                        <span class="u_user"></span>
                        <input name="ll_username" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户">
                    </div>
                    <div class="input_outer">
                        <span class="us_uer"></span>
                        <input name="ll_password" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
                    </div>
                    <div class="mb2"><a class="act-but submit" id="subbtn" type="submit"  style="color: #FFFFFF">登录</a></div>
                </form>
            </div>
        </div>
    </div>
</div><!-- /container -->
<script src="/ll_newscms/public/admin/js/TweenLite.min.js"></script>
<script src="/ll_newscms/public/admin/js/EasePack.min.js"></script>
<script src="/ll_newscms/public/admin/js/rAF.js"></script>
<script src="/ll_newscms/public/admin/js/demo-1.js"></script>
<script type="application/javascript">
    $('#subbtn').click(function (e) {
        e.preventDefault();

        $.ajax({
            url:"<?php echo url('login/check'); ?>",
            data:$('#loginform').serialize(),
            type:'post',
            success:function (data) {
                console.log(data);
                if (data.code !=0 ){
                    location.href="<?php echo url('index/index'); ?>";
                }else {
                    layui.use('layer', function(){
                        var layer = layui.layer;

                        layer.msg(data.msg);
                    });
                }
            }

        })
    });

</script>


</body>
</html>
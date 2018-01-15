<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\program\phpStudy\WWW\ll_newscms./application/index\view\login_login.html";i:1515649708;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>用户登录</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="stylesheet" type="text/css" href="/ll_newscms/public/static/bootstrap/css/bootstrap.css">
        <script src="/ll_newscms/public/static/jquery-2.js" type="text/javascript" charset="utf-8"  ></script>

        <script src="/ll_newscms/public/static/bootstrap/js/bootstrap.js" type="text/javascript" charset="utf-8"  ></script>
        <link rel="stylesheet" href="/ll_newscms/public/index/css/login.css" />
        
    </head>
    <body>
        <form action="<?php echo url('login/check'); ?>" method="post" id="logform">
            <div class="mycenter">
            <div class="mysign">
                <div class="col-lg-11 text-center text-info">
                    <h2>请登录</h2>
                </div>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="ll_username" placeholder="请输入账户名" required autofocus/>
                </div>
                <div class="col-lg-10"></div>
                <div class="col-lg-10">
                    <input type="password" class="form-control" name="ll_password" placeholder="请输入密码" required autofocus/>
                </div>
                <div class="col-lg-10"></div>
                <div class="col-lg-10 mycheckbox checkbox">
                    还没注册？<a href="<?php echo url('login/register'); ?>" title="">极速注册</a>
                    <a href="<?php echo url('index/index'); ?>" title="">返回主页</a>

                </div>
                <div class="col-lg-10"></div>
                <div class="col-lg-10">
                    <button type="button" id="logbtn" class="btn btn-success col-lg-12 col-sm-12 col-xs-12 col-md-12">登录</button>
                </div>
            </div>
        </div>
        </form>
    </body>

    <script>
        $(function () {
            $('#logbtn').click(function (e) {
                e.preventDefault();
                $.ajax({
                    url:"<?php echo url('login/check'); ?>",
                    data:$('#logform').serialize(),
                    success:function (res) {
                        if (res.code == 1 ){
                            location.href = "<?php echo url('member/index'); ?>";

                        }else{
                            alert(res.msg);
                        }
                    }

                })

            })
        })


    </script>
</html>
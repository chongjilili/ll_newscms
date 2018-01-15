<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\program\phpStudy\WWW\ll_newscms./application/index\view\login_register.html";i:1515649708;}*/ ?>
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
        <form action="<?php echo url('login/doregist'); ?>" method="post" id="doregist">
            <div class="mycenter">
            <div class="mysign">
                <div class="col-lg-11 text-center text-info">
                    <h2>注册中心</h2>
                </div>
                <div class="col-lg-10">
                     
                    <input type="text" class="form-control" name="ll_username" placeholder="请输入账户名" required autofocus/>
                </div>
                <div class="col-lg-10"></div>
                <div class="col-lg-10">
                    <input type="password" class="form-control" name="ll_password" placeholder="请输入密码" required autofocus/>
                </div>
                <div class="col-lg-10">
                    <input type="password" class="form-control" name="qpassword" placeholder="确认密码" required autofocus/>
                </div>
                <div class="col-lg-10"></div>
               
                <div class="col-lg-10"></div>
                <div class="col-lg-10">
                    <button type="button" class="btn btn-success col-lg-12 col-sm-12 col-xs-12 col-md-12" id="regbtn">确定</button>
                </div>
            </div>
        </div>
        </form>
    </body>


    <script>
        $(function () {
            $('#regbtn').click(function (e) {
                e.preventDefault();
                $.ajax({
                    url:"<?php echo url('login/doregist'); ?>",
                    data:$('#doregist').serialize(),
                    success:function (res) {
                        console.log(res);
                        if (res.code == 1 ){
                            location.href = "<?php echo url('member/index'); ?>";

                        }else{
                            alert(res.msg);
                        }
//                        location.href = "<?php echo url('member/index'); ?>"
                    }

                })

            })
        })


    </script>
</html>
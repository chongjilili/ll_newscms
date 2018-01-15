<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"D:\program\phpStudy\WWW\ll_newscms./application/admin\view\admin_index.html";i:1515422004;s:76:"D:\program\phpStudy\WWW\ll_newscms\application\admin\view\public_header.html";i:1515765715;s:74:"D:\program\phpStudy\WWW\ll_newscms\application\admin\view\public_left.html";i:1515861555;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>ll_newscms</title>

    <script src="/ll_newscms/public/static/jquery-2.js"></script>
    <script src="/ll_newscms/public/static/layui/layui.js"></script>
    <link rel="stylesheet" href="/ll_newscms/public/static/layui/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">

    <div class="layui-header">
    <div class="layui-logo">  ll_newscms新闻系统</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <!-- <ul class="layui-nav layui-layout-left">
         <li class="layui-nav-item"><a href="">控制台</a></li>
         <li class="layui-nav-item"><a href="">商品管理</a></li>
         <li class="layui-nav-item"><a href="">用户</a></li>
         <li class="layui-nav-item">
             <a href="javascript:;">其它系统</a>
             <dl class="layui-nav-child">
                 <dd><a href="">邮件管理</a></dd>
                 <dd><a href="">消息管理</a></dd>
                 <dd><a href="">授权管理</a></dd>
             </dl>
         </li>
     </ul>-->
    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item"><a href="<?php echo url('index/index'); ?>"  >后台首页</a></li>
        <li class="layui-nav-item"><a href="/ll_newscms" target="_blank" >网站首页</a></li>

        <li class="layui-nav-item">
            <a href="javascript:;">
                <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                <?php echo \think\Session::get('ll_username'); ?>
            </a>
            <dl class="layui-nav-child">
                <dd><a href="">基本资料</a></dd>
                <dd><a href="">安全设置</a></dd>
            </dl>
        </li>

        <li class="layui-nav-item"><a href="#" id="logout">退了</a></li>
    </ul>
</div>
    <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree"  lay-filter="test">
            <li class="layui-nav-item layui-nav-itemed">
                <a class="" href="javascript:;">新闻管理</a>
                <dl class="layui-nav-child">
                    <dd <?php if($t == 1): ?> class="layui-this" <?php endif; ?>><a href="<?php echo url('news/index'); ?>">新闻列表</a></dd>

                    <dd <?php if($t == 2): ?> class="layui-this" <?php endif; ?>><a  href="<?php echo url('category/index'); ?>">新闻类型</a></dd>
                    <dd <?php if($t == 3): ?> class="layui-this" <?php endif; ?>><a href="<?php echo url('news/addnews'); ?>">增加新闻</a></dd>


                </dl>
            </li>
            <li class="layui-nav-item layui-nav-itemed">
                <a class="" href="javascript:;">用户管理</a>
                <dl class="layui-nav-child">
                    <dd <?php if($t == 4): ?> class="layui-this" <?php endif; ?>><a href="<?php echo url('Admin/index'); ?>">用户列表</a></dd>
                    <dd <?php if($t == 7): ?> class="layui-this" <?php endif; ?>><a href="<?php echo url('apply/index'); ?>">申请列表</a></dd>



                </dl>
            </li>
            <li class="layui-nav-item layui-nav-itemed">
                <a class="" href="javascript:;">评论与收藏</a>
                <dl class="layui-nav-child">
                    <dd <?php if($t == 5): ?> class="layui-this" <?php endif; ?>><a href="<?php echo url('comment/index'); ?>">评论列表</a></dd>
                    <dd <?php if($t == 6): ?> class="layui-this" <?php endif; ?>><a href="<?php echo url('collection/index'); ?>">收藏记录</a></dd>

                </dl>
            </li>

            <!-- <li class="layui-nav-item"><a href="">云市场</a></li>
             <li class="layui-nav-item"><a href="">发布商品</a></li>-->
        </ul>
    </div>
</div>
    <style>
        .layui-table-cell{
            height: 33px;
        }
    </style>



    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <table class="layui-hide" id="newlist" ></table>

            <fieldset class="layui-elem-field layui-field-title"  style="margin-top: 50px;">
                <legend>用户列表</legend>
            </fieldset>
            <a class="layui-btn layui-btn-warm" href="<?php echo url('Admin/add'); ?>">新增用户</a>
            <table class="layui-table" lay-skin="line" lay-size="lg">
                <colgroup>

                    <col width="10%">
                    <col width="40%">
                    <col>
                </colgroup>
                <thead>


                <tr>

                    <th>uid</th>
                    <th>用户名称</th>
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>


                <?php if(is_array($users) || $users instanceof \think\Collection || $users instanceof \think\Paginator): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?>
                <tr>

                    <td><?php echo $u['ll_uid']; ?></td>
                    <td><?php echo $u['ll_username']; ?></td>
                    <td>
                        <a class="layui-btn layui-btn-normal" href="<?php echo url('Admin/detail',['ll_uid' => $u['ll_uid'] ]); ?>">编辑</a>
                        <a class="layui-btn layui-btn-danger delbtn" onclick="return confirm('你当真要删除这个分类？')" href="<?php echo url('Admin/delete',['ll_uid' => $u['ll_uid'] ]); ?>" >删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>


                </tbody>
            </table>


        </div>
    </div>


</div>

<script>

    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
    $('#logout').click(function (e) {
        e.preventDefault();
        layui.use('layer', function(){
            var layer = layui.layer;

            layer.confirm('你真的要退出吗？',['yes','no'],function () {
                location.href="<?php echo url('login/logout'); ?>";
            },function () {
                
            })
        });
    })





</script>

</body>
</html>
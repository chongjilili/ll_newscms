<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"D:\program\phpStudy\WWW\ll_newscms./application/admin\view\news_index.html";i:1515478344;s:76:"D:\program\phpStudy\WWW\ll_newscms\application\admin\view\public_header.html";i:1515765715;s:74:"D:\program\phpStudy\WWW\ll_newscms\application\admin\view\public_left.html";i:1515657748;}*/ ?>
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
                    <dd <?php if($t == 6): ?> class="layui-this" <?php endif; ?>><a href="<?php echo url('apply/index'); ?>">申请列表</a></dd>



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
            <fieldset class="layui-elem-field layui-field-title"  style="margin-top: 50px;">
                <legend>新闻列表</legend>
            </fieldset>
            <table class="layui-hide" id="newlist"></table>



            <script>
                layui.use('table', function(){
                    var table = layui.table;

                    table.render({
                        elem: '#newlist'

                        ,url: "<?php echo url('news/newlistjson'); ?>"
                        ,cols: [[
                            {type:'checkbox',width:'2%'}
                            ,{field:'ll_aid', width:'10%', title: 'ID', sort: true}
                            ,{field:'ll_title', width:'20%', title: '标题'}
                            ,{field:'ll_time', width:'15%', title: '发布时间',sort: true}
                            ,{field:'ll_catname', width:'10%', title: '文章类型'}
                            ,{field:'ll_rnum', width: '10%', title: '浏览数' }
                            ,{field:'ll_username', width:'10%', title: '发布人'}
                            ,{field:'operation', width:'22%', title: '操作',templet: '#operation'}
                        ]]
                        ,page: true
                    });
                });
            </script>
            <script type="text/html" id="operation">
                <a class="layui-btn layui-btn-normal" href="<?php echo url('news/detail' ); ?>?ll_aid={{d.ll_aid}} " >详细</a>
                <a class="layui-btn layui-btn-danger delbtn"  onclick=" return confirm('你真的要删除这个新闻吗')" href="<?php echo url('news/delete' ); ?>?ll_aid={{d.ll_aid}} " >删除</a>
            </script>
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
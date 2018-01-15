<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"D:\program\phpStudy\WWW\ll_newscms./application/admin\view\category_index.html";i:1515414332;s:76:"D:\program\phpStudy\WWW\ll_newscms\application\admin\view\public_header.html";i:1515765715;s:74:"D:\program\phpStudy\WWW\ll_newscms\application\admin\view\public_left.html";i:1515657748;}*/ ?>
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
            <table class="layui-hide" id="newlist" ></table>

            <fieldset class="layui-elem-field layui-field-title"  style="margin-top: 50px;">
                <legend>新闻类型</legend>
            </fieldset>
            <a class="layui-btn layui-btn-warm" href="<?php echo url('category/add'); ?>">新增分类</a>
            <table class="layui-table" lay-skin="line" lay-size="lg">
                <colgroup>
                    <col width="100">
                    <col width="10%">
                    <col width="40%">
                    <col>
                </colgroup>
                <thead>


                <tr>
                    <th>缩进</th>
                    <th>cid</th>
                    <th>新闻分类名称</th>
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>


                <?php if(is_array($catnottree) || $catnottree instanceof \think\Collection || $catnottree instanceof \think\Paginator): $i = 0; $__LIST__ = $catnottree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td>-</td>
                    <td><?php echo $cat['ll_cid']; ?></td>
                    <td><?php $__FOR_START_30893__=1;$__FOR_END_30893__=$cat['floor'];for($i=$__FOR_START_30893__;$i < $__FOR_END_30893__;$i+=1){ ?>  ————  <?php } ?> <?php echo $cat['ll_catname']; ?></td>
                    <td>
                        <a class="layui-btn layui-btn-normal" href="<?php echo url('category/detail',['ll_cid' => $cat['ll_cid'] ]); ?>">编辑</a>
                        <a class="layui-btn layui-btn-danger delbtn" onclick="confirm('你当真要删除这个分类？')" href="<?php echo url('category/delete',['ll_cid' => $cat['ll_cid'] ]); ?>" >删除</a></td>
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
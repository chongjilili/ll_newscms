<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"D:\program\phpStudy\WWW\ll_newscms./application/admin\view\news_detail.html";i:1515681251;s:76:"D:\program\phpStudy\WWW\ll_newscms\application\admin\view\public_header.html";i:1515333936;s:74:"D:\program\phpStudy\WWW\ll_newscms\application\admin\view\public_left.html";i:1515657748;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>ll_newscms</title>

    <script src="/ll_newscms/public/static/jquery-2.js"></script>
    <script src="/ll_newscms/public/static/layui/layui.js"></script>
    <link rel="stylesheet" href="/ll_newscms/public/static/layui/css/layui.css">
    <script type="text/javascript" src="/ll_newscms/public/static/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/ll_newscms/public/static/ueditor/ueditor.all.js"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">

    <div class="layui-header">
    <div class="layui-logo">ll_newscms新闻系统</div>
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
                <legend>编辑新闻</legend>
            </fieldset>
            <form class="layui-form layui-form-pane" action="<?php echo url('news/modify'); ?>" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label">新闻标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="ll_title" value="<?php echo $nd['ll_title']; ?>"   placeholder="请输入标题" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">新闻编号</label>
                    <div class="layui-input-inline">
                        <input type="text" name="ll_aid" value="<?php echo $nd['ll_aid']; ?>" disabled class="layui-input">
                        <input type="hidden" name="ll_aid" value="<?php echo $nd['ll_aid']; ?>"  class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">发布日期</label>
                        <div class="layui-input-block">
                            <input type="text" name="ll_time" value="<?php echo date('Y-m-d H:i:s',$nd['ll_time']); ?>" id="date1" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                </div>
                <div class="layui-form-item">


                    <div class="layui-inline">
                        <label class="layui-form-label">新闻类型</label>
                        <div class="layui-input-inline">
                            <!--<input type="text" name="ll_cid"  value="<?php echo $nd['ll_cid']; ?>" class="layui-input">-->
                            <select name="ll_cid"  >
                                <option value=""></option>
                                <?php if(is_array($catnottree) || $catnottree instanceof \think\Collection || $catnottree instanceof \think\Paginator): $i = 0; $__LIST__ = $catnottree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $cat['ll_cid']; ?>" <?php if($cat['ll_cid'] == $nd['ll_cid']): ?> selected  <?php endif; ?> ><?php $__FOR_START_900__=1;$__FOR_END_900__=$cat['floor'];for($i=$__FOR_START_900__;$i < $__FOR_END_900__;$i+=1){ ?>----<?php } ?><?php echo $cat['ll_catname']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="layui-form-item">

                    <div class="layui-inline">
                        <label class="layui-form-label">发布人</label>
                        <div class="layui-input-inline">
                            <input type="text" name="ll_username" disabled value="<?php echo $nd['ll_username']; ?>"  class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">发布人id</label>
                        <div class="layui-input-inline">
                            <input type="text" name="ll_uid"  value="<?php echo $nd['ll_uid']; ?>" class="layui-input">
                        </div>
                    </div>
                </div>

                <div class="layui-form-item">

                    <div class="layui-inline">
                        <label class="layui-form-label">浏览数</label>
                        <div class="layui-input-inline">
                            <input type="text" name="ll_rnum"  value="<?php echo $nd['ll_rnum']; ?>" class="layui-input">
                        </div>
                    </div>

                </div>






                <div class="layui-form-item" pane="">
                    <label class="layui-form-label">是否发布</label>
                    <div class="layui-input-block">
                        <input type="checkbox" <?php if($nd['ll_state'] == 1): ?>  checked <?php endif; ?> name="ll_state" lay-skin="switch" lay-filter="switchTest" title="是否发布">

                    </div>
                </div>



                <div class="layui-upload">
                    <button type="button" class="layui-btn" id="upimgbtn">上传图片</button>
                    <div class="layui-upload-list">
                        <img class="layui-upload-img" id="upimg"  src="/ll_newscms/public/uploads/<?php echo $nd['ll_pics']; ?>">
                        <input type="hidden" name="ll_pics" value="<?php echo $nd['ll_pics']; ?>" id="ll_pics">
                        <p id="demoText"></p>
                    </div>
                </div>

                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">发布内容</label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" style="height: 300px" class="layui-textarea" name="ll_content" id="ll_content"><?php echo $nd['ll_content']; ?></textarea>
                        <script type="text/javascript">
                            UEDITOR_CONFIG.UEDITOR_HOME_URL = '/ll_newscms/public/static/ueditor/'; //一定要用这句话，否则你需要去ueditor.config.js修改路径的配置信息
                            UE.getEditor('ll_content',{
                                initialFrameWidth : '98%',
//                            initialFrameHeight: '90%'
                            });
                        </script>
                    </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <button class="layui-btn" lay-submit="" lay-filter="demo2">提交</button>
                </div>
            </form>


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
<script>
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
                ,layer = layui.layer
                ,layedit = layui.layedit
                ,laydate = layui.laydate;

        //日期
        laydate.render({
            elem: '#date'
            ,type: 'datetime'
        });
        laydate.render({
            elem: '#date1'
            ,type: 'datetime'
        });




        //监听指定开关
        form.on('switch(switchTest)', function(data){
            layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                offset: '6px'
            });

        });

        //监听提交
        form.on('submit(demo1)', function(data){
            layer.alert(JSON.stringify(data.field), {
                title: '最终的提交信息'
            })
            return false;
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
            ,url: "<?php echo url('upload/index'); ?>"
            ,data:{
                'll_aid':'<?php echo $nd['ll_aid']; ?>'
            }
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#upimg').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                //如果上传失败
//                res = eval("("+res+")");
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
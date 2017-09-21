@extends('admin.common')
@section('title')添加管理员@endsection
@section('content')
    <article class="page-container">
        <form class="form form-horizontal" id="form-admin-add" action="{{url('admin/admin')}}" method="post" enctype="multipart/form-data">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="adminName" name="username">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>昵称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="adminName" name="nickname">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="password2">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>头像：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="file"  name="avatar">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        <input name="sex" type="radio" value="2" id="sex-1" checked>
                        <label for="sex-1">男</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" value="1" id="sex-2" name="sex">
                        <label for="sex-2">女</label>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="phone" name="phone">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" placeholder="@" name="email" id="email">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">角色：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="adminRole" size="1">
			@foreach($roleList as $item)
                    <option value="{{$item->id}}">{{$item->role_name}}</option>
                @endforeach
			</select>
			</span> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">备注：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <textarea name="note" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="textarealength(this,100)"></textarea>
                    <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否启用：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        <input name="disabled_at" type="radio" value="1" id="status-1" checked>
                        <label for="status-1">启用</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" value="2" id="status-2" name="disabled_at">
                        <label for="status-2">禁用</label>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                </div>
            </div>
        </form>
    </article>
@endsection
@section('footer-script')
    <script type="text/javascript" src="{{asset('back')}}/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{asset('back')}}/lib/jquery.validation/1.14.0/validate-methods.js"></script>
    <script type="text/javascript" src="{{asset('back')}}/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
    <script type="text/javascript" src="{{asset('back')}}/lib/jquery.form.js"></script>
    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript">
        $(function(){
            $('.skin-minimal input').iCheck({
                checkboxClass: 'icheckbox-blue',
                radioClass: 'iradio-blue',
                increaseArea: '20%'
            });
            $("#form-admin-add").validate({
                rules:{
                    adminName:{
                        required:true,
                        minlength:4,
                        maxlength:16
                    },
                    password:{
                        required:true,
                    },
                    password2:{
                        required:true,
                        equalTo: "#password"
                    },
                    sex:{
                        required:true,
                    },
                    phone:{
                        required:true,
                        isPhone:true,
                    },
                    email:{
                        required:true,
                        email:true,
                    },
                    adminRole:{
                        required:true,
                    },
                },
                onkeyup:false,
                focusCleanup:true,
                success:"valid",
                submitHandler:function(form){ // 验证通过以后，就会执行这里的代码
                    $(form).ajaxSubmit(function(msg){ // ajaxSubmit 其实是ajaxform表单插件的一个方法
                        if( msg.status == 'fail' ){  // 失败
                            layer.alert(msg.error, {
                                icon: 5,
                                skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                            });
                        }else{ // 成功
                            // layer.alert('提示信息',{ icon:1,time:3000},function(){});
                            layer.msg('添加成功！', {
                                icon: 1,
                                skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                            },function(){
                                parent.location.reload(); // 让父级窗口刷新
                                // 关闭当前的layer插件的窗口
                                var index = parent.layer.getFrameIndex( window.name );
                                parent.layer.close(index);
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
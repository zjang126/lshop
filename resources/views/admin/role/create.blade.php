@extends('admin.common')
@section('title')添加角色@endsection
@section('content')
    <article class="page-container">
        <form action="{{ url('admin/role') }}" method="post" class="form form-horizontal" id="form-admin-role-add">
            {{ csrf_field() }}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" id="roleName" name="role_name" datatype="*4-16" nullmsg="用户账户不能为空">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">备注：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" name="note">
                </div>
            </div>
            {{-- 		<div class="row cl">
                        <label class="form-label col-xs-4 col-sm-3">网站角色：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <dl class="permission-list">
                                <dt>
                                    <label>
                                        <input type="checkbox" value="" name="user-Character-0" id="user-Character-0">
                                        资讯管理</label>
                                </dt>
                                <dd>
                                    <dl class="cl permission-list2">
                                        <dt>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-0-0" id="user-Character-0-0">
                                                栏目管理</label>
                                        </dt>
                                        <dd>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-0">
                                                添加</label>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-1">
                                                修改</label>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-2">
                                                删除</label>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-3">
                                                查看</label>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-4">
                                                审核</label>
                                            <label class="c-orange"><input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-5"> 只能操作自己发布的</label>
                                        </dd>
                                    </dl>
                                    <dl class="cl permission-list2">
                                        <dt>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-0-1" id="user-Character-0-1">
                                                文章管理</label>
                                        </dt>
                                        <dd>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-0-1-0" id="user-Character-0-1-0">
                                                添加</label>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-0-1-0" id="user-Character-0-1-1">
                                                修改</label>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-0-1-0" id="user-Character-0-1-2">
                                                删除</label>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-0-1-0" id="user-Character-0-1-3">
                                                查看</label>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-0-1-0" id="user-Character-0-1-4">
                                                审核</label>
                                            <label class="c-orange"><input type="checkbox" value="" name="user-Character-0-2-0" id="user-Character-0-2-5"> 只能操作自己发布的</label>
                                        </dd>
                                    </dl>
                                </dd>
                            </dl>
                            <dl class="permission-list">
                                <dt>
                                    <label>
                                        <input type="checkbox" value="" name="user-Character-0" id="user-Character-1">
                                        用户中心</label>
                                </dt>
                                <dd>
                                    <dl class="cl permission-list2">
                                        <dt>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-1-0" id="user-Character-1-0">
                                                用户管理</label>
                                        </dt>
                                        <dd>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-1-0-0" id="user-Character-1-0-0">
                                                添加</label>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-1-0-0" id="user-Character-1-0-1">
                                                修改</label>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-1-0-0" id="user-Character-1-0-2">
                                                删除</label>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-1-0-0" id="user-Character-1-0-3">
                                                查看</label>
                                            <label class="">
                                                <input type="checkbox" value="" name="user-Character-1-0-0" id="user-Character-1-0-4">
                                                审核</label>
                                        </dd>
                                    </dl>
                                </dd>
                            </dl>
                        </div>
                    </div> --}}
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <button type="submit" class="btn btn-success radius" id="admin-role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
                </div>
            </div>
        </form>
    </article>
@endsection
@section('footer-script')
    <script src="{{ asset('back') }}/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
    <script src="{{ asset('back') }}/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
    <script src="{{ asset('back') }}/lib/jquery.validation/1.14.0/additional-methods.min.js"></script>
    <script src="{{ asset('back') }}/lib/jquery.form.js"></script>
    <script>
        $(function(){
            $(".permission-list dt input:checkbox").click(function(){
                $(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
            });
            $(".permission-list2 dd input:checkbox").click(function(){
                var l =$(this).parent().parent().find("input:checked").length;
                var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
                if($(this).prop("checked")){
                    $(this).closest("dl").find("dt input:checkbox").prop("checked",true);
                    $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
                }
                else{
                    if(l==0){
                        $(this).closest("dl").find("dt input:checkbox").prop("checked",false);
                    }
                    if(l2==0){
                        $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
                    }
                }
            });

            // jQuery 的 validate 验证插件
            $("#form-admin-role-add").validate({
                rules:{
                    roleName:{
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
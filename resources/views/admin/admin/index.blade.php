@extends('admin.common')
@section('title')管理员管理@endsection
@section('content')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="javascript:;" onclick="admin_add('添加管理员','{{ url('admin/admin/create') }}','1000')"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a> </span></div>
        <table class="table table-border table-bordered table-hover table-bg datatables">
            <thead>
            <tr>
                <th scope="col" colspan="14">管理员管理</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" value="" name=""></th>
                <th width="40">ID</th>
                <th width="100">帐号(昵称)</th>
                <th>角色</th>
                <th>性别</th>
                <th>头像</th>
                <th width="100">邮箱</th>
                <th width="100">手机</th>
                <th width="50">登录次数</th>
                <th width="80">登录IP</th>
                <th width="50">状态</th>
                <th width="100">创建时间</th>
                <th width="70">操作</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
@section('footer-script')
    <script src="{{ asset('back') }}/lib/My97DatePicker/WdatePicker.js"></script>
    <script src="{{ asset('back') }}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script>

        /*管理员-Datatable数据展示*/
        $('.datatables').DataTable({
            // 设置每一页显示的数据量
            "lengthMenu": [ [4, 6, 8, 10, -1],[4, 6, 8, 10, '全部'] ],  // -1 表示全部
            // 设置是否要显示分页
            "paging": true, // 默认开启分页
            "info":     true,	 // 是否显示分页辅助信息
            "searching": true,  // 是否启用即时搜索
            "ordering": true,  // 是否启用排序
            "order": [[ 1, "desc" ]], // 设置默认的首选排序字段，默认下标为1的显示倒序
            "stateSave": false,   // 是否保存插件使用状态
            "columnDefs": [{
                "targets": [0,-1,2,3,4,5,6,7,9],
                "orderable": false
            }],
            "processing": false,    // 是否显示数据在处理中的状态
            "serverSide": false,    // 是否要开启服务端
            "ajax": {
                "url": "{{ url('admin/admin/ajax_list') }}",        // 服务端uri地址，显示数据的uri
                "type": "post",   // ajax 的http请求类型
                'headers': { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
            },
            // 按列显示从服务器获取的数据
            "columns": [
                // {'data':'返回数据的字段名称',"defaultContent": "默认值",'className':'样式的类名'},
                {'data':'a',"defaultContent": ""},
                {'data':'id',"defaultContent": ""},
                {'data':'username',"defaultContent": ""},
                {'data':'role.role_name',"defaultContent": ""},
                {'data':'sex',"defaultContent": ""},
                {'data':'avatar',"defaultContent": ""},
                {'data':'email',"defaultContent": ""},
                {'data':'phone',"defaultContent": ""},
                {'data':'login_number',"defaultContent": ""},
                {'data':'login_ip',"defaultContent": ""},
                {'data':'disabled_at',"defaultContent": ""},
                {'data':'created_at',"defaultContent": ""},
                {'data':'c',"defaultContent": ""},
            ],
            "createdRow": function(row, data, dataIndex){ // row当前一行的tr标签对象， data当前一行的数据，dataIndex 当前数据的下标
                $(row).addClass('text-c');

                $(row).find('td:eq(0)').html('<input type="checkbox" value="'+ data.id +'" name="del[]">');

                // 性别
                $(row).find('td:eq(4)').html( data.sex == 1?'女':'男' );
                // 禁用状态
                $(row).find('td:eq(-3)').html( data.disabled_at<1?'启用':'禁用' );

                $(row).find('td:eq(-1)').html('<a title="编辑" href="javascript:;" onclick="admin_edit(\'管理员编辑\',\'/admin/admin/'+data.id+'/edit\',\''+data.id+'\')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a><a title="删除" href="javascript:;" onclick="admin_del(this,\''+data.id+'\')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>');
            }
        });

        /*管理员-添加*/
        function admin_add(title,url,w,h){
            layer_show(title,url,w,h);
        }
        /*管理员-编辑*/
        function admin_edit(title,url,id,w,h){
            layer_show(title,url,w,h);
        }
        /*管理员-删除*/
        function admin_del(obj,id){
            layer.confirm('管理员删除须谨慎，确认要删除吗？',function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                url = "/admin/admin/" + id;
                data = {
                    '_token': '{{ csrf_token() }}',
                    '_method': 'delete',
                };
                $.post(url,data,function(msg){
                    if( msg.status == 'fail' ){  // 失败
                        layer.alert(msg.error, {
                            icon: 5,
                            skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                        });
                    }else{ // 成功
                        // layer.alert('提示信息',{ icon:1,time:3000},function(){});
                        location.reload();
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                    }
                });
            });
        }
    </script>
@endsection
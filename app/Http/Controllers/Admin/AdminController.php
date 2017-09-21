<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    /**
     * 显示管理员列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('admin.admin.index');
    }

    /**
     * 显示添加管理员表单
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {   $data['roleList']=$role->get();
        return view('admin.admin.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Admin $admin)
    {
        if( !$request->ajax() ){
            return ['status'=>'fail','code'=>1,'error'=>'非法的请求类型'];
        }
        // 接收数据
        $data = $request->all();
        // 校验数据
        $validator_role = [
            'username' => 'required|unique:role',
        ];
        $message = [
            'username.required' => '管理员名称不能为空！',
            'username.unique' => '管理员名称已存在！',
        ];
        $validator = Validator::make( $data, $validator_role, $message );
        if( $validator->fails() ){
            // 验证失败！
            return ['status'=>'fail','code'=>2, 'error'=>$validator->messages()->first() ];
        }

        // 添加数据
        $res = $admin->create( $data );
        if( $res->id ){
            return ['status'=>'success'];
        }else{
            return ['status'=>'fail','code'=>3,'error'=> '添加失败！' ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 显示编辑表单数据
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $data['adminInfo'] = $admin;
        return view('admin.admin.edit', $data);
    }

    /**
     * 更新要编辑的数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        if( !$request->ajax() ){
            return ['status'=>'fail','code'=>1,'error'=>'非法的请求类型'];
        }
        // 接收数据
        $data = $request->all();
        // 校验数据
        $validator_role = [
            'username' => 'required|unique:role,username,'. $admin->id, // 忽略当前这条数据的值
        ];
        $message = [
            'username.required' => '管理员名称不能为空！',
            'username.unique' => '管理员名称已存在！',
        ];
        $validator = Validator::make( $data, $validator_role, $message );
        if( $validator->fails() ){
            // 验证失败！
            return ['status'=>'fail','code'=>2, 'error'=>$validator->messages()->first() ];
        }

        // 更新数据
        $res = $admin->update( $data );
        if( $res ){
            return ['status'=>'success'];
        }else{
            return ['status'=>'fail','code'=>3,'error'=> '修改失败！' ];
        }

    }

    /**
     * 删除数据
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = new Admin;
        $admin = $admin->find($id);
        $res = $admin->delete();
        if( $res ){
            return ['status'=>'success'];
        }else{
            return ['status'=>'fail', 'code'=>3, 'error'=> '删除失败！' ];
        }
    }

    /**
     * ajax获取管理员列表的数据
     */
    public function ajax_list(Request $request, Admin $admin){

        // 判断是否是ajax请求
        if( $request->ajax() ){
            // 返回的数据
            $data = $admin->with('role')->select('id','sex','login_ip','login_number','disabled_at','role_id','username','nickname','avatar','phone','email','note','created_at')->get();
            $cnt = count($data);    // 返回数据的总数
            $info = [
                'draw'=>$request->get('draw'),  // 有ajax发送过来的数值
                'recordsTotal'=>$cnt,           // 要返回的总数据量
                'recordsFiltered'=>$cnt,        // 要返回的总数据量
                'data'=>$data,                  // 要返回的数据
            ];
            return $info;
        }

    }

}

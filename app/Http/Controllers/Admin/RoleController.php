<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Support\Facades\Validator; //注意路径
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role)
    {
        if( !$request->ajax() ){
            return ['status'=>'fail','code'=>1,'error'=>'非法的请求类型'];
        }
        // 接收数据
        $data = $request->all();
        // 校验数据
        $validator_role = [
            'role_name' => 'required|unique:role',
        ];
        $message = [
            'role_name.required' => '角色名称不能为空！',
            'role_name.unique' => '角色名称已存在！',
        ];
        $validator = Validator::make( $data, $validator_role, $message );
        if( $validator->fails() ){
            // 验证失败！
            return ['status'=>'fail','code'=>2, 'error'=>$validator->messages()->first() ];
        }

        // 添加数据
        $res = $role->create( $data );
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $data['roleInfo']=$role;
        return view('admin.role.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if( !$request->ajax() ){
            return ['status'=>'fail','code'=>1,'error'=>'非法的请求类型'];
        }
        // 接收数据
        $data = $request->all();
        // 校验数据
        $validator_role = [
            'role_name' => 'required|unique:role,role_name,'.$role->id,
        ];
        $message = [
            'role_name.required' => '角色名称不能为空！',
            'role_name.unique' => '角色名称已存在！',
        ];
        $validator = Validator::make( $data, $validator_role, $message );
        if( $validator->fails() ){
            // 验证失败！
            return ['status'=>'fail','code'=>2, 'error'=>$validator->messages()->first() ];
        }

        // 更新数据
        $res = $role->update( $data );
        if( $res ){
            return ['status'=>'success'];
        }else{
            return ['status'=>'fail','code'=>3,'error'=> '添加失败！' ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=new Role;
        $role=$role->find($id);
        $role=$role->delete($id);
        if($role){
            return ['status'=>'success'];
        }else{
            return ['status'=>'fail','code'=>3,'error'=> '删除失败！' ];
        }
    }
    //ajax获取角色列表
    public function ajax_list(Request $request,Role $role)
    {
        //判断是否ajax请求
        if($request->ajax()){
            //返回数据
            $data=$role->select('id','role_name','note','created_at')->get();
            $cnt=count($data);
            $info=[
                'draw'=>$request->get('draw'),//有ajax发送过来的数值
                'recordsTotal'=>$cnt,       //要返回的总数据量
                'data'=>$data,              //要返回的数据
            ];
            return $info;
        }
    }
}

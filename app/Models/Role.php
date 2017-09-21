<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    //假删除,存储一个删除的状态， 通过这个状态的改变来区分数据是否被删除了。
    use SoftDeletes;
    protected $dates=['delete_at'];

    protected $table='role';
    protected $primaryKey='id';
    protected $fillable=['role_name','note','role_auth_ids','role_auth_ac','role_auth_addr'];
    //表 一对多
    function admin(){
        return $this->hasMany(\App\Models\Admin::class,'role_id','id');
    }
}

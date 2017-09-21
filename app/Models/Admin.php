<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    //假删除,存储一个删除的状态， 通过这个状态的改变来区分数据是否被删除了。
    use SoftDeletes;
    protected $dates=['delete_at'];

    protected $table='admin';
    protected $primaryKey='id';
    protected $fillable = ['role_id', 'username', 'nickname', 'password', 'avatar', 'phone', 'email', 'sex', 'note',
        'login_ip', 'login_number', 'disabled_at'];
    //管理员 和角色关系 多对一
    function role(){
        //belongsTo
        return $this->belongsTo(\App\Models\Role::class,'role_id','id');
    }
}

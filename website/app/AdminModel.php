<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = 'tb_admin_user';
    protected $primaryKey = 'id';
    protected $fillable = ['is_enable','is_visible','account','password','name','auth','LLT','uuid'];

    public $rules = array(
        'is_visible' => 'required',
        'account' => 'required|max:50',
        'password' => 'required|max:50|min:6|alpha_num'
    );

    public $messages = array(
        'account.required' => '請輸入帳號',
        'account.max' => '帳號限制50個字元',
        'account.alpha_num' => '帳號必需是英文字母(a-zA-Z)或數字(0-9)所組合',
        'password.required' => '請輸入密碼',
        'password.alpha_num' => '密碼必需是英文字母(a-zA-Z)或數字(0-9)所組合',
        'password.min' => '密碼限制6個字元',
        'password.max' => '密碼限制50個字元'
    );
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomepageContent4Model extends Model
{
    protected $table = 'tb_homepage_content4';
    protected $primaryKey = 'Id';
    protected $fillable = ['is_enable','is_visible','date','Img','order','uuid','updated_at','created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function content4lang(){
        return $this->hasMany(HomepageContent4LangModel::class,'cId','Id');
    }
}

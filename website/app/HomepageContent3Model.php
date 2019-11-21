<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomepageContent3Model extends Model
{
    protected $table = 'tb_homepage_content3';
    protected $primaryKey = 'Id';
    protected $fillable = ['is_enable','is_visible','date','Img','order','uuid','updated_at','created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function content3lang(){
        return $this->hasMany(HomepageContent3LangModel::class,'cId','Id');
    }
}

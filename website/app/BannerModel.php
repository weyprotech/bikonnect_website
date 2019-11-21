<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    protected $table = 'tb_banner';
    protected $primaryKey = 'bannerId';
    protected $fillable = ['is_enable','is_visible','date','bannerImg','order','uuid','updated_at','created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function bannerlang(){
        return $this->hasMany(BannerLangModel::class,'bId','bannerId');
    }
}

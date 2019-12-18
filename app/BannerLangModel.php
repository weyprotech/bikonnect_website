<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerLangModel extends Model
{
    protected $table = 'tb_banner_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['bId','langId','title','uuid','updated_at','created_at'];

    public function banner(){
        $this->belongsTo(BannerModel::class);
    }
}

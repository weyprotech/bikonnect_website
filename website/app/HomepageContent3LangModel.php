<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomepageContent3LangModel extends Model
{
    protected $table = 'tb_homepage_content3_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['bId','langId','title','uuid','updated_at','created_at'];

    public function content3(){
        $this->belongsTo(HomepageContent3LangModel::class);
    }
}

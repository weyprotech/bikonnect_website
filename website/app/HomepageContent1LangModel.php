<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomepageContent1LangModel extends Model
{
    protected $table = 'tb_homepage_content1_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['bId','langId','title','uuid','updated_at','created_at'];

    public function content1(){
        $this->belongsTo(HomepageContent1Model::class);
    }
}

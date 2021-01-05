<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomepageContent5LangModel extends Model
{
    protected $table = 'tb_homepage_content5_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['bId','langId','title','uuid','updated_at','created_at'];

    public function content5(){
        $this->belongsTo(HomepageContent5LangModel::class);
    }
}

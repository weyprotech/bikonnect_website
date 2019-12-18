<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomepageContent4LangModel extends Model
{
    protected $table = 'tb_homepage_content4_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['bId','langId','title','description','content','uuid','updated_at','created_at'];

    public function content4(){
        $this->belongsTo(HomepageContent4LangModel::class);
    }
}

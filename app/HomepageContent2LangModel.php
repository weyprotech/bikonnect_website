<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomepageContent2LangModel extends Model
{
    protected $table = 'tb_homepage_content2_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['bId','langId','title','uuid','updated_at','created_at'];

    public function content2(){
        return $this->belongsTo(HomepageContent2Model::class);
    }
}

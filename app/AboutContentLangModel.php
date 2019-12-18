<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutContentLangModel extends Model
{
    protected $table = 'tb_about_content_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['Id','cId','langId','title','img','content','updated_at'];
}

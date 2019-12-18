<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteLangModel extends Model
{
    protected $table = 'tb_website_lang';
    protected $primaryKey = 'langId';
    protected $fillable = ['is_enable','is_preset','langId','name','locale','order'];
}

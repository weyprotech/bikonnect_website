<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutHistoryLangModel extends Model
{
    protected $table = 'tb_about_history_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['Id','hId','langId','title','year','content','updated_at'];
}

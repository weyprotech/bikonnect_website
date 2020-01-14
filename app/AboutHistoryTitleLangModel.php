<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutHistoryTitleLangModel extends Model
{
    protected $table = 'tb_about_history_title_lang';
    protected $primaryKey = 'id';
    protected $fillable = ['Id','uuid','tId','langId','title'];
}

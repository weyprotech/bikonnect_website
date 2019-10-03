<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutTeamLangModel extends Model
{
    protected $table = 'tb_about_team_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['Id','tId','langId','title','name','content','updated_at'];
}

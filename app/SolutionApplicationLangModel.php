<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionApplicationLangModel extends Model
{
    protected $table = 'tb_solution_application_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['Id','cId','langId','picture','content','updated_at'];
}

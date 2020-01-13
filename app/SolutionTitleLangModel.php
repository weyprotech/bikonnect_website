<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionTitleLangModel extends Model
{
    protected $table = 'tb_solution_title_lang';
    protected $primaryKey = 'id';
    protected $fillable = ['Id','uuid','langId','title'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionAspectLangModel extends Model
{
    protected $table = 'tb_solution_aspect_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['Id','aId','langId','title','content','updated_at'];
}

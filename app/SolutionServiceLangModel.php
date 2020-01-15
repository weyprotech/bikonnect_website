<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionServiceLangModel extends Model
{
    protected $table = 'tb_solution_service_lang';
    protected $primaryKey = 'id';
    protected $fillable = ['Id','uuid','sId','langId','title','img'];
}

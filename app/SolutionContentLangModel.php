<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionContentLangModel extends Model
{
    protected $table = 'tb_solution_content_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['Id','cId','langId','title','picture','content','updated_at'];
}

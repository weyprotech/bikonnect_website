<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionVideoLangModel extends Model
{
    protected $table = 'tb_solution_video_lang';
    protected $primaryKey = 'id';
    protected $fillable = ['Id','uuid','account','password','name','auth','LLT','uuid'];
}

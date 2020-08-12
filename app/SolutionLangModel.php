<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionLangModel extends Model
{
    protected $table = "tb_solution_lang";
    protected $primaryKey = "Id";
    protected $fillable = ['Id','solutionId','langId','title','meta_title','meta_description','meta_keywords','dm_file','video_youtube','video_content','content_title','content_img','content_content','service_title','service_img'];


    public function solution(){
        return $this->belongsTo(SolutionModel::class);
    }
}

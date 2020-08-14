<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionAspectCategoryLangModel extends Model
{
    protected $table = 'tb_solution_aspect_category_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['Id','cId','langId','title','updated_at'];
    public $incrementing = false;

    public function category(){
        return $this->belongsTo(SolutionAspectCategoryLangModel::class);
    }
}

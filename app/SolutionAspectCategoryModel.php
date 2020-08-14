<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionAspectCategoryModel extends Model
{
    protected $table = 'tb_solution_aspect_category';
    protected $primaryKey = 'Id';
    protected $fillable = ['is_enable','Id','uuid','order','updated_at','created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function lang(){
        return $this->hasMany(SolutionAspectCategoryLangModel::class,'cId','Id')->orderby('langId','asc');
    }

}

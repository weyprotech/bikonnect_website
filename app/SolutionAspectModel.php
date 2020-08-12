<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionAspectModel extends Model
{
    protected $table = 'tb_solution_aspect';
    protected $primaryKey = 'Id';
    public $incrementing = false;
    protected $fillable = ['Id','sId','uuid','updated_at','created_at'];

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function lang(){
        return $this->hasMany(SolutionAspectLangModel::class,'aId','Id')->orderby('langId','asc');
    }

    public function solution(){
        return $this->hasone(solutionModel::class,'Id','sId');
    }
}

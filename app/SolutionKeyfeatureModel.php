<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionKeyfeatureModel extends Model
{
    protected $table = 'tb_solution_key_feature';
    protected $primaryKey = 'Id';
    protected $fillable = ['is_enable','is_visible','Img','order','uuid','updated_at','created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function keyfeaturelang(){
        return $this->hasMany(SolutionKeyfeatureLangModel::class,'fId','Id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionApplicationModel extends Model
{
    protected $table = 'tb_solution_application';
    protected $primaryKey = 'Id';
    protected $fillable = ['is_enable','Id','sId','uuid','updated_at','created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function lang(){
        return $this->hasMany(SolutionApplicationLangModel::class,'aId','Id')->orderby('langId','asc');
    }
}
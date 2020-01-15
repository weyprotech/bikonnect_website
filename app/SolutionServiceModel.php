<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionServiceModel extends Model
{
    protected $table = 'tb_solution_service';
    protected $primaryKey = 'Id';
    protected $fillable = ['Id','uuid'];

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function lang(){
        return $this->hasMany(SolutionServiceLangModel::class,'sId','Id')->orderby('langId','asc');
    }
}

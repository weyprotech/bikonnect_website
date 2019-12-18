<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionVideoModel extends Model
{
    protected $table = 'tb_solution_video';
    protected $primaryKey = 'Id';
    protected $fillable = ['Id','uuid','account','password','name','auth','LLT','uuid'];

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function lang(){
        return $this->hasMany(SolutionVideoLangModel::class,'vId','Id')->orderby('langId','asc');
    }
}

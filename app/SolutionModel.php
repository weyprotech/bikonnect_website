<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionModel extends Model
{
    protected $table = 'tb_solution';
    protected $primaryKey = 'Id';
    protected $fillable = ['uuid','url', 'order', 'updated_at', 'created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function lang(){
        return $this->hasMany(SolutionLangModel::class, 'solutionId', 'Id')->orderby('langId', 'asc');
    }
}

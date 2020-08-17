<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LearnmoreModel extends Model
{
    protected $table = 'tb_learn_more';
    protected $primaryKey = 'Id';
    protected $fillable = ['order','uuid','updated_at','created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function learnmorelang(){
        return $this->hasMany(LearnmoreLangModel::class,'lId','Id');
    }
}

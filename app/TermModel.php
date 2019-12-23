<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermModel extends Model
{
    protected $table = 'tb_term';
    protected $primaryKey = 'Id';
    protected $fillable = ['uuid','updated_at','created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function termlang(){
        return $this->hasMany(TermLangModel::class,'tId','Id');
    }
}

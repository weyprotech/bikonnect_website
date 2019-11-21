<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivacyTermModel extends Model
{
    protected $table = 'tb_privacy_term';
    protected $primaryKey = 'Id';
    protected $fillable = ['is_enable','order','uuid','updated_at','created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function privacyTermlang(){
        return $this->hasMany(PrivacyTermLangModel::class,'tId','Id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivacyModel extends Model
{
    protected $table = 'tb_privacy_index';
    protected $primaryKey = 'Id';
    protected $fillable = ['is_enable','uuid','updated_at','created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function privacylang(){
        return $this->hasMany(PrivacyLangModel::class,'pId','Id');
    }
}

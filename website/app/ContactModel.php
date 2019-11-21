<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = 'tb_contact';
    protected $primaryKey = 'Id';
    protected $fillable = ['uuid','updated_at','created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function contactlang(){
        return $this->hasMany(ContactLangModel::class,'cId','Id');
    }
}

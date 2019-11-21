<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactLangModel extends Model
{
    protected $table = 'tb_contact_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['cId','langId','address','phone','fax','updated_at','created_at'];

    public function contact(){
        $this->belongsTo(ContactLangModel::class);
    }
}

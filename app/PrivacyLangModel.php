<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivacyLangModel extends Model
{
    protected $table = 'tb_privacy_index_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['pId','langId','title','content','uuid','updated_at','created_at'];

    public function privacy(){
        $this->belongsTo(PrivacyModel::class);
    }
}

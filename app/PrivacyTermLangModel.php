<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivacyTermLangModel extends Model
{
    protected $table = 'tb_privacy_term_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['pId','langId','title','uuid','updated_at','created_at'];

    public function privacyTerm(){
        $this->belongsTo(PrivacyTermModel::class);
    }
}

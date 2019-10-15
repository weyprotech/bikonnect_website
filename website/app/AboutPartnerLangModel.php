<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutPartnerLangModel extends Model
{
    protected $table = 'tb_about_partner_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['Id','pId','langId','title','updated_at','created_at'];
}

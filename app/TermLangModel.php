<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermLangModel extends Model
{
    protected $table = 'tb_term_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['tId','langId','title','content','updated_at','created_at'];

    public function term(){
        $this->belongsTo(TermModel::class);
    }
}

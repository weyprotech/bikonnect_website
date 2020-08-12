<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionApplicationLangModel extends Model
{
    protected $table = 'tb_solution_application_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['Id','aId','langId','img','content','updated_at','created_at'];
    public $incrementing = false;

    public function application(){
        return $this->belongsTo(SolutionApplicationModel::class);
    }
}

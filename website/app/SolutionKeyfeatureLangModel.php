<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionKeyfeatureLangModel extends Model
{
    protected $table = 'tb_solution_key_feature_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['fId','langId','title','uuid','updated_at','created_at'];

    public function keyfeature(){
        $this->belongsTo(SolutionKeyfeatureModel::class);
    }
}

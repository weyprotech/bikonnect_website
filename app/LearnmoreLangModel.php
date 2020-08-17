<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LearnmoreLangModel extends Model
{
    protected $table = 'tb_learn_more_lang';
    protected $primaryKey = 'Id';
    protected $fillable = ['lId','langId','main_title','main_href','solution_title','solution_href','vision_title','vision_href','updated_at','created_at'];

    public function learnmore(){
        $this->belongsTo(LearnmoreModel::class);
    }
}

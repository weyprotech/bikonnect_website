<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutHistoryModel extends Model
{
    protected $table = 'tb_about_history';
    protected $primaryKey = 'Id';
    protected $fillable = ['uuid','updated_at','created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function lang(){
        return $this->hasMany(AboutHistoryLangModel::class,'hId','Id')->orderby('langId','asc');
    }
}

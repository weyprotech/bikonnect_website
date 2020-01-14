<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutHistoryTitleModel extends Model
{
    protected $table = 'tb_about_history_title';
    protected $primaryKey = 'Id';
    protected $fillable = ['Id','uuid'];

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function lang(){
        return $this->hasMany(AboutHistoryTitleLangModel::class,'tId','Id')->orderby('langId','asc');
    }
}

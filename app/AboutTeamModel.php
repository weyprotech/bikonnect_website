<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutTeamModel extends Model
{
    protected $table = 'tb_about_team';
    protected $primaryKey = 'Id';
    protected $fillable = ['uuid','img','updated_at','created_at'];
    public $incrementing = false;

    public $rules = array(
        'uuid' => 'required'
    );

    public $messages = array(
        'uuid.required' => 'uuid為必填'
    );

    public function lang(){
        return $this->hasMany(AboutTeamLangModel::class,'tId','Id')->orderby('langId','asc');
    }
}

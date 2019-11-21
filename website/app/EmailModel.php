<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailModel extends Model
{
    protected $table = 'tb_contact_email';
    protected $primaryKey = 'Id';
    protected $fillable = ['is_enable','Id','email','uuid','updated_at','created_at'];
    public $incrementing = false;
}

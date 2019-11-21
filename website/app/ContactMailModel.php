<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMailModel extends Model
{
    protected $table = 'tb_contact_mail';
    protected $primaryKey = 'Id';
    protected $fillable = ['name','phone','email','content','updated_at','created_at'];
}

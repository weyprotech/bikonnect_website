<?php
namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model {
    protected $table = 'auth';

    protected $primaryKey = 'authid';

    protected $fillable = [
        'name', 'username', 'password',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminModel extends Authenticatable
{
    use HasFactory ;
    protected $table ='admins';
    protected $fillable = ['id','name','phone','email','password','create_at','updated_at','id_roles'];
    protected $hidden = ['password'];
}
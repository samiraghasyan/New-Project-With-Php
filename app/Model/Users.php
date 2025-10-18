<?php

namespace App\Model;

use Core\Database\ORM\Model;

class Users extends Model
{
    protected $table = "users";

    protected $fillable = ['name', 'email'];


}
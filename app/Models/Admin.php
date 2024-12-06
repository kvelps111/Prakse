<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'users'; // Ensure this matches the table name
    protected $fillable = ['name', 'email', 'password'];
}

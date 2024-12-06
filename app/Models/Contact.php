<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact'; // Ensure this matches the table name
    protected $fillable = ['email', 'message'];
}

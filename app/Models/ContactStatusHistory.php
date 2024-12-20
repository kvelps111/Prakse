<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactStatusHistory extends Model
{
    use HasFactory;
    protected $table = 'contact_status_history'; 
    protected $fillable = [
        'contact_id', 'status_id', 'user_id',
    ];
}

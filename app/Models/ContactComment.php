<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactComment extends Model
{
    protected $table = 'contact_comment';
    protected $fillable = ['contact_id','user_id','comment',];

    public function contact()
    {
        return $this->belongsTo(Contact::class);  // Each comment belongs to a contact
    }
}

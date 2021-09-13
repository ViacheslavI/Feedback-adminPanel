<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'user_id', 'subject', 'message', 'file','viewed'
    ];

   public function user(){
       return $this->belongsTo(User::class);
   }

    public function hasFile()
    {
        return (bool) $this->file;
    }

    public function isViewed()
    {
        return (bool) $this->viewed;
    }
}

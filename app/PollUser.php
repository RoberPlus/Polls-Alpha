<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollUser extends Model
{
    protected $table = 'poll_user';
    
    protected $fillable = [
        'user_id', 'poll_id'
    ];
}

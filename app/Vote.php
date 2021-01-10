<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'option_id', 'poll_id'
    ];
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}

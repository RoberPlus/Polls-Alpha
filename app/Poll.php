<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{

    protected $fillable = [
        'title', 'description', 'image', 'coop_id', 'created_at'
    ];

    public $timestamps = true;

    public function options() {
        return $this->hasMany(Option::class);
    }
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
    public function coops()
    {
        return $this->belongsTo(Coop::class, 'coop_id');
    }
}

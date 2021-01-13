<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{

    protected $fillable = [
        'title', 'description', 'image', 'coop_id', 'created_at', 'status'
    ];

    public $timestamps = true;

    // Relacion 1:n Votacion - Opciones
    public function options() {

        return $this->hasMany(Option::class);
    }

    // Relacion 1:n Votacion - Votos
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    // Relacion 1:1 Votacion - Cooperativa
    public function coops()
    {
        return $this->belongsTo(Coop::class, 'coop_id');
    }
}

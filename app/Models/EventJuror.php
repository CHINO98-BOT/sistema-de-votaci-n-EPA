<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventJuror extends Model
{
    use HasFactory;

    protected $table = 'event_jurors';

    protected $fillable = [
        'event_id',
        'juror_user_id'
    ];

    // Relación con el evento
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    // Relación con el usuario jurado
    public function juror()
    {
        return $this->belongsTo(User::class, 'juror_user_id');
    }
}
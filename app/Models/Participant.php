<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'first_name',
        'last_name',
        'dni',
        'course',
        'description',
        'status',
        'order'
    ];

    // Relación con el evento
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    // Relación con las fotos
    public function photos()
    {
        return $this->hasMany(ParticipantPhoto::class, 'participant_id');
    }

    // Foto principal
    public function mainPhoto()
    {
        return $this->hasOne(ParticipantPhoto::class, 'participant_id')->where('is_main', true);
    }

    // Nombre completo
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
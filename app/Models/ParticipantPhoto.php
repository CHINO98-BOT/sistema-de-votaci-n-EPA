<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_id',
        'file_path',
        'is_main',
        'order'
    ];

    // Relación con el participante
    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }
}
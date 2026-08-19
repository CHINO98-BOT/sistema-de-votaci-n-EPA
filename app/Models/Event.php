<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'created_by'
    ];

    // Relación con el usuario creador
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relación con jurados asignados
    public function jurors()
    {
        return $this->hasMany(EventJuror::class, 'event_id');
    }
}
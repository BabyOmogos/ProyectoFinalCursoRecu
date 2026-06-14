<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'trabajo_id', 'correo', 'telefono', 'hora', 'estado'])]
class Reserva extends Model
{
    protected function casts(): array
    {
        return [
            'hora' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function trabajo(): BelongsTo
    {
        return $this->belongsTo(Trabajo::class);
    }

    public function getEstadoLabelAttribute(): string
    {
        return match ($this->estado) {
            'aceptada' => 'Aceptada',
            'rechazada' => 'Rechazada',
            default => 'Pendiente',
        };
    }
}

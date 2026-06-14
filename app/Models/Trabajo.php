<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

#[Fillable(['imagen', 'precio_hora', 'trabajo', 'ubicacion', 'descripcion'])]
class Trabajo extends Model
{
    public function getImagenUrlAttribute(): string
    {
        if (Str::startsWith($this->imagen, ['http://', 'https://'])) {
            return $this->imagen;
        }

        $segmentos = array_map(
            static fn (string $segmento): string => rawurlencode($segmento),
            explode('/', ltrim($this->imagen, '/'))
        );

        return '/'.implode('/', $segmentos);
    }

    public function reservas(): HasMany
    {
        return $this->hasMany(Reserva::class);
    }
}

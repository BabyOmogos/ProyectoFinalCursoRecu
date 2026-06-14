<?php

namespace Database\Seeders;

use App\Models\Trabajo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->updateOrCreate([
            'email' => 'admin@proyecto.test',
        ], [
            'name' => 'Administrador principal',
            'role' => 'administrador',
            'password' => Hash::make('contrasena'),
            'email_verified_at' => now(),
        ]);

        User::query()->updateOrCreate([
            'email' => 'empleado@proyecto.test',
        ], [
            'name' => 'Empleado general',
            'role' => 'empleado',
            'password' => Hash::make('contrasena'),
            'email_verified_at' => now(),
        ]);

        User::query()->updateOrCreate([
            'email' => 'usuario@proyecto.test',
        ], [
            'name' => 'Usuario general',
            'role' => 'usuario',
            'password' => Hash::make('contrasena'),
            'email_verified_at' => now(),
        ]);

        User::query()->updateOrCreate([
            'email' => 'babyomogos@gmail.com',
        ], [
            'name' => 'babyomogos',
            'role' => 'administrador',
            'password' => Hash::make('hola123'),
            'email_verified_at' => now(),
        ]);

        $servicios = [
            [
                'legacy' => 'Diseno de pagina web corporativa',
                'trabajo' => 'Tala controlada de arbolado',
                'imagen' => '/imagenes/servicios/WhatsApp Image 2026-05-14 at 17.50.55.jpeg',
                'precio_hora' => 42.00,
                'ubicacion' => 'Avenida del Cristo, Oviedo',
                'descripcion' => 'Retirada segura de arboles peligrosos, recogida de restos y limpieza final de la zona de trabajo.',
            ],
            [
                'legacy' => 'Mantenimiento de equipos',
                'trabajo' => 'Poda en altura y desrame',
                'imagen' => '/imagenes/servicios/WhatsApp Image 2026-05-14 at 17.51.27.jpeg',
                'precio_hora' => 34.00,
                'ubicacion' => 'Parque de Invierno, Oviedo',
                'descripcion' => 'Poda de seguridad y mantenimiento de arbolado, setos y zonas ajardinadas con retirada de residuos verdes.',
            ],
            [
                'legacy' => 'Soporte tecnico remoto',
                'trabajo' => 'Desbroce y mantenimiento de parcelas',
                'imagen' => '/imagenes/servicios/WhatsApp Image 2026-05-14 at 17.49.34.jpeg',
                'precio_hora' => 28.00,
                'ubicacion' => 'Zona verde de Teatinos, Oviedo',
                'descripcion' => 'Limpieza de fincas, control de vegetacion y mantenimiento periodico de terrenos y accesos exteriores.',
            ],
            [
                'legacy' => 'Recogida de Papeles',
                'trabajo' => 'Poda de palmeras',
                'imagen' => '/imagenes/servicios/WhatsApp Image 2026-05-14 at 17.55.00.jpeg',
                'precio_hora' => 56.00,
                'ubicacion' => 'Barrio residencial de La Corredoria, Oviedo',
                'descripcion' => 'Poda y saneamiento de palmeras con medios de elevacion, retirada de hojas secas y limpieza completa del entorno.',
            ],
            [
                'legacy' => 'Recogida de Papeles',
                'trabajo' => 'Poda ornamental de arbolado',
                'imagen' => '/imagenes/servicios/WhatsApp Image 2026-05-14 at 17.57.24.jpeg',
                'precio_hora' => 30.00,
                'ubicacion' => 'Plaza publica en el centro de Oviedo',
                'descripcion' => 'Recorte y perfilado de copas en zonas urbanas para mantener una imagen cuidada, segura y uniforme.',
            ],
        ];

        foreach ($servicios as $servicio) {
            $trabajo = Trabajo::query()
                ->where('precio_hora', $servicio['precio_hora'])
                ->where(function ($query) use ($servicio) {
                    $query
                        ->where('trabajo', $servicio['legacy'])
                        ->orWhere('trabajo', $servicio['trabajo']);
                })
                ->first();

            if ($trabajo) {
                $trabajo->update([
                    'trabajo' => $servicio['trabajo'],
                    'imagen' => $servicio['imagen'],
                    'precio_hora' => $servicio['precio_hora'],
                    'ubicacion' => $servicio['ubicacion'],
                    'descripcion' => $servicio['descripcion'],
                ]);

                continue;
            }

            Trabajo::query()->create([
                'trabajo' => $servicio['trabajo'],
                'imagen' => $servicio['imagen'],
                'precio_hora' => $servicio['precio_hora'],
                'ubicacion' => $servicio['ubicacion'],
                'descripcion' => $servicio['descripcion'],
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Trabajo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function crear(Trabajo $trabajo): View
    {
        abort_unless(auth()->user()->hasRole('usuario'), 403);

        return view('reservas.crear', [
            'trabajo' => $trabajo,
        ]);
    }

    public function guardar(Request $request, Trabajo $trabajo): RedirectResponse
    {
        abort_unless(auth()->user()->hasRole('usuario'), 403);

        $validated = $request->validate([
            'correo' => ['required', 'email', 'max:255'],
            'telefono' => ['required', 'string', 'max:20'],
            'hora' => ['required', 'date', 'after:now'],
        ], [
            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'El correo debe ser valido.',
            'telefono.required' => 'El telefono es obligatorio.',
            'hora.required' => 'La hora de la reserva es obligatoria.',
            'hora.after' => 'La hora debe ser posterior al momento actual.',
        ]);

        Reserva::create([
            'user_id' => auth()->id(),
            'trabajo_id' => $trabajo->id,
            'correo' => $validated['correo'],
            'telefono' => $validated['telefono'],
            'hora' => $validated['hora'],
            'estado' => 'pendiente',
        ]);

        return redirect()
            ->route('reservas.mis')
            ->with('status', 'Reserva enviada correctamente. Espera la confirmacion del equipo.');
    }

    public function mis(): View
    {
        abort_unless(auth()->user()->hasRole('usuario'), 403);

        return view('reservas.mis', [
            'reservas' => auth()->user()
                ->reservas()
                ->with('trabajo')
                ->latest()
                ->paginate(10),
        ]);
    }

    public function listar(): View
    {
        return view('reservas.index', [
            'reservas' => Reserva::with(['user', 'trabajo'])
                ->latest()
                ->paginate(10),
        ]);
    }

    public function aceptar(Reserva $reserva): RedirectResponse
    {
        $reserva->update(['estado' => 'aceptada']);

        return redirect()
            ->route('reservas.index')
            ->with('status', 'Reserva aceptada correctamente.');
    }

    public function rechazar(Reserva $reserva): RedirectResponse
    {
        $reserva->update(['estado' => 'rechazada']);

        return redirect()
            ->route('reservas.index')
            ->with('status', 'Reserva rechazada correctamente.');
    }
}

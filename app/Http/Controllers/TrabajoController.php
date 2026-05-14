<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    public function listar(): View
    {
        return view('trabajos.index', [
            'trabajos' => Trabajo::latest()->paginate(9),
        ]);
    }

    public function crear(): View
    {
        return view('trabajos.create', [
            'trabajo' => new Trabajo(),
            'esEdicion' => false,
        ]);
    }

    public function editar(Trabajo $trabajo): View
    {
        return view('trabajos.create', [
            'trabajo' => $trabajo,
            'esEdicion' => true,
        ]);
    }

    public function guardar(Request $request): RedirectResponse
    {
        $validated = $this->validarServicio($request);

        Trabajo::create($validated);

        return redirect()
            ->route('trabajos.index')
            ->with('status', 'Servicio creado correctamente.');
    }

    public function actualizar(Request $request, Trabajo $trabajo): RedirectResponse
    {
        $validated = $this->validarServicio($request);

        $trabajo->update($validated);

        return redirect()
            ->route('trabajos.index')
            ->with('status', 'Servicio actualizado correctamente.');
    }

    public function eliminar(Trabajo $trabajo): RedirectResponse
    {
        $trabajo->delete();

        return redirect()
            ->route('trabajos.index')
            ->with('status', 'Servicio eliminado correctamente.');
    }

    private function validarServicio(Request $request): array
    {
        return $request->validate([
            'imagen' => ['required', 'string', 'max:2048'],
            'precio_hora' => ['required', 'numeric', 'min:0'],
            'trabajo' => ['required', 'string', 'max:255'],
            'ubicacion' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:5000'],
        ], [
            'imagen.required' => 'La imagen es obligatoria.',
            'precio_hora.required' => 'El precio por hora es obligatorio.',
            'precio_hora.numeric' => 'El precio por hora debe ser numerico.',
            'trabajo.required' => 'El nombre del servicio es obligatorio.',
            'ubicacion.required' => 'La ubicacion del servicio es obligatoria.',
            'descripcion.required' => 'La descripcion del servicio es obligatoria.',
        ]);
    }
}

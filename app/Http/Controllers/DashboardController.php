<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function mostrarPanel(Request $request): View
    {
        $user = $request->user();

        $elementosMenu = [
            [
                'titulo' => 'Ver servicios',
                'descripcion' => 'Consulta los servicios de tala, poda, desbroce y mantenimiento registrados.',
                'route' => route('trabajos.index'),
            ],
            [
                'titulo' => 'Editar perfil',
                'descripcion' => 'Actualiza tus datos personales y la seguridad de tu cuenta.',
                'route' => route('profile.edit'),
            ],
        ];

        if ($user->hasRole(['empleado', 'administrador'])) {
            $elementosMenu[] = [
                'titulo' => 'Registrar servicio',
                'descripcion' => 'Anade nuevas actuaciones de jardineria, tala o mantenimiento al catalogo interno.',
                'route' => route('trabajos.create'),
            ];
        }

        if ($user->hasRole('administrador')) {
            $elementosMenu[] = [
                'titulo' => 'Gestionar personal',
                'descripcion' => 'Revisa usuarios, cambia roles y controla los accesos del equipo.',
                'route' => route('usuarios.index'),
            ];
        }

        return view('dashboard', [
            'elementosMenu' => $elementosMenu,
            'cantidadServicios' => Trabajo::count(),
            'cantidadUsuarios' => User::count(),
        ]);
    }

    public function listarUsuarios(): View
    {
        return view('admin.usuarios', [
            'usuarios' => User::orderByRaw(
                "CASE role
                    WHEN 'administrador' THEN 1
                    WHEN 'empleado' THEN 2
                    ELSE 3
                END"
            )->orderBy('name')->get(),
        ]);
    }

    public function actualizarUsuario(Request $request, User $user): RedirectResponse
    {
        if ($user->hasRole('administrador')) {
            return redirect()
                ->route('usuarios.index')
                ->with('status', 'Los administradores no se pueden editar desde este panel.');
        }

        $validator = Validator::make($request->all(), [
            'role' => ['required', Rule::in(['usuario', 'empleado', 'administrador'])],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
        ], [
            'role.required' => 'Debes seleccionar un rol.',
            'role.in' => 'El rol seleccionado no es valido.',
            'password.min' => 'La contrasena debe tener al menos 6 caracteres.',
            'password.confirmed' => 'La confirmacion de la contrasena no coincide.',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('usuarios.index')
                ->withErrors($validator, "updateUser_{$user->id}");
        }

        $user->role = $request->string('role')->toString();

        if ($request->filled('password')) {
            $user->password = $request->string('password')->toString();
        }

        $user->save();

        return redirect()
            ->route('usuarios.index')
            ->with('status', "Usuario {$user->email} actualizado correctamente.");
    }
}

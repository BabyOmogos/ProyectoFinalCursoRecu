<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-zinc-500">Administracion</p>
            <h2 class="mt-2 text-3xl font-semibold leading-tight text-zinc-100">
                Personal y accesos
            </h2>
            <p class="mt-2 text-sm text-zinc-400">
                Gestiona el acceso del personal administrativo y operativo de la empresa.
            </p>
        </div>
    </x-slot>

    @if (session('status'))
        <div class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
            {{ session('status') }}
        </div>
    @endif

    <div class="grid gap-6 xl:grid-cols-[minmax(0,1.25fr)_320px]">
        <section class="overflow-hidden rounded-[28px] border border-white/10 bg-[#111114] shadow-2xl shadow-black/20">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-white/10">
                    <thead class="bg-[#0d0d0f]">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Nombre</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Correo</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Rol</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Gestion</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        @foreach ($usuarios as $usuario)
                            <tr class="bg-transparent transition hover:bg-white/[0.03]">
                                <td class="px-6 py-4 text-sm text-zinc-100">{{ $usuario->name }}</td>
                                <td class="px-6 py-4 text-sm text-zinc-400">{{ $usuario->email }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="inline-flex rounded-full border border-indigo-400/20 bg-indigo-500/10 px-3 py-1 font-medium text-indigo-200">
                                        {{ $usuario->role_label }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    @if ($usuario->hasRole('administrador'))
                                        <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-3">
                                            <p class="font-medium text-zinc-100">Administrador protegido</p>
                                            <p class="mt-1 text-xs leading-6 text-zinc-400">
                                                Este usuario no se puede editar desde este panel.
                                            </p>
                                        </div>
                                    @else
                                        @php($errorBag = $errors->getBag("updateUser_{$usuario->id}"))

                                        <form method="POST" action="{{ route('usuarios.update', $usuario) }}" class="space-y-3 rounded-2xl border border-white/10 bg-white/[0.03] p-4">
                                            @csrf
                                            @method('PATCH')

                                            <div>
                                                <label for="role-{{ $usuario->id }}" class="text-xs uppercase tracking-[0.2em] text-zinc-500">Rol</label>
                                                <select
                                                    id="role-{{ $usuario->id }}"
                                                    name="role"
                                                    class="mt-2 block w-full rounded-xl border border-white/10 bg-[#0d0d0f] px-3 py-2 text-sm text-zinc-100 focus:border-indigo-400/50 focus:outline-none focus:ring-0"
                                                >
                                                    <option value="usuario" @selected($usuario->role === 'usuario')>Usuario</option>
                                                    <option value="empleado" @selected($usuario->role === 'empleado')>Empleado</option>
                                                    <option value="administrador" @selected($usuario->role === 'administrador')>Administrador</option>
                                                </select>
                                                @if ($errorBag->has('role'))
                                                    <p class="mt-2 text-xs text-rose-300">{{ $errorBag->first('role') }}</p>
                                                @endif
                                            </div>

                                            <div class="grid gap-3 lg:grid-cols-2">
                                                <div>
                                                    <label for="password-{{ $usuario->id }}" class="text-xs uppercase tracking-[0.2em] text-zinc-500">Nueva contrasena</label>
                                                    <input
                                                        id="password-{{ $usuario->id }}"
                                                        type="password"
                                                        name="password"
                                                        class="mt-2 block w-full rounded-xl border border-white/10 bg-[#0d0d0f] px-3 py-2 text-sm text-zinc-100 focus:border-indigo-400/50 focus:outline-none focus:ring-0"
                                                    >
                                                    @if ($errorBag->has('password'))
                                                        <p class="mt-2 text-xs text-rose-300">{{ $errorBag->first('password') }}</p>
                                                    @endif
                                                </div>

                                                <div>
                                                    <label for="password_confirmation-{{ $usuario->id }}" class="text-xs uppercase tracking-[0.2em] text-zinc-500">Confirmar contrasena</label>
                                                    <input
                                                        id="password_confirmation-{{ $usuario->id }}"
                                                        type="password"
                                                        name="password_confirmation"
                                                        class="mt-2 block w-full rounded-xl border border-white/10 bg-[#0d0d0f] px-3 py-2 text-sm text-zinc-100 focus:border-indigo-400/50 focus:outline-none focus:ring-0"
                                                    >
                                                </div>
                                            </div>

                                            <button type="submit" class="rounded-xl border border-indigo-400/20 bg-indigo-500/10 px-4 py-2 text-sm font-medium text-indigo-200 transition hover:bg-indigo-500/20">
                                                Guardar cambios
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <aside class="rounded-[28px] border border-white/10 bg-[#121214] p-5 shadow-2xl shadow-black/20">
            <div class="rounded-2xl border border-white/10 bg-[#0d0d0f] p-4">
                <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Resumen</p>
                <h3 class="mt-2 text-lg font-semibold text-zinc-100">Control de personal</h3>
                <p class="mt-2 text-sm leading-6 text-zinc-400">
                    Aqui puedes revisar rapidamente que miembros del equipo existen y que permisos tiene cada uno.
                </p>
            </div>

            <div class="mt-5 rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-4">
                <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Total</p>
                <p class="mt-2 text-3xl font-semibold text-zinc-100">{{ $usuarios->count() }}</p>
            </div>

            <div class="mt-5 rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-4">
                <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Edicion</p>
                <p class="mt-2 text-sm leading-6 text-zinc-400">
                    Puedes cambiar el rol y la contrasena del personal operativo y de usuarios base. Los administradores quedan protegidos en esta vista.
                </p>
            </div>
        </aside>
    </div>
</x-app-layout>

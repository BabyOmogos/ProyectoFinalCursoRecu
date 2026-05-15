<nav class="border-b border-white/10 bg-[#0d0d0f]/90 backdrop-blur">
    <div class="mx-auto max-w-[1400px] px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 py-4 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-logo class="h-12 w-auto rounded-xl bg-white px-2 py-1" />
                </a>

                <div class="hidden h-8 w-px bg-white/10 lg:block"></div>

                <div class="hidden items-center gap-2 lg:flex">
                    <a href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? 'border-indigo-400/60 bg-indigo-500/10 text-indigo-200' : 'border-white/10 bg-white/[0.03] text-zinc-300 hover:bg-white/[0.06]' }} rounded-xl border px-4 py-2 text-sm transition">
                        Panel
                    </a>

                    <a href="{{ route('trabajos.index') }}"
                        class="{{ request()->routeIs('trabajos.*') ? 'border-indigo-400/60 bg-indigo-500/10 text-indigo-200' : 'border-white/10 bg-white/[0.03] text-zinc-300 hover:bg-white/[0.06]' }} rounded-xl border px-4 py-2 text-sm transition">
                        Servicios
                    </a>

                    @if (Auth::user()->hasRole(['empleado', 'administrador']))
                        <a href="{{ route('trabajos.create') }}"
                            class="{{ request()->routeIs('trabajos.create') ? 'border-indigo-400/60 bg-indigo-500/10 text-indigo-200' : 'border-white/10 bg-white/[0.03] text-zinc-300 hover:bg-white/[0.06]' }} rounded-xl border px-4 py-2 text-sm transition">
                            Registrar servicio
                        </a>
                    @endif

                    @if (Auth::user()->hasRole('administrador'))
                        <a href="{{ route('usuarios.index') }}"
                            class="{{ request()->routeIs('usuarios.*') ? 'border-indigo-400/60 bg-indigo-500/10 text-indigo-200' : 'border-white/10 bg-white/[0.03] text-zinc-300 hover:bg-white/[0.06]' }} rounded-xl border px-4 py-2 text-sm transition">
                            Personal
                        </a>
                    @endif
                </div>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between lg:justify-end">
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('profile.edit') }}"
                        class="rounded-xl border border-white/10 bg-white/[0.03] px-4 py-2 text-sm text-zinc-300 transition hover:bg-white/[0.06]">
                        Perfil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="rounded-xl border border-white/10 bg-white/[0.03] px-4 py-2 text-sm text-zinc-300 transition hover:bg-white/[0.06]">
                            Cerrar sesion
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap gap-2 pb-4 lg:hidden">
            <a href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'border-indigo-400/60 bg-indigo-500/10 text-indigo-200' : 'border-white/10 bg-white/[0.03] text-zinc-300 hover:bg-white/[0.06]' }} rounded-xl border px-4 py-2 text-sm transition">
                Panel
            </a>

            <a href="{{ route('trabajos.index') }}"
                class="{{ request()->routeIs('trabajos.*') ? 'border-indigo-400/60 bg-indigo-500/10 text-indigo-200' : 'border-white/10 bg-white/[0.03] text-zinc-300 hover:bg-white/[0.06]' }} rounded-xl border px-4 py-2 text-sm transition">
                Servicios
            </a>

            @if (Auth::user()->hasRole(['empleado', 'administrador']))
                <a href="{{ route('trabajos.create') }}"
                    class="{{ request()->routeIs('trabajos.create') ? 'border-indigo-400/60 bg-indigo-500/10 text-indigo-200' : 'border-white/10 bg-white/[0.03] text-zinc-300 hover:bg-white/[0.06]' }} rounded-xl border px-4 py-2 text-sm transition">
                    Registrar servicio
                </a>
            @endif

            @if (Auth::user()->hasRole('administrador'))
                <a href="{{ route('usuarios.index') }}"
                    class="{{ request()->routeIs('usuarios.*') ? 'border-indigo-400/60 bg-indigo-500/10 text-indigo-200' : 'border-white/10 bg-white/[0.03] text-zinc-300 hover:bg-white/[0.06]' }} rounded-xl border px-4 py-2 text-sm transition">
                    Personal
                </a>
            @endif
        </div>
    </div>
</nav>

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-zinc-500">Gestion operativa</p>
                <h2 class="mt-2 text-3xl font-semibold leading-tight text-zinc-100">
                    Panel principal
                </h2>
                <p class="mt-2 max-w-2xl text-sm text-zinc-400">
                    Controla servicios de tala, poda, desbroce y mantenimiento de terrenos desde un panel adaptado al rol de cada usuario.
                </p>
            </div>

            <span class="inline-flex items-center rounded-full border border-indigo-400/20 bg-indigo-500/10 px-4 py-2 text-sm font-medium text-indigo-200">
                Rol: {{ Auth::user()->role_label }}
            </span>
        </div>
    </x-slot>

    @if (session('status'))
        <div class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
            {{ session('status') }}
        </div>
    @endif

    <div class="grid gap-6 xl:grid-cols-[minmax(0,1.35fr)_420px]">
        <section class="rounded-[28px] border border-white/10 bg-[#0f0f11] p-6 shadow-2xl shadow-black/20">
            <div class="flex min-h-[620px] flex-col justify-between gap-8">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs uppercase tracking-[0.3em] text-zinc-500">Vista principal</p>
                        <h3 class="mt-2 text-lg font-semibold text-zinc-100">Centro de gestion de jardineria</h3>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-2 text-right">
                        <p class="text-xs uppercase tracking-[0.3em] text-zinc-500">Sesion</p>
                        <p class="mt-1 text-sm text-zinc-300">Activa y lista para coordinar servicios</p>
                    </div>
                </div>

                <div class="flex flex-1 flex-col items-center justify-center text-center">
                    <div class="grid h-28 w-28 place-items-center rounded-[28px] border border-white/10 bg-white/[0.03] text-2xl font-semibold text-zinc-100 shadow-xl shadow-black/30">
                        PFC
                    </div>

                    <h3 class="mt-8 text-2xl font-semibold text-zinc-100">{{ Auth::user()->name }}</h3>
                    <p class="mt-2 max-w-xl text-sm leading-7 text-zinc-400">
                        Desde aqui puedes consultar actuaciones de poda, registrar nuevos servicios y coordinar el mantenimiento de jardines, parcelas y fincas.
                    </p>

                    <div class="mt-10 grid gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl border border-white/10 bg-white/[0.02] px-5 py-4 text-left">
                            <p class="text-sm font-medium text-zinc-200">Ver servicios</p>
                            <p class="mt-2 text-xs text-zinc-500">Revisa servicios de tala, poda, limpieza y mantenimiento registrados.</p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/[0.02] px-5 py-4 text-left">
                            <p class="text-sm font-medium text-zinc-200">Equipo por rol</p>
                            <p class="mt-2 text-xs text-zinc-500">La interfaz cambia segun seas cliente, personal de campo o administrador.</p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/[0.02] px-5 py-4 text-left">
                            <p class="text-sm font-medium text-zinc-200">Control operativo</p>
                            <p class="mt-2 text-xs text-zinc-500">Sigue el volumen de servicios y la gestion del personal desde un solo panel.</p>
                        </div>
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-3">
                    <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-5 py-4">
                        <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Usuario</p>
                        <p class="mt-2 text-lg font-semibold text-zinc-100">{{ Auth::user()->name }}</p>
                        <p class="text-sm text-zinc-400">{{ Auth::user()->email }}</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-5 py-4">
                        <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Servicios</p>
                        <p class="mt-2 text-3xl font-semibold text-zinc-100">{{ $cantidadServicios }}</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-5 py-4">
                        <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Personal y accesos</p>
                        <p class="mt-2 text-3xl font-semibold text-zinc-100">{{ $cantidadUsuarios }}</p>
                    </div>
                </div>
            </div>
        </section>

        <aside class="rounded-[28px] border border-white/10 bg-[#121214] p-5 shadow-2xl shadow-black/20">
            <div class="flex items-start justify-between gap-4 border-b border-white/10 pb-5">
                <div>
                    <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Atajos</p>
                    <h3 class="mt-2 text-xl font-semibold text-zinc-100">Accesos de gestion</h3>
                </div>
                <span class="rounded-full border border-white/10 bg-white/[0.03] px-3 py-1 text-xs text-zinc-400">Auto</span>
            </div>

            <div class="mt-5 space-y-4">
                @foreach ($elementosMenu as $item)
                    <a href="{{ $item['route'] }}" class="block rounded-2xl border border-white/10 bg-white/[0.03] p-4 transition hover:border-indigo-400/40 hover:bg-indigo-500/5">
                        <p class="text-sm font-semibold text-zinc-100">{{ $item['titulo'] }}</p>
                        <p class="mt-2 text-sm leading-6 text-zinc-400">{{ $item['descripcion'] }}</p>
                    </a>
                @endforeach
            </div>

            <div class="mt-6 rounded-2xl border border-white/10 bg-[#0d0d0f] p-4">
                <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Resumen rapido</p>

                <div class="mt-4 space-y-3 text-sm">
                    <div class="flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.02] px-3 py-3">
                        <span class="text-zinc-400">Rol actual</span>
                        <span class="font-medium text-zinc-100">{{ Auth::user()->role_label }}</span>
                    </div>
                    <div class="flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.02] px-3 py-3">
                        <span class="text-zinc-400">Servicios registrados</span>
                        <span class="font-medium text-zinc-100">{{ $cantidadServicios }}</span>
                    </div>
                    <div class="flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.02] px-3 py-3">
                        <span class="text-zinc-400">Usuarios registrados</span>
                        <span class="font-medium text-zinc-100">{{ $cantidadUsuarios }}</span>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-zinc-500">Servicios</p>
                <h2 class="mt-2 text-3xl font-semibold leading-tight text-zinc-100">
                    Servicios registrados
                </h2>
                <p class="mt-2 text-sm text-zinc-400">
                    Listado de actuaciones de tala, poda, desbroce y mantenimiento con acceso rapido a cada ficha.
                </p>
            </div>

            @if (Auth::user()->hasRole(['empleado', 'administrador']))
                <a href="{{ route('trabajos.create') }}" class="inline-flex items-center rounded-2xl border border-indigo-400/20 bg-indigo-500/10 px-4 py-2 text-sm font-semibold text-indigo-200 transition hover:bg-indigo-500/20">
                    Nuevo servicio
                </a>
            @endif
        </div>
    </x-slot>

    @if (session('status'))
        <div class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
            {{ session('status') }}
        </div>
    @endif

    @if (Auth::user()->hasRole('usuario'))
        <div class="mb-6 rounded-[28px] border border-emerald-400/20 bg-emerald-500/10 px-5 py-5 shadow-lg shadow-black/10">
            <p class="text-xs uppercase tracking-[0.25em] text-emerald-200/70">Reservas online</p>
            <p class="mt-2 text-lg font-semibold text-emerald-100">Puedes reservar cualquier servicio directamente desde las tarjetas de abajo.</p>
            <p class="mt-2 text-sm leading-6 text-emerald-100/80">Indica tu correo, telefono y la hora deseada. Luego consulta el estado en la pestaña Mis reservas.</p>
        </div>
    @else
        <div class="mb-6 rounded-[28px] border border-white/10 bg-[#30442e] px-5 py-5 shadow-lg shadow-black/10">
            <p class="text-xs uppercase tracking-[0.25em] text-white/60">Presupuestos</p>
            <p class="mt-2 text-lg font-semibold text-white">Para solicitar un presupuesto, llama por telefono al <span class="rounded-full bg-white px-3 py-1 text-[#30442e]">000 123 789</span>.</p>
            <p class="mt-2 text-sm leading-6 text-white/80">Este aviso aparece destacado para que el cliente vea de inmediato que los presupuestos se gestionan por telefono.</p>
        </div>
    @endif

    <div class="grid gap-6 xl:grid-cols-[minmax(0,1.25fr)_360px]">
        <section class="rounded-[28px] border border-white/10 bg-[#111114] p-6 shadow-2xl shadow-black/20">
            <div class="mb-6 flex items-center justify-between gap-4">
                <div>
                    <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Listado</p>
                    <h3 class="mt-2 text-lg font-semibold text-zinc-100">Tarjetas de servicios</h3>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-2 text-sm text-zinc-400">
                    {{ $trabajos->total() }} servicios
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-2 2xl:grid-cols-3">
                @forelse ($trabajos as $trabajo)
                    <article class="overflow-hidden rounded-[24px] border border-white/10 bg-[#0b0b0d] transition hover:-translate-y-1 hover:border-indigo-400/30">
                        <img
                            src="{{ $trabajo->imagen_url }}"
                            alt="{{ $trabajo->trabajo }}"
                            class="h-48 w-full object-cover"
                        >

                        <div class="p-5">
                            <div class="flex items-start justify-between gap-4">
                                <h3 class="text-lg font-semibold text-zinc-100">{{ $trabajo->trabajo }}</h3>
                                <span class="rounded-full border border-indigo-400/20 bg-indigo-500/10 px-3 py-1 text-sm font-medium text-indigo-200">
                                    ${{ number_format($trabajo->precio_hora, 2) }}/h
                                </span>
                            </div>

                            <p class="mt-3 text-sm leading-6 text-zinc-400">
                                {{ $trabajo->descripcion }}
                            </p>

                            <div class="mt-4 rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.2em] text-zinc-500">Ubicacion</p>
                                <p class="mt-1 text-sm font-medium text-zinc-200">{{ $trabajo->ubicacion ?? 'Ubicacion pendiente de indicar' }}</p>
                            </div>

                            @if (Auth::user()->hasRole('usuario'))
                                <div class="mt-5">
                                    <a
                                        href="{{ route('reservas.create', $trabajo) }}"
                                        class="inline-flex w-full items-center justify-center rounded-xl border border-emerald-400/20 bg-emerald-500/10 px-4 py-2 text-sm font-medium text-emerald-200 transition hover:bg-emerald-500/20"
                                    >
                                        Reservar servicio
                                    </a>
                                </div>
                            @endif

                            @if (Auth::user()->hasRole(['empleado', 'administrador']))
                                <div class="mt-5 flex items-center justify-end gap-3">
                                    <a
                                        href="{{ route('trabajos.edit', $trabajo) }}"
                                        class="rounded-xl border border-indigo-400/20 bg-indigo-500/10 px-4 py-2 text-sm font-medium text-indigo-200 transition hover:bg-indigo-500/20"
                                    >
                                        Editar servicio
                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ route('trabajos.destroy', $trabajo) }}"
                                        onsubmit="return confirm('¿Seguro que quieres eliminar este servicio?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-xl border border-rose-400/20 bg-rose-500/10 px-4 py-2 text-sm font-medium text-rose-200 transition hover:bg-rose-500/20"
                                        >
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </article>
                @empty
                    <div class="rounded-[24px] border border-white/10 bg-[#0b0b0d] p-6 md:col-span-2 2xl:col-span-3">
                        <p class="text-sm text-zinc-400">
                            Todavia no hay servicios registrados.
                        </p>
                    </div>
                @endforelse
            </div>

            <div class="mt-6 text-zinc-300">
                {{ $trabajos->links() }}
            </div>
        </section>

        <aside class="rounded-[28px] border border-white/10 bg-[#121214] p-5 shadow-2xl shadow-black/20">
            <div class="rounded-2xl border border-white/10 bg-[#0d0d0f] p-4">
                <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Resumen</p>
                <h3 class="mt-2 text-lg font-semibold text-zinc-100">Panel lateral</h3>
                <p class="mt-2 text-sm leading-6 text-zinc-400">
                    Consulta rapidamente el volumen de servicios cargados y accede a nuevas actuaciones del equipo.
                </p>
            </div>

            <div class="mt-5 space-y-3">
                <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-4">
                    <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Servicios visibles</p>
                    <p class="mt-2 text-2xl font-semibold text-zinc-100">{{ $trabajos->total() }}</p>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-4">
                    <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Tu rol</p>
                    <p class="mt-2 text-lg font-semibold text-zinc-100">{{ Auth::user()->role_label }}</p>
                </div>

                <div class="rounded-2xl border border-white/10 bg-[#30442e] px-4 py-4">
                    <p class="text-xs uppercase tracking-[0.25em] text-white/60">Presupuesto</p>
                    <p class="mt-2 text-lg font-semibold text-white">Llamar al 000 123 789</p>
                    <p class="mt-2 text-sm leading-6 text-white/80">Presupuestos y valoraciones por telefono.</p>
                </div>
            </div>

            @if (Auth::user()->hasRole(['empleado', 'administrador']))
                <a href="{{ route('trabajos.create') }}" class="mt-5 block rounded-2xl border border-indigo-400/20 bg-indigo-500/10 px-4 py-4 text-sm font-medium text-indigo-200 transition hover:bg-indigo-500/20">
                    Registrar un nuevo servicio
                </a>
            @endif
        </aside>
    </div>
</x-app-layout>

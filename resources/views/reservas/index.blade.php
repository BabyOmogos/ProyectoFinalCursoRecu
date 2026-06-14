<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-zinc-500">Gestion</p>
            <h2 class="mt-2 text-3xl font-semibold leading-tight text-zinc-100">
                Reservas recibidas
            </h2>
            <p class="mt-2 text-sm text-zinc-400">
                Revisa las solicitudes de los clientes y acepta o rechaza cada reserva.
            </p>
        </div>
    </x-slot>

    @if (session('status'))
        <div class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
            {{ session('status') }}
        </div>
    @endif

    <section class="overflow-hidden rounded-[28px] border border-white/10 bg-[#111114] shadow-2xl shadow-black/20">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-white/10">
                <thead class="bg-[#0d0d0f]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Cliente</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Servicio</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Correo</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Telefono</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Hora</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Estado</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse ($reservas as $reserva)
                        <tr class="transition hover:bg-white/[0.03]">
                            <td class="px-6 py-4 text-sm text-zinc-100">{{ $reserva->user->name }}</td>
                            <td class="px-6 py-4 text-sm text-zinc-100">{{ $reserva->trabajo->trabajo }}</td>
                            <td class="px-6 py-4 text-sm text-zinc-400">{{ $reserva->correo }}</td>
                            <td class="px-6 py-4 text-sm text-zinc-400">{{ $reserva->telefono }}</td>
                            <td class="px-6 py-4 text-sm text-zinc-400">{{ $reserva->hora->format('d/m/Y H:i') }}</td>
                            <td class="px-6 py-4 text-sm">
                                @php
                                    $estadoClases = match ($reserva->estado) {
                                        'aceptada' => 'border-emerald-400/20 bg-emerald-500/10 text-emerald-200',
                                        'rechazada' => 'border-rose-400/20 bg-rose-500/10 text-rose-200',
                                        default => 'border-amber-400/20 bg-amber-500/10 text-amber-200',
                                    };
                                @endphp
                                <span class="inline-flex rounded-full border px-3 py-1 font-medium {{ $estadoClases }}">
                                    {{ $reserva->estado_label }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @if ($reserva->estado === 'pendiente')
                                    <div class="flex flex-wrap gap-2">
                                        <form method="POST" action="{{ route('reservas.aceptar', $reserva) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button
                                                type="submit"
                                                class="rounded-xl border border-emerald-400/20 bg-emerald-500/10 px-4 py-2 text-sm font-medium text-emerald-200 transition hover:bg-emerald-500/20"
                                            >
                                                Aceptar
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ route('reservas.rechazar', $reserva) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button
                                                type="submit"
                                                class="rounded-xl border border-rose-400/20 bg-rose-500/10 px-4 py-2 text-sm font-medium text-rose-200 transition hover:bg-rose-500/20"
                                            >
                                                Rechazar
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-xs text-zinc-500">Resuelta</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-sm text-zinc-400">
                                No hay reservas registradas todavia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="border-t border-white/10 px-6 py-4 text-zinc-300">
            {{ $reservas->links() }}
        </div>
    </section>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-zinc-500">Mis reservas</p>
            <h2 class="mt-2 text-3xl font-semibold leading-tight text-zinc-100">
                Tus reservas
            </h2>
            <p class="mt-2 text-sm text-zinc-400">
                Consulta el estado de las reservas que has solicitado.
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
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Servicio</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Correo</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Telefono</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Hora</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-zinc-500">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse ($reservas as $reserva)
                        <tr class="transition hover:bg-white/[0.03]">
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
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-sm text-zinc-400">
                                Todavia no tienes reservas. Ve a Servicios y reserva una actuacion.
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

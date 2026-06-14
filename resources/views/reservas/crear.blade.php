<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-zinc-500">Reserva</p>
            <h2 class="mt-2 text-3xl font-semibold leading-tight text-zinc-100">
                Reservar servicio
            </h2>
            <p class="mt-2 text-sm text-zinc-400">
                Completa tus datos para solicitar una cita del servicio seleccionado.
            </p>
        </div>
    </x-slot>

    <div class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_360px]">
        <section class="rounded-[28px] border border-white/10 bg-[#111114] p-6 shadow-2xl shadow-black/20">
            <form method="POST" action="{{ route('reservas.store', $trabajo) }}" class="space-y-6">
                @csrf

                <div>
                    <label for="correo" class="text-xs uppercase tracking-[0.2em] text-zinc-500">Correo</label>
                    <input
                        id="correo"
                        type="email"
                        name="correo"
                        value="{{ old('correo', Auth::user()->email) }}"
                        required
                        class="mt-2 block w-full rounded-xl border border-white/10 bg-[#0d0d0f] px-4 py-3 text-sm text-zinc-100 focus:border-indigo-400/50 focus:outline-none"
                    >
                    @error('correo')
                        <p class="mt-2 text-xs text-rose-300">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="telefono" class="text-xs uppercase tracking-[0.2em] text-zinc-500">Telefono</label>
                    <input
                        id="telefono"
                        type="tel"
                        name="telefono"
                        value="{{ old('telefono') }}"
                        required
                        placeholder="600 000 000"
                        class="mt-2 block w-full rounded-xl border border-white/10 bg-[#0d0d0f] px-4 py-3 text-sm text-zinc-100 focus:border-indigo-400/50 focus:outline-none"
                    >
                    @error('telefono')
                        <p class="mt-2 text-xs text-rose-300">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="hora" class="text-xs uppercase tracking-[0.2em] text-zinc-500">Hora de la reserva</label>
                    <input
                        id="hora"
                        type="datetime-local"
                        name="hora"
                        value="{{ old('hora') }}"
                        required
                        class="mt-2 block w-full rounded-xl border border-white/10 bg-[#0d0d0f] px-4 py-3 text-sm text-zinc-100 focus:border-indigo-400/50 focus:outline-none"
                    >
                    @error('hora')
                        <p class="mt-2 text-xs text-rose-300">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap gap-3">
                    <button
                        type="submit"
                        class="rounded-xl border border-indigo-400/20 bg-indigo-500/10 px-5 py-3 text-sm font-semibold text-indigo-200 transition hover:bg-indigo-500/20"
                    >
                        Enviar reserva
                    </button>

                    <a
                        href="{{ route('trabajos.index') }}"
                        class="rounded-xl border border-white/10 bg-white/[0.03] px-5 py-3 text-sm font-medium text-zinc-300 transition hover:bg-white/[0.06]"
                    >
                        Volver a servicios
                    </a>
                </div>
            </form>
        </section>

        <aside class="rounded-[28px] border border-white/10 bg-[#121214] p-5 shadow-2xl shadow-black/20">
            <img
                src="{{ $trabajo->imagen_url }}"
                alt="{{ $trabajo->trabajo }}"
                class="h-48 w-full rounded-2xl object-cover"
            >

            <div class="mt-5">
                <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Servicio</p>
                <h3 class="mt-2 text-xl font-semibold text-zinc-100">{{ $trabajo->trabajo }}</h3>
                <p class="mt-3 text-sm leading-6 text-zinc-400">{{ $trabajo->descripcion }}</p>
            </div>

            <div class="mt-5 rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-4">
                <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Precio</p>
                <p class="mt-2 text-lg font-semibold text-indigo-200">${{ number_format($trabajo->precio_hora, 2) }}/h</p>
            </div>

            <div class="mt-5 rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-4">
                <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Ubicacion</p>
                <p class="mt-2 text-sm text-zinc-200">{{ $trabajo->ubicacion }}</p>
            </div>
        </aside>
    </div>
</x-app-layout>

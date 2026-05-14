<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-zinc-500">Formulario</p>
            <h2 class="mt-2 text-3xl font-semibold leading-tight text-zinc-100">
                {{ $esEdicion ? 'Actualizar servicio' : 'Registrar servicio' }}
            </h2>
            <p class="mt-2 text-sm text-zinc-400">
                {{ $esEdicion ? 'Modifica la informacion del servicio y guarda los cambios.' : 'Da de alta una actuacion de tala, poda, desbroce o mantenimiento de terrenos.' }}
            </p>
        </div>
    </x-slot>

    <div class="grid gap-6 xl:grid-cols-[minmax(0,1.2fr)_340px]">
        <section class="rounded-[28px] border border-white/10 bg-[#111114] p-6 shadow-2xl shadow-black/20">
            <form method="POST" action="{{ $esEdicion ? route('trabajos.update', $trabajo) : route('trabajos.store') }}" class="space-y-6">
                @csrf
                @if ($esEdicion)
                    @method('PATCH')
                @endif

                <div class="grid gap-6 md:grid-cols-2">
                    <div class="md:col-span-2">
                        <label for="trabajo" class="text-sm font-medium text-zinc-200">Servicio</label>
                        <input id="trabajo" name="trabajo" type="text" value="{{ old('trabajo', $trabajo->trabajo) }}" required
                            class="mt-2 block w-full rounded-2xl border border-white/10 bg-[#0b0b0d] px-4 py-3 text-zinc-100 placeholder:text-zinc-500 focus:border-indigo-400/50 focus:outline-none focus:ring-0" />
                        <x-input-error :messages="$errors->get('trabajo')" class="mt-2" />
                    </div>

                    <div>
                        <label for="precio_hora" class="text-sm font-medium text-zinc-200">Precio/hora</label>
                        <input id="precio_hora" name="precio_hora" type="number" step="0.01" min="0" value="{{ old('precio_hora', $trabajo->precio_hora) }}" required
                            class="mt-2 block w-full rounded-2xl border border-white/10 bg-[#0b0b0d] px-4 py-3 text-zinc-100 placeholder:text-zinc-500 focus:border-indigo-400/50 focus:outline-none focus:ring-0" />
                        <x-input-error :messages="$errors->get('precio_hora')" class="mt-2" />
                    </div>

                    <div>
                        <label for="ubicacion" class="text-sm font-medium text-zinc-200">Ubicacion</label>
                        <input id="ubicacion" name="ubicacion" type="text" value="{{ old('ubicacion', $trabajo->ubicacion) }}" required
                            class="mt-2 block w-full rounded-2xl border border-white/10 bg-[#0b0b0d] px-4 py-3 text-zinc-100 placeholder:text-zinc-500 focus:border-indigo-400/50 focus:outline-none focus:ring-0" />
                        <x-input-error :messages="$errors->get('ubicacion')" class="mt-2" />
                    </div>
                </div>

                <div>
                    <label for="imagen" class="text-sm font-medium text-zinc-200">Imagen</label>
                    <input id="imagen" name="imagen" type="text" value="{{ old('imagen', $trabajo->imagen) }}" required
                        class="mt-2 block w-full rounded-2xl border border-white/10 bg-[#0b0b0d] px-4 py-3 text-zinc-100 placeholder:text-zinc-500 focus:border-indigo-400/50 focus:outline-none focus:ring-0" />
                    <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                </div>

                <div>
                    <label for="descripcion" class="text-sm font-medium text-zinc-200">Descripcion del servicio</label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        rows="7"
                        required
                        class="mt-2 block w-full rounded-2xl border border-white/10 bg-[#0b0b0d] px-4 py-3 text-zinc-100 placeholder:text-zinc-500 focus:border-indigo-400/50 focus:outline-none focus:ring-0"
                    >{{ old('descripcion', $trabajo->descripcion) }}</textarea>
                    <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                </div>

                <div class="flex flex-wrap items-center justify-end gap-3">
                    <a href="{{ route('trabajos.index') }}" class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-3 text-sm font-medium text-zinc-300 transition hover:bg-white/[0.06]">
                        Cancelar
                    </a>

                    <button type="submit" class="rounded-2xl border border-indigo-400/20 bg-indigo-500/10 px-5 py-3 text-sm font-semibold text-indigo-200 transition hover:bg-indigo-500/20">
                        {{ $esEdicion ? 'Actualizar servicio' : 'Guardar servicio' }}
                    </button>
                </div>
            </form>
        </section>

        <aside class="rounded-[28px] border border-white/10 bg-[#121214] p-5 shadow-2xl shadow-black/20">
            <div class="rounded-2xl border border-white/10 bg-[#0d0d0f] p-4">
                <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Ayuda</p>
                <h3 class="mt-2 text-lg font-semibold text-zinc-100">Recomendaciones</h3>
                <p class="mt-2 text-sm leading-6 text-zinc-400">
                    {{ $esEdicion ? 'Revisa la imagen, el precio por hora y la descripcion antes de guardar los cambios del servicio.' : 'Describe claramente si el servicio es una tala, una poda, un desbroce o un mantenimiento y especifica bien el precio por hora.' }}
                </p>
            </div>

            <div class="mt-5 space-y-3">
                <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-4">
                    <p class="text-sm font-medium text-zinc-200">Campo imagen</p>
                    <p class="mt-2 text-sm leading-6 text-zinc-400">Puedes usar una foto del servicio, de la maquinaria o del terreno para identificar mejor la actuacion.</p>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-4">
                    <p class="text-sm font-medium text-zinc-200">Ubicacion visible</p>
                    <p class="mt-2 text-sm leading-6 text-zinc-400">Indica el parque, barrio, finca, comunidad o zona donde se realiza el servicio para que se vea al revisar las tarjetas.</p>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-4">
                    <p class="text-sm font-medium text-zinc-200">Rol requerido</p>
                    <p class="mt-2 text-sm leading-6 text-zinc-400">Solo empleados y administradores pueden registrar nuevos servicios del equipo.</p>
                </div>
            </div>
        </aside>
    </div>
</x-app-layout>

<x-guest-layout>
    <div class="mb-6 border-b border-[#e6ecdf] pb-5">
        <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">Confirmacion</p>
        <h2 class="mt-2 text-2xl font-semibold text-[#30442e]">Confirma tu contrasena</h2>
        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">
            Esta es una zona protegida del proyecto. Introduce tu contrasena para continuar con la accion solicitada.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div>
            <x-input-label for="password" value="Contrasena" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                Confirmar
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

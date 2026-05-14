<x-guest-layout>
    <div class="mb-6 border-b border-[#e6ecdf] pb-5">
        <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">Recuperacion de acceso</p>
        <h2 class="mt-2 text-2xl font-semibold text-[#30442e]">Restablece tu contrasena</h2>
        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">
            Si estas probando la demo y no recuerdas la contrasena, escribe tu correo electronico y te enviaremos un enlace para recuperarla.
        </p>
    </div>

    <!-- Estado de la sesion -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <x-input-label for="email" value="Correo electronico" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                Enviar enlace para restablecer contrasena
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

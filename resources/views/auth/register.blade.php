<x-guest-layout>
    <div class="mb-6 border-b border-[#e6ecdf] pb-5">
        <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">Registro</p>
        <h2 class="mt-2 text-2xl font-semibold text-[#30442e]">Crear acceso de demostracion</h2>
        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">
            Crea una cuenta de prueba para revisar la experiencia de acceso y la parte interna del proyecto desde un perfil de usuario.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" value="Nombre" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" value="Correo electronico" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Contrasena" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <p class="mt-2 text-xs text-[#7f8f79]">Minimo 6 caracteres.</p>
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Confirmar contrasena" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-[#5d6f58] hover:text-[#30442e] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#6b8f5d]" href="{{ route('login') }}">
                Ya tienes cuenta?
            </a>

            <button type="submit" class="ms-4 rounded-full bg-[#6b8f5d] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#59794d]">
                Registrarme
            </button>
        </div>

        <p class="mt-4 text-sm text-[#5d6f58]">
            Las cuentas creadas desde este formulario se registran con el rol de usuario.
        </p>
    </form>
</x-guest-layout>

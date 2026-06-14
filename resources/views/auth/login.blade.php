<x-guest-layout>
    <!-- Estado de la sesion -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6 border-b border-[#e6ecdf] pb-5">
        <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">Acceso privado</p>
        <h2 class="mt-2 text-2xl font-semibold text-[#30442e]">Entra a la demo del panel</h2>
        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">
            Accede para revisar la parte interna del proyecto, ver los servicios cargados y comprobar el flujo completo de gestion.
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" value="Correo electronico" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Contrasena" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-[#5d6f58]">Recordarme</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-[#5d6f58] hover:text-[#30442e] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#6b8f5d]" href="{{ route('password.request') }}">
                    Olvidaste tu contrasena?
                </a>
            @endif

            <button type="submit" class="ms-3 rounded-full bg-[#6b8f5d] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#59794d]">
                Entrar
            </button>
        </div>
    </form>

    <div class="mt-6 rounded-3xl border border-[#e6ecdf] bg-[#f7faf4] p-4">
        <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">Accesos de demostracion</p>
        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">Si estas revisando el proyecto como muestra o entrega, puedes entrar con cualquiera de estos perfiles de prueba.</p>
        <div class="mt-3 space-y-3 text-sm text-[#5d6f58]">
            <div class="rounded-2xl border border-white bg-white px-3 py-3">
                <p class="font-medium text-[#30442e]">Administrador</p>
                <p class="mt-1">admin@proyecto.test / contrasena</p>
            </div>
            <div class="rounded-2xl border border-white bg-white px-3 py-3">
                <p class="font-medium text-[#30442e]">Empleado</p>
                <p class="mt-1">empleado@proyecto.test / contrasena</p>
            </div>
            <div class="rounded-2xl border border-white bg-white px-3 py-3">
                <p class="font-medium text-[#30442e]">Usuario</p>
                <p class="mt-1">usuario@proyecto.test / contrasena</p>
            </div>
        </div>
    </div>
</x-guest-layout>

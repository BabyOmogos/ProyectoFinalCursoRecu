<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600;playfair-display:600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#f6f2e9] font-sans text-[#30442e] antialiased">
        <div class="min-h-screen">
            <div class="border-b border-[#dde5d8] bg-[#edf4e7]">
                <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-3 text-sm sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <p class="text-[#5d6f58]">Tala, poda, desbroce y mantenimiento de terrenos en un mismo proyecto.</p>
                    <div class="flex flex-wrap gap-4 text-[#5d6f58]">
                        <span>Atencion personalizada</span>
                        <span>Presupuestos sin compromiso</span>
                    </div>
                </div>
            </div>

            <header class="sticky top-0 z-20 border-b border-[#e5ebdf] bg-white/90 backdrop-blur">
                <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-4 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
                    <a href="/" class="flex items-center gap-3">
                        <div class="grid h-12 w-12 place-items-center rounded-full bg-[#6b8f5d] text-base font-semibold text-white">
                            PFC
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">Inicio</p>
                            <h1 class="text-lg font-semibold text-[#30442e]">Proyecto Final de Curso</h1>
                        </div>
                    </a>

                    <nav class="flex flex-wrap items-center gap-3 text-sm text-[#5d6f58]">
                        <a href="#inicio" class="transition hover:text-[#30442e]">Inicio</a>
                        <a href="#servicios" class="transition hover:text-[#30442e]">Servicios</a>
                        <a href="#contacto" class="transition hover:text-[#30442e]">Contacto</a>
                    </nav>

                    <div class="flex flex-wrap items-center gap-3">
                        @auth
                            <a href="{{ route('dashboard') }}" class="rounded-full bg-[#30442e] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#253621]">
                                Ir al panel
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-full border border-[#c8d5c2] px-5 py-2.5 text-sm font-medium text-[#30442e] transition hover:bg-[#f4f8f1]">
                                Iniciar sesion
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-full bg-[#6b8f5d] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#59794d]">
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </header>

            <main>
                <section id="inicio" class="relative overflow-hidden">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(107,143,93,0.18),_transparent_30%)]"></div>
                    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[minmax(0,1.15fr)_420px] lg:px-8 lg:py-24">
                        <div class="relative">
                            <p class="text-sm uppercase tracking-[0.3em] text-[#7f8f79]">Empresa de jardineria y mantenimiento exterior</p>
                            <h2 class="mt-5 max-w-3xl font-['Playfair_Display'] text-4xl leading-tight text-[#21321f] sm:text-5xl lg:text-6xl">
                                Tala, poda y mantenimiento profesional de jardines, fincas y terrenos.
                            </h2>
                            <p class="mt-6 max-w-2xl text-base leading-8 text-[#5d6f58]">
                                Presenta tus servicios de jardineria con un tono mas profesional: tala controlada, poda en altura, desbroce de parcelas, limpieza de fincas y mantenimiento continuado de zonas verdes.
                            </p>

                            <div class="mt-8 flex flex-wrap gap-4">
                                <a href="#servicios" class="rounded-full bg-[#6b8f5d] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#59794d]">
                                    Ver servicios
                                </a>
                                <a href="#contacto" class="rounded-full border border-[#c8d5c2] px-6 py-3 text-sm font-semibold text-[#30442e] transition hover:bg-white">
                                    Solicitar informacion
                                </a>
                            </div>

                            <div class="mt-10 grid gap-4 md:grid-cols-2">
                                <article class="rounded-[28px] bg-white p-6 shadow-[0_20px_40px_rgba(48,68,46,0.08)]">
                                    <p class="text-xs uppercase tracking-[0.3em] text-[#7f8f79]">Poda y mantenimiento</p>
                                    <h3 class="mt-3 text-2xl font-semibold text-[#30442e]">Cuidamos jardines, setos y arbolado ornamental.</h3>
                                    <p class="mt-3 text-sm leading-7 text-[#5d6f58]">
                                        Gestiona podas de formacion, recorte de setos, mantenimiento de parcelas y revisiones periodicas con una presentacion mucho mas comercial.
                                    </p>
                                </article>

                                <article class="rounded-[28px] bg-[#30442e] p-6 text-white shadow-[0_20px_40px_rgba(48,68,46,0.18)]">
                                    <p class="text-xs uppercase tracking-[0.3em] text-white/70">Tala y desbroce</p>
                                    <h3 class="mt-3 text-2xl font-semibold">Actuaciones seguras en fincas, terrenos y zonas de paso.</h3>
                                    <p class="mt-3 text-sm leading-7 text-white/80">
                                        Una estructura ideal para mostrar servicios de tala controlada, retirada de restos, limpieza de parcelas y mantenimiento de terrenos durante todo el ano.
                                    </p>
                                </article>
                            </div>
                        </div>

                        <aside class="relative rounded-[36px] bg-[linear-gradient(180deg,_rgba(255,255,255,0.96),_rgba(238,245,232,0.94))] p-6 shadow-[0_24px_60px_rgba(48,68,46,0.12)]">
                            <div class="rounded-[30px] bg-[#f6faf2] p-6">
                                <p class="text-xs uppercase tracking-[0.3em] text-[#7f8f79]">Servicios destacados</p>
                                <div class="mt-5 space-y-4">
                                    <div class="rounded-3xl bg-white p-5">
                                        <h3 class="text-lg font-semibold text-[#30442e]">Tala controlada</h3>
                                        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">Trabajos de corte seguro, retirada de restos y acondicionamiento posterior de la zona.</p>
                                    </div>
                                    <div class="rounded-3xl bg-white p-5">
                                        <h3 class="text-lg font-semibold text-[#30442e]">Poda en altura</h3>
                                        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">Mantenimiento de arbolado, setos y vegetacion con medios y personal especializado.</p>
                                    </div>
                                    <div class="rounded-3xl bg-white p-5">
                                        <h3 class="text-lg font-semibold text-[#30442e]">Mantenimiento de terrenos</h3>
                                        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">Desbroce, limpieza y control periodico de parcelas, fincas y zonas verdes.</p>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </section>

                <section id="servicios" class="bg-white py-16 lg:py-24">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="max-w-3xl">
                            <p class="text-sm uppercase tracking-[0.3em] text-[#7f8f79]">Servicios</p>
                            <h2 class="mt-4 font-['Playfair_Display'] text-4xl text-[#21321f]">Servicios pensados para una empresa de jardineria y mantenimiento exterior.</h2>
                            <p class="mt-4 text-base leading-8 text-[#5d6f58]">
                                La portada ahora transmite mejor el trabajo real de una empresa que actua en jardines, fincas y terrenos: mensajes claros, servicios bien diferenciados y una llamada a la accion directa.
                            </p>
                        </div>

                        <div class="mt-8 rounded-[28px] bg-[#30442e] p-6 text-white shadow-[0_20px_40px_rgba(48,68,46,0.18)]">
                            <p class="text-xs uppercase tracking-[0.3em] text-white/60">Presupuestos por telefono</p>
                            <p class="mt-3 text-2xl font-semibold">Para pedir presupuesto, es necesario llamar al <span class="rounded-full bg-white px-3 py-1 text-[#30442e]">000 123 789</span>.</p>
                            <p class="mt-3 text-sm leading-7 text-white/80">De esta forma podemos valorar mejor el trabajo, la ubicacion del servicio y las necesidades concretas antes de preparar la propuesta.</p>
                        </div>

                        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                            <article class="rounded-[28px] bg-[#f6faf2] p-6">
                                <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">01</p>
                                <h3 class="mt-4 text-2xl font-semibold text-[#30442e]">Tala controlada</h3>
                                <p class="mt-3 text-sm leading-7 text-[#5d6f58]">Retirada segura de arbolado, limpieza de restos y acondicionamiento del terreno.</p>
                            </article>
                            <article class="rounded-[28px] bg-[#f6faf2] p-6">
                                <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">02</p>
                                <h3 class="mt-4 text-2xl font-semibold text-[#30442e]">Poda y desrame</h3>
                                <p class="mt-3 text-sm leading-7 text-[#5d6f58]">Poda de seguridad, formacion, altura y mejora estetica de arboles y setos.</p>
                            </article>
                            <article class="rounded-[28px] bg-[#f6faf2] p-6">
                                <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">03</p>
                                <h3 class="mt-4 text-2xl font-semibold text-[#30442e]">Desbroce de parcelas</h3>
                                <p class="mt-3 text-sm leading-7 text-[#5d6f58]">Limpieza de fincas, terrenos rusticos, solares y zonas de dificil acceso.</p>
                            </article>
                            <article class="rounded-[28px] bg-[#f6faf2] p-6">
                                <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">04</p>
                                <h3 class="mt-4 text-2xl font-semibold text-[#30442e]">Mantenimiento continuo</h3>
                                <p class="mt-3 text-sm leading-7 text-[#5d6f58]">Planes periodicos para jardines, comunidades, parcelas y accesos exteriores.</p>
                            </article>
                        </div>
                    </div>
                </section>

                <section id="contacto" class="bg-[#edf4e7] py-16 lg:py-24">
                    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[minmax(0,1fr)_380px] lg:px-8">
                        <div class="rounded-[32px] bg-white p-8 shadow-[0_24px_60px_rgba(48,68,46,0.10)]">
                            <p class="text-sm uppercase tracking-[0.3em] text-[#7f8f79]">Contacto</p>
                            <h2 class="mt-4 font-['Playfair_Display'] text-4xl text-[#21321f]">Solicita informacion para tu jardin, finca o terreno.</h2>
                            <p class="mt-4 max-w-2xl text-sm leading-8 text-[#5d6f58]">
                                Cierra la portada con una llamada clara a la accion para presupuestos de tala, poda, desbroce, limpieza y mantenimiento continuado.
                            </p>

                            <div class="mt-8 grid gap-4 md:grid-cols-2">
                                <div class="rounded-3xl bg-[#f7faf4] p-5">
                                    <p class="text-sm font-semibold text-[#30442e]">Telefono</p>
                                    <p class="mt-2 text-lg font-semibold text-[#30442e]">000 123 789</p>
                                    <p class="mt-2 text-sm text-[#5d6f58]">Para solicitar presupuesto, llama directamente por telefono.</p>
                                </div>
                                <div class="rounded-3xl bg-[#f7faf4] p-5">
                                    <p class="text-sm font-semibold text-[#30442e]">Correo electronico</p>
                                    <p class="mt-2 text-lg font-semibold text-[#30442e]">presupuestos@jardineria-pfc.test</p>
                                    <p class="mt-2 text-sm text-[#5d6f58]">Correo de contacto general para consultas no urgentes y seguimiento de servicios.</p>
                                </div>
                            </div>
                        </div>

                        <aside class="rounded-[32px] bg-[#30442e] p-8 text-white shadow-[0_24px_60px_rgba(48,68,46,0.18)]">
                            <p class="text-sm uppercase tracking-[0.3em] text-white/60">Accion</p>
                            <h3 class="mt-4 text-3xl font-semibold">Empieza a gestionar tus servicios</h3>
                            <p class="mt-4 text-sm leading-7 text-white/80">
                                Accede al sistema para revisar servicios, registrar nuevas actuaciones y organizar al equipo segun el rol.
                            </p>

                            <div class="mt-8 space-y-3">
                                @auth
                                    <a href="{{ route('dashboard') }}" class="block rounded-full bg-white px-5 py-3 text-center text-sm font-semibold text-[#30442e] transition hover:bg-[#edf4e7]">
                                        Ir al dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="block rounded-full bg-white px-5 py-3 text-center text-sm font-semibold text-[#30442e] transition hover:bg-[#edf4e7]">
                                        Iniciar sesion
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="block rounded-full border border-white/30 px-5 py-3 text-center text-sm font-semibold text-white transition hover:bg-white/10">
                                            Crear cuenta
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        </aside>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>

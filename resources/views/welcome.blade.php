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
                    <p class="text-[#5d6f58]">Especialistas en tala, poda, desbroce y mantenimiento de jardines y terrenos.</p>
                    <div class="flex flex-wrap gap-4 text-[#5d6f58]">
                        <span>Atencion personalizada</span>
                        <span>Presupuestos sin compromiso</span>
                    </div>
                </div>
            </div>

            <header class="sticky top-0 z-20 border-b border-[#e5ebdf] bg-white/90 backdrop-blur">
                <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-4 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
                    <a href="/" class="flex items-center">
                        <x-application-logo class="h-16 w-auto sm:h-[4.5rem]" />
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
                            <p class="text-sm uppercase tracking-[0.3em] text-[#7f8f79]">Jardineria y mantenimiento exterior</p>
                            <h2 class="mt-5 max-w-3xl font-['Playfair_Display'] text-4xl leading-tight text-[#21321f] sm:text-5xl lg:text-6xl">
                                Cuidamos tu jardin, finca y terreno con trabajo profesional y seguro.
                            </h2>
                            <p class="mt-6 max-w-2xl text-base leading-8 text-[#5d6f58]">
                                Llevamos anos realizando tala controlada, poda en altura, desbroce de parcelas y mantenimiento de zonas verdes para particulares, comunidades y empresas. Trabajamos con planificacion, limpieza del entorno y materiales adecuados en cada intervencion.
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
                                    <h3 class="mt-3 text-2xl font-semibold text-[#30442e]">Jardines, setos y arbolado siempre en buen estado.</h3>
                                    <p class="mt-3 text-sm leading-7 text-[#5d6f58]">
                                        Realizamos podas de formacion, recorte de setos y revisiones periodicas para mantener espacios verdes ordenados, sanos y con buena presencia durante todo el ano.
                                    </p>
                                </article>

                                <article class="rounded-[28px] bg-[#30442e] p-6 text-white shadow-[0_20px_40px_rgba(48,68,46,0.18)]">
                                    <p class="text-xs uppercase tracking-[0.3em] text-white/70">Tala y desbroce</p>
                                    <h3 class="mt-3 text-2xl font-semibold">Intervenciones seguras en fincas y terrenos de dificil acceso.</h3>
                                    <p class="mt-3 text-sm leading-7 text-white/80">
                                        Ejecutamos tala controlada, retirada de restos y limpieza de parcelas con protocolos de seguridad y equipamiento profesional adaptado a cada tipo de terreno.
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
                                        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">Corte seguro de arbolado, retirada de restos y acondicionamiento posterior de la zona de trabajo.</p>
                                    </div>
                                    <div class="rounded-3xl bg-white p-5">
                                        <h3 class="text-lg font-semibold text-[#30442e]">Poda en altura</h3>
                                        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">Mantenimiento de arboles, setos y vegetacion con personal cualificado y medios de elevacion.</p>
                                    </div>
                                    <div class="rounded-3xl bg-white p-5">
                                        <h3 class="text-lg font-semibold text-[#30442e]">Mantenimiento de terrenos</h3>
                                        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">Desbroce, limpieza y control periodico de parcelas, fincas y accesos exteriores.</p>
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
                            <h2 class="mt-4 font-['Playfair_Display'] text-4xl text-[#21321f]">Soluciones completas para el cuidado de espacios verdes.</h2>
                            <p class="mt-4 text-base leading-8 text-[#5d6f58]">
                                Ofrecemos un abanico de servicios para jardines particulares, fincas rusticas, zonas urbanas y espacios que requieren mantenimiento continuado. Cada actuacion se adapta al tipo de vegetacion, al acceso del terreno y a las necesidades del cliente.
                            </p>
                        </div>

                        <div class="mt-8 rounded-[28px] bg-[#30442e] p-6 text-white shadow-[0_20px_40px_rgba(48,68,46,0.18)]">
                            <p class="text-xs uppercase tracking-[0.3em] text-white/60">Presupuestos</p>
                            <p class="mt-3 text-2xl font-semibold">Para solicitar presupuesto, llama al <span class="rounded-full bg-white px-3 py-1 text-[#30442e]">000 123 789</span>.</p>
                            <p class="mt-3 text-sm leading-7 text-white/80">Asi podemos valorar el trabajo, la ubicacion del servicio y las necesidades concretas antes de preparar la propuesta.</p>
                        </div>

                        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                            <article class="rounded-[28px] bg-[#f6faf2] p-6">
                                <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">01</p>
                                <h3 class="mt-4 text-2xl font-semibold text-[#30442e]">Tala controlada</h3>
                                <p class="mt-3 text-sm leading-7 text-[#5d6f58]">Retirada segura de arbolado, limpieza de restos y acondicionamiento del terreno tras la intervencion.</p>
                            </article>
                            <article class="rounded-[28px] bg-[#f6faf2] p-6">
                                <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">02</p>
                                <h3 class="mt-4 text-2xl font-semibold text-[#30442e]">Poda y desrame</h3>
                                <p class="mt-3 text-sm leading-7 text-[#5d6f58]">Poda de seguridad, formacion, altura y mejora estetica de arboles, setos y palmeras.</p>
                            </article>
                            <article class="rounded-[28px] bg-[#f6faf2] p-6">
                                <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">03</p>
                                <h3 class="mt-4 text-2xl font-semibold text-[#30442e]">Desbroce de parcelas</h3>
                                <p class="mt-3 text-sm leading-7 text-[#5d6f58]">Limpieza de fincas, terrenos rusticos, solares y zonas con vegetacion descontrolada.</p>
                            </article>
                            <article class="rounded-[28px] bg-[#f6faf2] p-6">
                                <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">04</p>
                                <h3 class="mt-4 text-2xl font-semibold text-[#30442e]">Mantenimiento continuo</h3>
                                <p class="mt-3 text-sm leading-7 text-[#5d6f58]">Planes periodicos para jardines, comunidades, parcelas y accesos exteriores durante todo el ano.</p>
                            </article>
                        </div>
                    </div>
                </section>

                <section class="bg-[#f6faf2] py-16 lg:py-24">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="max-w-3xl">
                            <p class="text-sm uppercase tracking-[0.3em] text-[#7f8f79]">Por que elegirnos</p>
                            <h2 class="mt-4 font-['Playfair_Display'] text-4xl text-[#21321f]">Experiencia, seguridad y compromiso en cada trabajo.</h2>
                            <p class="mt-4 text-base leading-8 text-[#5d6f58]">
                                Nos comprometemos con la calidad del resultado, el respeto por el entorno y la puntualidad en cada servicio. Valoramos cada espacio verde como propio y trabajamos para dejarlo limpio, seguro y listo para su uso habitual.
                            </p>
                        </div>

                        <ul class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                            <li class="rounded-3xl bg-white p-5 shadow-[0_12px_30px_rgba(48,68,46,0.06)]">
                                <p class="text-sm font-semibold text-[#30442e]">Equipo especializado</p>
                                <p class="mt-2 text-sm text-[#5d6f58]">Personal formado en poda, tala y mantenimiento de exteriores.</p>
                            </li>
                            <li class="rounded-3xl bg-white p-5 shadow-[0_12px_30px_rgba(48,68,46,0.06)]">
                                <p class="text-sm font-semibold text-[#30442e]">Trabajo ordenado</p>
                                <p class="mt-2 text-sm text-[#5d6f58]">Retirada de restos y limpieza final incluida en cada intervencion.</p>
                            </li>
                            <li class="rounded-3xl bg-white p-5 shadow-[0_12px_30px_rgba(48,68,46,0.06)]">
                                <p class="text-sm font-semibold text-[#30442e]">Servicios a medida</p>
                                <p class="mt-2 text-sm text-[#5d6f58]">Actuaciones puntuales o planes de mantenimiento segun tus necesidades.</p>
                            </li>
                            <li class="rounded-3xl bg-white p-5 shadow-[0_12px_30px_rgba(48,68,46,0.06)]">
                                <p class="text-sm font-semibold text-[#30442e]">Cobertura local</p>
                                <p class="mt-2 text-sm text-[#5d6f58]">Atendemos jardines, fincas y terrenos en la zona con rapidez y cercania.</p>
                            </li>
                        </ul>
                    </div>
                </section>

                <section id="contacto" class="bg-[#edf4e7] py-16 lg:py-24">
                    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[minmax(0,1fr)_380px] lg:px-8">
                        <div class="rounded-[32px] bg-white p-8 shadow-[0_24px_60px_rgba(48,68,46,0.10)]">
                            <p class="text-sm uppercase tracking-[0.3em] text-[#7f8f79]">Contacto</p>
                            <h2 class="mt-4 font-['Playfair_Display'] text-4xl text-[#21321f]">Solicita informacion para tu jardin, finca o terreno.</h2>
                            <p class="mt-4 max-w-2xl text-sm leading-8 text-[#5d6f58]">
                                Estamos a tu disposicion para presupuestos de tala, poda, desbroce, limpieza y mantenimiento continuado. Contactanos por telefono o correo y te atenderemos lo antes posible.
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
                                    <p class="mt-2 text-sm text-[#5d6f58]">Correo de contacto general para consultas y seguimiento de servicios.</p>
                                </div>
                            </div>
                        </div>

                        <aside class="rounded-[32px] bg-[#30442e] p-8 text-white shadow-[0_24px_60px_rgba(48,68,46,0.18)]">
                            <p class="text-sm uppercase tracking-[0.3em] text-white/60">Area de clientes</p>
                            <h3 class="mt-4 text-3xl font-semibold">Accede a tu panel</h3>
                                <p class="mt-4 text-sm leading-7 text-white/80">
                                    Si ya eres cliente o formas parte del equipo, accede al panel para revisar servicios, gestionar actuaciones y consultar la informacion actualizada.
                                </p>

                                <div class="mt-8 space-y-3">
                                    @auth
                                        <a href="{{ route('dashboard') }}" class="block rounded-full bg-white px-5 py-3 text-center text-sm font-semibold text-[#30442e] transition hover:bg-[#edf4e7]">
                                            Ir al panel
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

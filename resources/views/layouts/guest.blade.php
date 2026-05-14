<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600;playfair-display:600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#f5f1e8] font-sans text-[#30442e] antialiased">
        <div class="min-h-screen bg-[linear-gradient(180deg,_rgba(224,237,220,0.75),_rgba(245,241,232,1))] px-4 py-6 sm:px-6 lg:px-8">
            <div class="mx-auto grid min-h-[calc(100vh-3rem)] max-w-[1400px] gap-6 xl:grid-cols-[minmax(0,1.2fr)_430px]">
                <section class="overflow-hidden rounded-[32px] border border-[#d6dece] bg-white shadow-[0_24px_60px_rgba(48,68,46,0.12)]">
                    <div class="grid h-full lg:grid-rows-[auto_1fr]">
                        <div class="border-b border-[#e6ecdf] bg-[#eff5ea] px-8 py-6">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="grid h-14 w-14 place-items-center rounded-full bg-[#6b8f5d] text-base font-semibold text-white">
                                        PFC
                                    </div>

                                    <div>
                                        <p class="text-xs uppercase tracking-[0.3em] text-[#7f8f79]">Presentacion comercial</p>
                                        <h1 class="mt-1 text-2xl font-semibold text-[#30442e]">Jardineria y mantenimiento exterior</h1>
                                    </div>
                                </div>

                                <div class="flex flex-wrap gap-2 text-xs font-medium text-[#5d6f58]">
                                    <span class="rounded-full border border-[#d3dec9] bg-white px-3 py-1.5">Presupuesto por telefono</span>
                                    <span class="rounded-full border border-[#d3dec9] bg-white px-3 py-1.5">Trabajos reales</span>
                                    <span class="rounded-full border border-[#d3dec9] bg-white px-3 py-1.5">Imagen profesional</span>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-8 p-8 lg:grid-cols-[minmax(0,1fr)_300px]">
                            <div class="flex flex-col gap-8">
                                <div>
                                    <p class="text-sm uppercase tracking-[0.3em] text-[#7f8f79]">Contacto</p>
                                    <h2 class="mt-4 max-w-3xl font-['Playfair_Display'] text-4xl leading-tight text-[#21321f] lg:text-5xl">
                                        Contacto directo para presupuestos y seguimiento.
                                    </h2>
                                    <p class="mt-5 max-w-2xl text-sm leading-8 text-[#5d6f58]">
                                        Si estas revisando el proyecto o quieres solicitar informacion, aqui tienes una forma clara de contacto con telefono y correo visibles desde el primer vistazo.
                                    </p>

                                    <div class="mt-8 grid gap-4 md:grid-cols-2">
                                        <div class="rounded-[28px] border border-[#dfe7d8] bg-[#f7faf4] p-5 shadow-[0_20px_40px_rgba(72,99,68,0.08)]">
                                            <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">Telefono</p>
                                            <div class="mt-4 rounded-[24px] px-5 py-4 text-center" style="background-color: #486344; border: 1px solid #557351; box-shadow: 0 16px 32px rgba(72, 99, 68, 0.20);">
                                                <p class="text-xs uppercase tracking-[0.25em]" style="color: rgba(255, 255, 255, 0.78);">Llamar ahora</p>
                                                <p class="mt-2 text-3xl font-bold tracking-[0.08em] sm:text-4xl" style="color: #ffffff;">000 123 789</p>
                                            </div>
                                            <p class="mt-3 text-sm leading-6 text-[#5d6f58]">Llamadas para presupuestos, seguimiento de trabajos y consultas generales.</p>
                                            <p class="mt-4 inline-flex rounded-full bg-[#e7f0e3] px-3 py-1 text-xs font-semibold text-[#486344]">Los presupuestos se gestionan por telefono</p>
                                        </div>

                                        <div class="rounded-[28px] border border-[#dfe7d8] bg-[#f7faf4] p-5">
                                            <p class="text-xs uppercase tracking-[0.25em] text-[#7f8f79]">Correo electronico</p>
                                            <p class="mt-3 text-lg font-semibold text-[#30442e]">presupuestos@jardineria-pfc.test</p>
                                            <p class="mt-3 text-sm leading-6 text-[#5d6f58]">Canal para seguimiento, documentacion y consultas no urgentes.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid gap-4 md:grid-cols-3">
                                    <div class="rounded-3xl bg-[#f7faf4] p-5">
                                        <p class="text-sm font-semibold text-[#30442e]">Poda en altura</p>
                                        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">Trabajos con medios de elevacion, seguridad y retirada de restos en zonas urbanas y privadas.</p>
                                    </div>

                                    <div class="rounded-3xl bg-[#f7faf4] p-5">
                                        <p class="text-sm font-semibold text-[#30442e]">Desbroce y limpieza</p>
                                        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">Actuaciones en parcelas, fincas y solares para mantenimiento preventivo y mejora visual del entorno.</p>
                                    </div>

                                    <div class="rounded-3xl bg-[#f7faf4] p-5">
                                        <p class="text-sm font-semibold text-[#30442e]">Mantenimiento continuo</p>
                                        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">Servicios periodicos para comunidades, jardines y espacios verdes con imagen cuidada y seguimiento.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-[28px] bg-[linear-gradient(180deg,_rgba(107,143,93,0.16),_rgba(255,255,255,0.9))] p-6">
                                <p class="text-xs uppercase tracking-[0.3em] text-[#7f8f79]">Aspectos destacados</p>
                                <div class="mt-4 space-y-4">
                                    <div class="rounded-2xl border border-white/70 bg-white/80 p-4">
                                        <p class="text-sm font-semibold text-[#30442e]">Imagen mas comercial</p>
                                        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">El acceso transmite mejor un proyecto vendible, coherente con la portada publica y con los servicios reales cargados.</p>
                                    </div>
                                    <div class="rounded-2xl border border-white/70 bg-white/80 p-4">
                                        <p class="text-sm font-semibold text-[#30442e]">Presupuesto bien marcado</p>
                                        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">El telefono queda visible desde el primer vistazo para reforzar la captacion de consultas y valoraciones.</p>
                                    </div>
                                    <div class="rounded-2xl border border-white/70 bg-white/80 p-4">
                                        <p class="text-sm font-semibold text-[#30442e]">Demo lista para enseñar</p>
                                        <p class="mt-2 text-sm leading-6 text-[#5d6f58]">Queda preparada para presentar el trabajo a clientes, profesorado o posibles compradores sin sensacion de maqueta incompleta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="flex items-center">
                    <div class="w-full rounded-[32px] border border-[#d6dece] bg-white p-6 shadow-[0_24px_60px_rgba(48,68,46,0.12)]">
                        {{ $slot }}
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>

<x-layout title="Hoje • Loggher">

    @if(auth()->check())
        <div class="max-w-5xl mx-auto px-6 pt-10 text-center">
            <p class="text-lg text-[#071013]/70">
                Bem-vindo(a) à sua dashboard,
                <span class="font-semibold">{{ auth()->user()->name }}</span>!
            </p>
        </div>
    @endif

    <x-dashboard-nav />

    <section class="max-w-5xl mx-auto px-6 mt-10 pb-24">

        {{-- Data atual --}}
        <div class="mb-10 text-center">
            <h2 class="text-3xl font-bold text-[#071013]">
                {{ now()->format('d/m/Y') }}
            </h2>
            <p class="text-sm text-[#071013]/60 mt-2">
                Marque os hábitos que você já completou hoje.
            </p>
        </div>

        {{-- Listagem --}}
        <ul class="space-y-6">

            @forelse ($habits as $item)

                <li class="p-6 rounded-xl bg-white/40 border border-[#071013]/10 shadow-sm">

                    <div class="flex items-center justify-between">

                        {{-- Nome do hábito --}}
                        <div>
                            <p class="text-lg font-semibold text-[#071013]">
                                {{ $item->name }}
                            </p>

                            <p class="text-sm text-[#071013]/60 mt-1">
                                Criado em {{ $item->created_at->format('d-m-Y') }}
                            </p>
                        </div>

                        {{-- Checkbox (sem lógica por enquanto) --}}
                        <div>
                            <input
                                type="checkbox"
                                disabled
                                class="w-5 h-5 rounded border-[#071013]/30
                                       text-[#8c2f39] focus:ring-[#8c2f39]">
                        </div>

                    </div>

                </li>

            @empty

                <div class="p-10 rounded-xl bg-white/40 border border-[#071013]/10 text-center">

                    <p class="text-[#071013]/70">
                        Você ainda não cadastrou nenhum hábito.
                    </p>

                </div>

            @endforelse

        </ul>

        {{-- Feedback de sucesso --}}
        @if(session('success'))
            <div class="mt-10 p-4 rounded-lg bg-[#8c2f39]/10 border border-[#8c2f39]/30">
                <p class="text-sm text-[#071013]">
                    {{ session('success') }}
                </p>
            </div>
        @endif

    </section>

</x-layout>
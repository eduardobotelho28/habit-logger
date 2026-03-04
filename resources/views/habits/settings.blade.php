<x-layout title="Dashboard • Loggher">

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

        {{-- Topo da página --}}
        <div class="flex items-center justify-between mb-10">
            <h2 class="text-3xl font-bold text-[#071013]">
                Seus hábitos
            </h2>

            <a href="{{ route('habit.create') }}"
               class="px-5 py-2 rounded-lg bg-[#8c2f39] text-[#fde8e9]
                      font-medium hover:brightness-110 transition">
                + Novo hábito
            </a>
        </div>

        {{-- Listagem --}}
        <ul class="space-y-6">

            @forelse ($habits as $item)

                <li class="p-6 rounded-xl bg-white/40 border border-[#071013]/10 shadow-sm">

                    <div class="flex items-start justify-between gap-6">

                        {{-- Informações --}}
                        <div>
                            <p class="text-lg font-semibold text-[#071013]">
                                {{ $item->name }}
                            </p>

                            <p class="text-sm text-[#071013]/60 mt-1">
                                Criado em {{ $item->created_at->format('d-m-Y') }}
                            </p>

                            <p class="text-sm text-[#071013]/70 mt-3">
                                Registros realizados:
                                <span class="font-semibold">
                                    {{ $item->habitLogs->count() }}
                                </span>
                            </p>
                        </div>

                        {{-- Ações --}}
                        <div class="flex flex-col items-end gap-3">

                            <a href="{{ route('habit.edit', $item) }}"
                               class="text-sm font-medium text-[#8c2f39]
                                      hover:underline hover:brightness-110 transition">
                                Editar
                            </a>

                            <form action="{{ route('habit.destroy', $item) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button
                                    class="text-sm text-red-600 hover:underline transition">
                                    Apagar
                                </button>
                            </form>

                        </div>

                    </div>

                </li>

            @empty

                <div class="p-10 rounded-xl bg-white/40 border border-[#071013]/10 text-center">

                    <p class="text-[#071013]/70 mb-6">
                        Você ainda não cadastrou nenhum hábito.
                    </p>

                    <a href="{{ route('habit.create') }}"
                       class="px-6 py-3 rounded-lg bg-[#8c2f39] text-[#fde8e9]
                              font-medium hover:brightness-110 transition">
                        Cadastrar primeiro hábito
                    </a>

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
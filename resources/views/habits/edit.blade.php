<x-layout title="Editar Hábito • Loggher">

    <section class="min-h-[70vh] flex items-center justify-center px-6">

        <div class="w-full max-w-md">

            {{-- Card --}}
            <div class="bg-white/60 border border-[#071013]/10 rounded-2xl shadow-lg p-8">

                {{-- Voltar --}}
                <div class="mb-6 flex justify-center">
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center gap-2 text-sm font-medium text-[#8c2f39]
                              hover:underline hover:brightness-110 transition">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 19l-7-7 7-7" />
                        </svg>

                        Voltar para o dashboard
                    </a>
                </div>

                {{-- Title --}}
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-[#071013]">Editar Hábito</h2>
                    <p class="text-[#071013]/60 mt-2 text-sm">
                        Defina algo que você quer repetir todos os dias.
                    </p>
                </div>

                {{-- Form --}}
                <form action="{{ route('habit.update', $habit) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Nome do hábito --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-[#071013] mb-1">
                            Nome do hábito
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ $habit['name'] }}"
                            class="w-full px-4 py-2 rounded-lg border border-[#071013]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#8c2f39]
                                   focus:border-[#8c2f39] bg-white"
                            placeholder="Ex: Ler 10 páginas, Beber água..."
                        >

                        @error('name')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full py-3 rounded-lg bg-[#8c2f39] text-[#fde8e9]
                               font-semibold hover:brightness-110 transition cursor-pointer">
                        Editar hábito
                    </button>

                </form>

            </div>

        </div>

    </section>

</x-layout>
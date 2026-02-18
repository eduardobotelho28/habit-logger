<x-layout title="Entrar • Loggher">

    <section class="min-h-[70vh] flex items-center justify-center px-6">

        <div class="w-full max-w-md">

            {{-- Card --}}
            <div class="bg-white/60 border border-[#071013]/10 rounded-2xl shadow-lg p-8">

                {{-- Title --}}
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-[#071013]">Entrar</h2>
                    <p class="text-[#071013]/60 mt-2 text-sm">
                        Continue registrando sua consistência.
                    </p>
                </div>

                {{-- Form --}}
                <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-[#071013] mb-1">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="w-full px-4 py-2 rounded-lg border border-[#071013]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#8c2f39]
                                   focus:border-[#8c2f39] bg-white"
                            placeholder="voce@email.com"
                        >
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-medium text-[#071013] mb-1">
                            Senha
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full px-4 py-2 rounded-lg border border-[#071013]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#8c2f39]
                                   focus:border-[#8c2f39] bg-white"
                            placeholder="••••••••"
                        >
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full py-3 rounded-lg bg-[#8c2f39] text-[#fde8e9]
                               font-semibold hover:brightness-110 transition cursor-pointer">
                        Entrar
                    </button>

                    <div>
                        @error('email')
                            <p class="text-sm text-red-600 mt-2">
                                {{ $message }}
                            </p>    
                        @enderror
                    </div>

                </form>

            </div>

        </div>

    </section>

</x-layout>

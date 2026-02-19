<x-layout title="Entrar • Loggher">

    <section class="min-h-[70vh] flex items-center justify-center px-6 m-6">

        <div class="w-full max-w-md">

            {{-- Card --}}
            <div class="bg-white/60 border border-[#071013]/10 rounded-2xl shadow-lg p-8">

                {{-- Title --}}
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-[#071013]">Registre-se</h2>
                    <p class="text-[#071013]/60 mt-2 text-sm">
                        Começe agora.
                    </p>
                </div>

                {{-- Form --}}
                <form method="POST" action="{{ route('cadastro.submit') }}" class="space-y-6">
                    @csrf

                    {{-- Nome --}}
                    <div>
                        <label class="block text-sm font-medium text-[#071013] mb-1">
                            Nome
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="w-full px-4 py-2 rounded-lg border border-[#071013]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#8c2f39]
                                   focus:border-[#8c2f39] bg-white"
                            placeholder="Seu nome"
                        >
                        @error('name')
                            <p class="text-red-500 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                       
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-[#071013] mb-1">
                            Email
                        </label>

                        <input
                            type="text"
                            name="email"
                            class="w-full px-4 py-2 rounded-lg border border-[#071013]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#8c2f39]
                                   focus:border-[#8c2f39] bg-white"
                            placeholder="voce@email.com"
                        >
                        @error('email')
                            <p class="text-red-500 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                       
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
                        @error('password')
                            <p class="text-red-500 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Password Confirmation --}}
                    <div>
                        <label class="block text-sm font-medium text-[#071013] mb-1">
                            Repetir Senha
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="w-full px-4 py-2 rounded-lg border border-[#071013]/20
                                   focus:outline-none focus:ring-2 focus:ring-[#8c2f39]
                                   focus:border-[#8c2f39] bg-white"
                            placeholder="••••••••"
                        >
                        @error('password')
                            <p class="text-red-500 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <p class="text-center text-sm text-[#071013]/60 mt-6">
                       Já possui cadastro?
                        <a href="{{ route('login') }}"
                        class="font-medium text-[#8c2f39] hover:underline hover:brightness-110 transition">
                            Entrar
                        </a>
                    </p>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full py-3 rounded-lg bg-[#8c2f39] text-[#fde8e9]
                               font-semibold hover:brightness-110 transition cursor-pointer">
                        Criar Conta
                    </button>

                    <div>
                        @error('credentialsError')
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

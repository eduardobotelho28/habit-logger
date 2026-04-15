<nav class="max-w-5xl mx-auto px-6 mt-8">

    <div class="bg-white/40 border border-[#071013]/10 rounded-xl p-2">

        <ul class="flex flex-wrap gap-2">

            {{-- Hoje --}}
            <li>
                <a href="{{ route('dashboard') }}"
                   class="px-4 py-2 rounded-lg text-sm font-medium transition
                   {{ Route::is('dashboard')
                        ? 'bg-[#8c2f39] text-[#fde8e9]'
                        : 'text-[#071013]/70 hover:bg-[#071013]/5'
                   }}">
                    Hoje
                </a>
            </li>

            {{-- Histórico --}}
            <li>
                <a href="{{ route('habit.history') }}"
                   class="px-4 py-2 rounded-lg text-sm font-medium transition
                          {{ Route::is('habit.history')
                            ? 'bg-[#8c2f39] text-[#fde8e9]'
                            : 'text-[#071013]/70 hover:bg-[#071013]/5'
                        }}">
                    Histórico
                </a>
            </li>

            {{-- Gerenciar hábitos --}}
            <li>
                <a href="{{ route('habit.settings') }}"
                   class="px-4 py-2 rounded-lg text-sm font-medium transition
                   {{ Route::is('habit.settings')
                        ? 'bg-[#8c2f39] text-[#fde8e9]'
                        : 'text-[#071013]/70 hover:bg-[#071013]/5'
                   }}       
                   ">
                    Gerenciar hábitos
                </a>
            </li>

        </ul>

    </div>

</nav>
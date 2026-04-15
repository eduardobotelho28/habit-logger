<x-layout title="Histórico • Loggher">

    @if(auth()->check())
        <div class="max-w-5xl mx-auto px-6 pt-10 text-center">
            <p class="text-lg text-[#071013]/70">
                Bem-vindo(a) à sua dashboard,
                <span class="font-semibold">{{ auth()->user()->name }}</span>!
            </p>
        </div>
    @endif

    <x-dashboard-nav />

    <div class="max-w-7xl mx-auto mt-10">
        @foreach ($availableYears as $year)
            <a href="{{ route('habit.history', ['year' => $year]) }}"
            class="px-4 py-2 rounded-lg border-2 border-black {{ $year === $selectedYear ? 'bg-[#8c2f39] text-white' : 'bg-[#fde8e9]/30 text-[#071013]' }} hover:bg-[#fde8e9]/10 transition m-2">
                {{ $year }}
            </a>
        @endforeach
    </div>

    <div class="max-w-7xl mx-auto mt-10">
        @forelse ($habits as $habit)
            <x-contribution :$habit :year="$selectedYear"/>
        @empty
            <div>
                <p class="text-black">
                    Nenhum Hábito para exibir Histórico
                </p>
                <a href="{{ route('habit.create') }}">
                    Criar um novo Hábito
                </a>
            </div>
        @endforelse
    </div>
    
</x-layout>
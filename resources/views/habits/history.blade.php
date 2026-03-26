<x-layout title="Hoje • Loggher">

    <x-dashboard-nav />

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
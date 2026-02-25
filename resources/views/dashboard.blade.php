<x-layout title="Loggher">

   @if(auth()->check())
        <div class="max-w-4xl mx-auto px-6 pt-6 text-center">
            <p class="text-lg text-[#071013]/70">
                Bem-vindo(a) à sua dashboard, <span class="font-semibold">{{ auth()->user()->name }}</span>!
            </p>
        </div>
    @endif

    <div>

        <a href="{{ route('habit.create') }}">Crie um novo hábito.</a>

        <h2>
            Listagem dos Hábitos
        </h2>

        <ul>
            @forelse ($habits as $item)   
                <li>
                    <p>- {{ $item->name }}
                        <span>( {{ $item->created_at->format('d-m-Y')}} )</span>
                    </p>

                    <p>[ {{ $item->habitLogs->count() }} ]</p>

                    <form action="{{ route('habit.destroy', $item) }}" method="post">

                        @csrf
                        @method('DELETE')

                        <button>Apagar</button>

                    </form>

                   

                </li>
            @empty
                <p>Sem hábitos cadastrados ainda.</p>
                <a href="{{ route('home') }}">Cadastrar novo hábito</a>
            @endforelse
        </ul>
        
    </div>

    @session('success')
        <p>{{ session('success') }}</p>
    @endsession

</x-layout>

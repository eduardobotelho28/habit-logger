<x-layout title="Loggher">

   @if(auth()->check())
        <div class="max-w-4xl mx-auto px-6 pt-6 text-center">
            <p class="text-lg text-[#071013]/70">
                Bem-vindo(a) à sua dashboard, <span class="font-semibold">{{ auth()->user()->name }}</span>!
            </p>
        </div>
    @endif

</x-layout>

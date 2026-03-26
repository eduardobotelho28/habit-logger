@props(['habit', 'year' => null])

@php
  $selectedYear = $year ?? now()->year;
  $weeks = App\Models\Habit::generateYearGrid($selectedYear);
@endphp

<div class="mb-6">
  {{-- NOME + ANO --}}
  <div class="flex items-center justify-between mb-3">
    <h2 class="font-bold text-lg text-[#071013]">
      {{ $habit->name }}
    </h2>
    <span class="text-sm text-[#071013]/60 font-semibold">
      {{ $selectedYear }}
    </span>
  </div>

  {{-- GRID --}}
  <div class="bg-white/70 border border-[#071013]/10 p-3 rounded-xl shadow-sm">
    <div class="flex gap-1 justify-between w-full">
      @foreach($weeks as $week)
        <div class="flex flex-col gap-1">
          @foreach($week as $day)
            @if($day === null)
              <div class="w-3 h-3"></div>
            @else
              <div
                   class="w-3 h-3 rounded-xs cursor-pointer transition
                          hover:ring-2 hover:ring-[#8c2f39]
                          {{ $habit->wasCompletedOn($day) ? 'bg-[#8c2f39]' : 'bg-[#071013]/15' }}"
                   title="{{ $day->format('d/m/Y') }} - {{ $day->translatedFormat('l') }}"
              ></div>
            @endif
          @endforeach
        </div>
      @endforeach
    </div>
  </div>

  {{-- LEGENDA --}}
  <div class="flex items-center gap-4 mt-2 text-sm text-[#071013]/60">
    <div class="flex items-center gap-1.5">
      <div class="w-3 h-3 bg-[#071013]/15 rounded-xs"></div>
      <span>Não feito</span>
    </div>
    <div class="flex items-center gap-1.5">
      <div class="w-3 h-3 bg-[#8c2f39] rounded-xs"></div>
      <span>Feito</span>
    </div>
  </div>
</div>
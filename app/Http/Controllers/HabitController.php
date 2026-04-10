<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use App\Http\Controllers\Controller;
use App\Http\Requests\HabitRequest;
use App\Models\HabitLog;
use Carbon\Carbon as CarbonAlias;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class HabitController extends Controller
{

    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view ('habits/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabitRequest $request)
    {
        $validated = $request->validated();

        Auth::user()->habits()->create($validated);

        return redirect(route('dashboard'))->with('success', 'Hábito criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Habit $habit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habit $habit)
    {
        $this->authorize('update', $habit);
        return view ('habits/edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {

        $this->authorize('update', $habit);

        if($habit->user_id != Auth::user()->id) {
            abort(403);
        }

        $habit->update($request->all());

        return redirect()  
              ->route('dashboard')
              ->with('success', 'Hábito Editado com Sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        $this->authorize('delete', $habit);

        $habit->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Hábito Deletado com Sucesso');
    }

    public function settings ()
    {

        $habits = Auth::user()->habits;

        return view('habits.settings', compact('habits'));
    }

    public function toggle (Habit $habit)
    {

        $this->authorize('toggle', $habit);

        $today = Carbon::today()->toDateString();

        $log = HabitLog::query()
            ->where('habit_id', $habit->id)
            ->where('completed_at', $today)
            ->first();

        if($log) {
            $log->delete();
            $message = 'Hábito Desmarcado.';
        }
        else {
            HabitLog::create([
                'user_id'  => Auth::user()->id,
                'habit_id' => $habit->id,
                'completed_at' => $today
            ]);
            $message = 'Hábito Concluído com Sucesso!';
        }

        return redirect()
            ->route('dashboard')
            ->with('success', $message);

    }

    public function history (?int $year = null) {

        $selectedYear = $year ?? Carbon::now()->year;

        $availableYears = range(2024, Carbon::now()->year);

        if(!in_array($selectedYear, $availableYears)) {
            abort(404, 'Ano inválido. Por favor, selecione um ano entre 2024 e o ano atual.');
        }

        $startDate = Carbon::create($selectedYear, 1, 1);
        $endDate   = Carbon::create($selectedYear, 12, 31, 23, 59, 59);

        $habits = Auth::user()
                        ->habits()
                        ->with(['habitLogs' => function ($query) use ($startDate, $endDate) {
                            $query->whereBetween('completed_at', [$startDate, $endDate]);
                        }])
                        ->get();

        return view ('habits.history', compact('habits', 'selectedYear', 'availableYears'));
    }

}

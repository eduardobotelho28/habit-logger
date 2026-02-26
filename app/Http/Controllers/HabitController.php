<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use App\Http\Controllers\Controller;
use App\Http\Requests\HabitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class HabitController extends Controller
{
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

        auth()->user()->habits()->create($validated);

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
        return view ('habits/edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
        if($habit->user_id != auth()->user()->id) {
            abort(403);
        }

        $habit->update($request->all());

        return redirect()  
              ->route('dashboard')
              ->with('success', 'Hábito editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        if($habit->user_id != auth()->user()->id) {
            abort(403);
        }

        $habit->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Hábito deletado com sucesso');
    }
}

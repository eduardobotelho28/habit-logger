<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Habit extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'name'
    ];

    //um hábito pertence a um usuário.
    public function user () : BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    //um hábito pode ter muitos registros.
    public function habitLogs() : HasMany
    {
        return $this->hasMany(HabitLog::class);
    }

    public function wasCompletedToday () : bool
    {
        return $this->habitLogs
                                ->where('completed_at', Carbon::today()->toDateString())
                                ->isNotEmpty() ;
    }

    public static function generateYearGrid ($year) {

        // Primeiro e último dia do ano
        $startDate = \Carbon\Carbon::create($year, 1, 1); // 01/01/YYYY
        $endDate = \Carbon\Carbon::create($year, 12, 31); // 31/12/YYYY

        $weeks = [];
        $currentWeek = [];

        // Preenche dias vazios no início (se o ano não começar no domingo)
        $firstDayOfWeek = $startDate->dayOfWeek; // 0 = domingo, 1 = segunda, etc
        for ($i = 0; $i < $firstDayOfWeek; $i++) {
            $currentWeek[] = null; // Placeholder vazio
        }

        // Agrupa os dias em semanas (domingo a sábado)
        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $currentWeek[] = $date->copy();

            // Fecha a semana no sábado ou no último dia
            if ($date->isSaturday() || $date->eq($endDate)) {
            $weeks[] = $currentWeek;
            $currentWeek = [];
            }
        }

        return $weeks;

    }

    public function wasCompletedOn ($date) : bool
    {
        return $this->habitLogs
                                ->where('completed_at', $date
                                ->toDateString())
                                ->isNotEmpty() ;
    }

}

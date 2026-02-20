<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HabitLog extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'habit_id',
        'completed_at',
    ];

    //um registro de hábito pertence a um usuário.
    public function user () : BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    //um registro de hábito pertence a hábito.
    public function habit () : BelongsTo 
    {
        return $this->belongsTo(Habit::class);
    }

}

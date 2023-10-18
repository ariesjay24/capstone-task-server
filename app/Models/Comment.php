<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User; // Correct the namespace here
use App\Models\Task; // Correct the namespace here

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'Text',
        'UserID',
        'TaskID',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function task(): BelongsTo {
        return $this->belongsTo(Task::class, 'TaskID');
    }
}

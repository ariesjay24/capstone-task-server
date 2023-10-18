<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User; 
use App\Models\Task; 

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'ProjectName',
        'Description',
        'UserID',
        'StartDate',
        'DueDate',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function tasks(): HasMany {
        return $this->hasMany(Task::class, 'ProjectID');
    }
}

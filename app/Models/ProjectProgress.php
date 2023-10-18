<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Task; 

class ProjectProgress extends Model
{
    use HasFactory;
    protected $fillable = [
        'TaskID',
        'ProgressPercentage',
        'ProgressDescription',
        'ProgressDate',
    ];

    public function task(): BelongsTo {
        return $this->belongsTo(Task::class, 'TaskID');
    }
}

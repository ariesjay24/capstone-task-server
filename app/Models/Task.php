<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User; 
use App\Models\Project; 
use App\Models\Comment; 
use App\Models\Progress; 

class Task extends Model 
{
    use HasFactory;
    protected $fillable = [
        'TaskName',
        'Description',
        'Priority',
        'Status',
        'StartDate',
        'DueDate',
        'ProjectID',
        'UserID',
        'Type',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'UserID');
    }
    
    public function project(): BelongsTo {
        return $this->belongsTo(Project::class, 'ProjectID');
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class, 'TaskID');
    }

    public function progress(): HasMany {
        return $this->hasMany(Progress::class, 'TaskID');
    }
}

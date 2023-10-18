<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Project;

class UserProject extends Model
{
    use HasFactory;
    protected $fillable = [
        'UserID',
        'ProjectID',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class, 'ProjectID');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SousTache extends Model
{
    use HasFactory;

    protected $table = 'sub_tasks';

    protected $fillable = [
        'task_id',
        'title',
        'is_completed',
    ];
    // transformer un date sous forme chaine simple a objet carbon 
    protected function casts(): array
    {
        return [
            'is_completed' => 'boolean',
        ];
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}

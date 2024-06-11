<?php

namespace App\Models;

use App\Models\User;
use App\Models\Column;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'column_id'];

    /**
     * Get the column that owns the task.
     */
    public function column()
    {
        return $this->belongsTo(Column::class);
    }

    /**
     * The users that are assigned to the task.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'assign', 'task_id', 'user_id');
    }
}

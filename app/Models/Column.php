<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Column extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'index', 'group_id'];

    /**
     * Get the group that owns the column.
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Get the tasks for the column.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
<?php

namespace App\Models;

use App\Models\Task;
use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Column extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'index', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function taches()
    {
        return $this->hasMany(Tache::class);
    }
}

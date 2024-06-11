<?php

namespace App\Models;

use App\Models\User;
use App\Models\Column;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date'];

    /**
     * Get the columns for the group.
     */
    public function columns()
    {
        return $this->hasMany(Column::class);
    }

    /**
     * Get the users for the group.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

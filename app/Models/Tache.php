<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'column_id', // Ajout du champ column_id
    ];

    public function column()
    {
        return $this->belongsTo(Column::class);
    }
}
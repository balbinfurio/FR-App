<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', // Agrega 'question' a esta lista
        // ... otros campos que puedas tener ...
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}

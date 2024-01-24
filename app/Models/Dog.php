<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'father',
        'mother',
        'gender',
        'race',
        'color',
        'tattoo',
        'chip',
        'birthdate',
        'specialty',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

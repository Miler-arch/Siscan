<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Litters extends Model
{
    use HasFactory;

    protected $fillable = [
        'dog_id',
        'name',
        'race',
        'birthdate',
        'type_of_birth',
        'born_male',
        'born_female',
        'male_death',
        'female_death',
        'note',
        'photo'
    ];

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }
}

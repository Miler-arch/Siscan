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
    public function jealousies()
    {
        return $this->hasMany(Jealousy::class);
    }
    public function crossings()
    {
        return $this->hasMany(Crossing::class);
    }
    public function litters()
    {
        return $this->hasMany(Litters::class);
    }

    public function veterinaryCareRequests()
    {
        return $this->hasMany(VeterinaryCareRequest::class);
    }
    public function medicalHistories()
    {
        return $this->hasMany(MedicalHistory::class);
    }
}

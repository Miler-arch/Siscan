<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crossing extends Model
{
    use HasFactory;
    protected $fillable = ['dog_id', 'date', 'type', 'female_dog'];

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }
}

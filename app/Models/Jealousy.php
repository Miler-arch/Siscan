<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jealousy extends Model
{
    use HasFactory;

    protected $fillable = ['dog_id', 'initial_date', 'final_date', 'next_date', 'description', 'status'];

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }

    
}

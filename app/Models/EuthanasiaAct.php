<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EuthanasiaAct extends Model
{
    use HasFactory;

    protected $fillable = [
        'dog_id',
        'reason',
        'considering',
        'therefore',
        'solve',
        'observation',
    ];

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }
}

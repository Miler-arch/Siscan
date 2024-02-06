<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'dog_id',
        'anamnesis',
        'date',
        'presumptive_diagnosis',
        'complementary_exam',
        'treatment',
    ];

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }
}

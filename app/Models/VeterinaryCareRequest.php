<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeterinaryCareRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'dog_id',
        'clinical_signs',
        'applicant_name',
    ];

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'ci',
        'expedition',
        'home',
        'street',
        'number',
        'phone',
        'reference_phone',
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }

    public function paymentCommitments()
    {
        return $this->hasMany(PaymentCommitment::class);
    }
}

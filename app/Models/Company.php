<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Representant;

class Company extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'cif',
        'email',
        'country',
        'street_address',
        'city',
        'province',
        'postal_code',
    ];

    
    public function representant()
    {
        return $this->hasOne(Representant::class);
    }
}

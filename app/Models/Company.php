<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'representant_name',
        'representant_dni',
        'representant_position',
        'username',
        'password'
    ];

    protected $hidden=[
        'password'
    ];




}

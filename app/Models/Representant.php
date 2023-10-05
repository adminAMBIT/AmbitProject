<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nif',
        'email',
        'username',
        'password',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'phone',
        'username',
        'password',
        'company_id',
        'contact_type_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function contactType()
    {
        return $this->belongsTo(ContactType::class);
    }
}

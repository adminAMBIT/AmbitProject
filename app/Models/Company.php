<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function representant(){
        return $this->users()->where('user_type_id', 1)->first();
    }

    public function contacts()
    {
        return $this->users()->whereNot('user_type_id', 1)->get();
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_company', 'company_id', 'project_id');
    }
}

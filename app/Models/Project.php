<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'project_company', 'project_id', 'company_id');
    }

    public function phases()
    {
        return $this->hasMany(Phase::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id');
    }

}

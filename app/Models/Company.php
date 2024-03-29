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

    public function representants(){
        return $this->users()->where('user_type_id', 1)->get();
    }

    public function contacts()
    {
        return $this->users()->whereNot('user_type_id', 1)->get();
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_company', 'company_id', 'project_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function projectDocuments($project_id)
    {
        return $this->documents()->where('project_id', $project_id)->get();
    }
}

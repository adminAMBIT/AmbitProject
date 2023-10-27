<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'downloadPath',
        'extension',
        'size',
        'subphase_id',
        'user_id',
        'company_id',
    ];

    public function subphase()
    {
        return $this->belongsTo(Subphase::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}

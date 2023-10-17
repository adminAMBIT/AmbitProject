<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subphase extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'subphase_parent_id',
        'phase_id',
    ];

    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }

    public function subphase_parent()
    {
        return $this->belongsTo(Subphase::class);
    }

    public function subphases()
    {
        return $this->hasMany(Subphase::class);
    }
}

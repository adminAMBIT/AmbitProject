<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'subphase_id',
    ];

    public function subphase()
    {
        return $this->belongsTo(Subphase::class);
    }
}

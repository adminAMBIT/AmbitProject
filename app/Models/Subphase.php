<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Subphase extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'phase_id',
        'parent_subphase_id',
    ];

    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }

    public function parentSubphase()
    {
        return $this->belongsTo(Subphase::class, 'parent_subphase_id');
    }

    public function allParentNamesAndIds()
    {
        $parents = new Collection();

        $current = $this;
        while ($current->parentSubphase) {
            $parents->push([
                'id' => $current->parentSubphase->id,
                'name' => $current->parentSubphase->name,
            ]);
            $current = $current->parentSubphase;
        }

        // Agregamos la información de la subfase actual
        $parents->push([
            'id' => $this->id,
            'nombre' => $this->name,
        ]);

        return $parents->reverse(); // Revertimos la colección para que los niveles superiores estén en el orden correcto.
    }
}

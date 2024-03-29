<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    /**
     * Get the gender of this patient
     */
    public function genero() {
        return $this->belongsTo(Genero::class);
    }
    
    public function consultas() {
        return $this->hasMany(Consulta::class);
    }
}

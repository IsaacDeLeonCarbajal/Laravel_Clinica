<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'doctores';

    public function especialidad() {
        return $this->belongsTo(Especialidad::class);
    }

    public function genero() {
        return $this->belongsTo(Genero::class);
    }

    public function consultas() {
        return $this->hasMany(Consulta::class);
    }
}

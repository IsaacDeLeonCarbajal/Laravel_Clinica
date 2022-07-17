<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }
    
    public function paciente() {
        return $this->belongsTo(Paciente::class);
    }
}
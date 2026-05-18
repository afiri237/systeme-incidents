<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    // On force le nom de la table au singulier pour éviter les erreurs
    protected $table = 'equipment'; 

    protected $fillable = ['name', 'serial_number'];
}
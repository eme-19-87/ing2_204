<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    use HasFactory;
    protected $table="usuarios";
    protected  $guarded=[];

    public function personas():HasMany{
        return $this->hasMany(Persona::class,'id_persona','id_persona');
    }

    public function inscripcion():HasMany{
        return $this->hasMany(Inscripcion::class,'id_usuario','id_usuario');
    }
}

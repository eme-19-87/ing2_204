<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inscripcion extends Model
{
    use HasFactory;
    protected $table="Inscripciones";
    protected $fillable=['id_inscripcion','id_curso','id_usuario','fecha_inscripcion'];

    public function curso():BelongsTo{
        return $this->belongsTo(Curso::class,'id_curso','id_curso');
    }

    public function cuota():BelongsTo{
        return $this->belongsTo(Cuota::class,'id_inscripcion','id_cuota');
    }

    public function usuario():HasMany{
        return $this->hasMany(Inscripcion::class,'id_usuario','id_usuario');
    }
}

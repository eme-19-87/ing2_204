<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Persona extends Model
{
    use HasFactory;
    protected $table="personas";
    protected $guarded=[];

    public function usuario():BelongsTo{
        return $this->belongsTo(Usuario::class,'id_persona','id_persona');
    }
}

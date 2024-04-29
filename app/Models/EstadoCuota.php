<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstadoCuota extends Model
{
    use HasFactory;
    protected $table="estadoscuotas";
    protected $guarded=[];

    public function cuota():BelongsTo{
        return $this->belongsTo(Cuota::class,'id_estado','id_estado');
    }
}

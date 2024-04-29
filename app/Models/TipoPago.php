<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TipoPago extends Model
{
    use HasFactory;
    protected $table="tipospagos";
    protected $guarded=[];

    public function pagos():BelongsTo{
        return $this->belongsTo(Pago::class,'id_tipo_pago','id_tipo_pago');
    }

    public static function obtener_metodos_pago(){
        return TipoPago::all();
    }
}

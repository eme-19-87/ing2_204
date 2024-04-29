<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Pago extends Model
{
    use HasFactory;
    protected $table="Pagos";
    protected $guarded=[];

    public function cuotas():HasMany{
        return $this->hasMany(Cuota::class,'id_cuota','id_cuota');
    }

    public function tipoPago():HasOne{
        return $this->hasOne(TipoPago::class,'id_tipo_pago','id_tipo_pago');
    }

    public static function registrar_pago($monto,$id_cuota,$id_metodo){
        try {
            DB::select("select pg_registrar_pago(?,?,?)",array($monto,$id_cuota,$id_metodo));  
            return true;
        } catch (\Throwable $th) {
            return false;
        }
      
    }
}

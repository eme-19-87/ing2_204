<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Facades\DB;

class Cuota extends Model
{
    use HasFactory;
    protected $table="Cuotas";
    protected $fillable=['id_cuota','id_inscripcion','id_estado','monto','fecha_vencimiento'];

    public function inscripcion():HasOne{
        return $this->hasOne(Inscripcion::class,'id_inscripcion','id_inscripcion');
    }
    
    public function estadoCuota():HasOne{
        return $this->hasOne(EstadoCuota::class,'id_estado','id_estado');
    }

    public function usuarios():HasOneThrough{
        return $this->hasOneThrough(Usuario::class,Inscripcion::class,'id_inscripcion','id_usuario','id_inscripcion','id_usuario');
    }
    
    public static function getCuotaUsuario($id_alumno){
        return DB::table('cuotas')
        ->select(['id_cuota','descripcion_estado','nombre_curso','monto','fecha_vencimiento','nombre_usuario','nro_cuota'])
        ->where('inscripciones.id_usuario',$id_alumno)
        ->where('cuotas.id_estado',2)
        ->join('inscripciones','inscripciones.id_inscripcion','=','cuotas.id_inscripcion')
        ->join('usuarios', 'usuarios.id_usuario', '=', 'inscripciones.id_usuario')
        ->join('estadoscuotas', 'estadoscuotas.id_estado', '=', 'cuotas.id_estado')
        ->join('cursos', 'cursos.id_curso', '=', 'inscripciones.id_curso')
        ->get();
    }

    public static function getCuotaById($id){
        return Cuota::where('id_cuota',$id)->first();
    }

   
}

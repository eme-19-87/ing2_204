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

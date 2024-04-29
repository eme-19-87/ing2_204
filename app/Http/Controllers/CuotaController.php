<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoPago;
use App\Models\Cuota;
use Illuminate\Support\Facades\DB;

class CuotaController extends Controller
{
    
   


    public function listar_cuotas_alumnos($id_alumno){
        
        $cuotas =Cuota::getCuotaUsuario($id_alumno);
        //$cuotas=Cuota::all();
        //dd($cuotas);
        return view('listar_cuotas',compact('cuotas'));
    }

    public function mostrar_frm_pago($id_cuota){
        $datos=[
            "cuota"=>Cuota::getCuotaById($id_cuota),
            "tipo_pago"=>TipoPago::obtener_metodos_pago()
        ];
       
        return view('paymentForm',compact('datos'));
    }
}

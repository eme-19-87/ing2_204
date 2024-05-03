<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;

class PagoController extends Controller
{
    
    public function verificar_pago(Request $request){
        $dni=$request->input('dni');
        $apellido=$request->input('apellido');
        $nombre=$request->input('nombre');
        $tarjeta=$request->input('tarjeta');
        $seguridad=$request->input('seguridad');
        $monto=$request->input('monto');
        $id_cuota=$request->input('id_cuota');
        $id_metodo=$request->input('tipo_pago');
        $msgError="";

        if(is_null($dni)) $msgError="Coloque el dni del titular";
        if($msgError=="" && is_null($apellido)) $msgError="Coloque el apellido del titular";
        if($msgError=="" && is_null($nombre)) $msgError="Coloque el nombre del titular";
        if($msgError=="" && $tarjeta!="0123456789") $msgError="El número de tarjeta no coincide con el titular";
        if($msgError=="" && $seguridad!="123") $msgError="El número de seguridad no corresponde a la tarjeta";

        if($msgError==="") {
            $this->registrar_pago(floatval($monto),intval($id_cuota),intval($id_metodo));
            return redirect('/')->withErrors(["success"=>"El pago fue registrado con éxito"]);
        } else{
            return redirect()->back()->withErrors(["error"=>$msgError])->withInput();
        }
       
    }

    private function registrar_pago($monto,$id_cuota,$id_metodo){
      try {
        $exito=Pago::registrar_pago($monto,$id_cuota,$id_metodo);
        
      } catch (\Throwable $th) {
        redirect()->route('index');
      }
      

    }

}

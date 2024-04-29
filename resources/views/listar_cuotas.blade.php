@extends('layouts.app')
@include('partials.navbar')
@section('content')

<table class="table text-center">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Usuario</th>
        <th scope="col">Curso</th>
        <th scope="col">Estado</th>
        <th scope="col">Monto</th>
        <th scope="col">Fecha Vencimineto</th>
        <th scope="col">Nro Cuota</th>
        <th scope="col">Realizar Pago</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($cuotas as $cuota)

        <tr>
            <th>
                {{$cuota->id_cuota}}
            </th>

            <th>
                {{$cuota->nombre_usuario}}
            </th>

            <th>
                {{$cuota->nombre_curso}}
            </th>

            <th>
                {{$cuota->descripcion_estado}}
            </th>

            <th>
                {{$cuota->monto}}
            </th>

            <th>
                {{$cuota->fecha_vencimiento}}
            </th>
         
            <th>
                {{$cuota->nro_cuota}}
            </th>

            <th>
                <a class="btn btn-primary" href="{{route('pay',$cuota->id_cuota)}} ">
                    Pagar
                </a>
            </th>
          </tr>
        
    @empty
        <div>
            nada
        </div>
    @endforelse
     
      
    </tbody>
  </table>
   
@endsection
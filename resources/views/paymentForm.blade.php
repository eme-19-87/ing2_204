@extends('layouts.app')
@include('partials.navbar')
@section('content')

<div class="w-75 m-auto">
  <div class="alert alert-danger">
  </div>
  <form action="{{route('pagar')}}" method="POST">
    @csrf
    <input type="hidden" value="{{isset($datos['cuota']) ? $datos['cuota']->id_cuota:old('id_cuota')}}" 
    name="id_cuota" id="id_cuota">
    <input type="hidden" value="{{isset($datos['cuota']) ? $datos['cuota']->monto : old('monto')}}" 
    name="monto" id="monto">
      <div class="mb-3">
          <label for="dni" class="form-label">Dni</label>
          <input type="text" class="form-control" id="dni" name="dni" value={{old('dni')}}>
        </div>
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre Titular</label>
          <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido">
        </div>
        <div class="mb-3">
          <label for="apellido" class="form-label">Número Tarjeta</label>
          <input type="text" class="form-control" id="tarjeta" name="tarjeta">
        </div>
        <div class="mb-3">
          <label for="apellido" class="form-label">Seguridad</label>
          <input type="text" class="form-control" id="seguridad" name="seguridad">
        </div>

        <div class="mb-3">
          <select class="form-select" aria-label="Default select example" id="tipo_pago" name="tipo_pago">
            @foreach ($datos['tipo_pago'] as $tipo)
            <option value="{{$tipo->id_tipo_pago}} ">
              {{$tipo->tipo_pago_descripcion}}
            </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
         <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
        
  </form>
</div>



@endsection
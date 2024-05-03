@extends('layouts.app')
@include('partials.navbar')
@section('content')

<h2 class="alert alert-success text-center">Bienvenido Al Sistema De Gestión De Idiomas</h2>
    
@if($errors->has('success'))
  <div class="alert alert-primary text-center">
    {{ $errors->first('success') }}
  </div>
            
  @endif
   
@endsection
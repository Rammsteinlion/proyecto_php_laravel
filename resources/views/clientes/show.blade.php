@extends('layouts.app')



@section('content')

    <div class="container">



<style>
    .container{
    padding:5%;
}
.container .img{
    text-align:center;
}
.container .details{
    border-left:3px solid #ded4da;
}
.container .details p{
    font-size:15px;
    font-weight:bold;
}
</style>

<div class="container">
  <div class="row">
    <div class="col-md-6 img">
        <img src="{{ asset('storage').'/'.$cliente->foto}}" width="120" alt="">
    </div>
    <div class="col-md-6 details">
      <blockquote>
        <label for="">Nombre: {{ $cliente->nombre }}</label> -
        <small><cite title="Source Title">Cedula:  {{ $cliente->cedula }}  <i class="icon-map-marker"></i></cite></small>
      </blockquote>
      <p>
        Correo:   {{ $cliente->correo }} <br>
        Telefono  {{ $cliente->telefono }} <br>
        Servicio  {{ $cliente->servicio }} <br>
        Observaciones  {{ $cliente->observaciones }} <br>
        Fecha Inicial:  {{ $cliente->fechainicio }} <br>
        Fecha Final:  {{ $cliente->fechafinal }}
      </p>
      <a class="btn btn-info btn-sm" href="{{url('clientes')}}">Regresar</a>
    </div>
  </div>
</div>



</div>
@endsection

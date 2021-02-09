@extends('layouts.app')

@section('content')

    <div class="container">

<h2>edicion Cliente</h2>

<form action="{{url('/clientes/'.$cliente->id)}}" method="POST" enctype="multipart/form-data">
    <!---token de seguridad-->
    {{@csrf_field()}}
     <!---vamos acceder directamnte al metodo update-->
    {{method_field('PATCH')}}

    @include('clientes.form',['Modo'=>'editar'])

</form>

</div>
@endsection

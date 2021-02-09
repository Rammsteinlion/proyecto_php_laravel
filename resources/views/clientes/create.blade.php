@extends('layouts.app')

@section('content')

    <div class="container">

        @if(count ($errors) >0 )

        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif



<h2>Creaar Cliente</h2>


<form action="{{ url('/clientes') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
    <!---token de seguridad-->
    {{@csrf_field()}}

    <!--incluir el formulario y asignar variable para deiferencia desde donde
    se esta trabajando-->
    @include('clientes.form',['Modo'=>'crear'])
</form>

</div>
@endsection


@extends('layouts.app')

@section('content')

    <div class="container">

   @if(Session::has('Mensaje'))
   <div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
   </div>
    @endif

<a href="{{url('clientes/create')}}" class="btn btn-success">Agregar Cliente</a>
<br>
<br>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        </p>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
                <th>Id</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Cedula</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Observacaiones</th>
                <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                    <td>{{$loop->iteration}}</td>

                 <td class="py-1">
                <!--para acceder a la foto del cliente-->
                <img src="{{ asset('storage').'/'.$cliente->foto}}" width="180" alt="">
                  </td>
                 <td>{{$cliente->nombre}}</td>
                 <td>{{$cliente->cedula}}</td>
                 <td>{{$cliente->correo}}</td>
                 <td>{{$cliente->telefono}}</td>
                 <td>{{$cliente->observaciones}}</td>
                 <td>

                         <a  href="{{ url('/clientes/'.$cliente->id )}} " class=" btn btn-info btn-sm">Ver</a>
                        <a  href="{{ url('/clientes/'.$cliente->id. '/edit')}} " class=" btn btn-warning btn-sm">Editar</a>
                    <!--Uso esta url para enviar el id y borrar el usuario.
                        identificar el tipo de solicitud al enviar la solicitud a
                        cliente controller
                    -->
                   <form  method="POST" action="{{url('clientes/'.$cliente->id)}}" style="display: inline">
                    {{@csrf_field()}}
                    <!---metodo borrado-->
                    {{@method_field('DELETE')}}

                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Borrar');">Borrar</button>
                   </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $clientes->links() }}
      </div>
    </div>
  </div>
</div>
@endsection

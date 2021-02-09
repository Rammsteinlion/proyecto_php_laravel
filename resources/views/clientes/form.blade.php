

{{$Modo == 'crear' ? 'Agregar Cliente' : 'Modificar Cliente' }}


<div class="form-group col-8">
    <label class="control-label" for="nombre">{{'nombre'}}</label>
    <input  class="form-control {{$errors->has('nombre')? 'is-invalid': '' }} " type="text" name="nombre" id="nombre"
    value="{{isset($cliente->nombre)?$cliente->nombre:old('nombre')}}">
    <!---codigo mensaje correspondiente para el nombre
    protege el contejino  para que el mensjae no elvie contenio en script-->
{!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group col-8">
<label class="control-label" for="foto">{{"foto"}}</label>
@if(isset($cliente->foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$cliente->foto}}" width="180" alt="">
@endif
<input  class="form-control {{$errors->has('foto')? 'is-invalid': ''}}"  type="file" name="foto" id="foto">
    <!---codigo mensaje correspondiente para el nombre
    protege el contejino  para que el mensjae no elvie contenio en script-->
    {!! $errors->first('foto', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group col-8">
<label class="control-label" for="cedula">{{'cedula'}}</label>
<input class="form-control {{$errors->has('cedula')? 'is-invalid': '' }}" type="number" name="cedula" id="cedula"
value="{{isset($cliente->cedula)?$cliente->cedula:old('cedula')}}">
 <!---codigo mensaje correspondiente para el nombre
    protege el contejino  para que el mensjae no elvie contenio en script-->
    {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group col-8">
<label class="control-label" for="correo">{{'correo'}}</label>
<input class="form-control {{$errors->has('correo')? 'is-invalid': '' }}" type="email" name="correo" id="correo"
value="{{isset($cliente->correo)?$cliente->correo:old('correo')}}">
<!---codigo mensaje correspondiente para el nombre
    protege el contejino  para que el mensjae no elvie contenio en script-->
{!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}

</div>

<div class="form-group col-8">
<label class="control-label" for="telefono">{{'telefono'}}</label>
<input class="form-control {{$errors->has('telefono')? 'is-invalid': '' }}" type="number" name="telefono" id="telefono"
value="{{isset($cliente->telefono)?$cliente->telefono:old('telefono')}}">
 <!---codigo mensaje correspondiente para el nombre
    protege el contejino  para que el mensjae no elvie contenio en script-->
    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group col-8">
    <label class="control-label" for="servicio">{{'servicio'}}</label>
    <select class="form-control"  name="servicio" id="servicio" value="value={{isset($cliente->servicio)?$cliente->servicio:old('servicio')}}">
        <option > Servicio Básico</option>
        <option >Servicio Avanzado</option>
        {!! $errors->first('servicio', '<div class="invalid-feedback">:message</div>') !!}
      </select>
    </div>

    <div class="form-group col-8">
        <label class="control-label" for="fechainicio">{{'fechainicio'}}</label>
        <div class="col-8">
            <input class="form-control" type="date" id="fechainicio" name="fechainicio"
            value="{{isset($cliente->fechainicio)?$cliente->fechainicio:''}}">
 <!---codigo mensaje correspondiente para el nombre
    protege el contejino  para que el mensjae no elvie contenio en script-->
    {!! $errors->first('fechainicio', '<div class="invalid-feedback">:message</div>') !!}
          </div>
    </div>


    <div class="form-group col-8">
        <label class="control-label" for="fechafinal">{{'fechafinal'}}</label>
        <div class="col-8">
            <input class="form-control" type="date" id="fechafinal" name="fechafinal"
            value="{{isset($cliente->fechafinal)?$cliente->fechafinal:''}}">
 <!---codigo mensaje correspondiente para el nombre
    protege el contejino  para que el mensjae no elvie contenio en script-->
    {!! $errors->first('fechafinal', '<div class="invalid-feedback">:message</div>') !!}
          </div>
    </div>

    <div class="form-group col-8">
<label class="control-label" for="observaciones">{{'observaciones'}}</label>
<input class="form-control {{$errors->has('observaciones')? 'is-invalid': '' }}" type="text" name="observaciones" id="observaciones"
value="{{isset($cliente->observaciones)?$cliente->observaciones:old('observaciones')}}">
 <!---codigo mensaje correspondiente para el nombre
    protege el contejino  para que el mensjae no elvie contenio en script-->
    {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
</div>

<input class="btn btn-success btn-sm" type="submit" value="{{$Modo == 'crear' ? 'Agregar' : 'Modificar'}}">
<a class="btn btn-info btn-sm" href="{{url('clientes')}}">Regresar</a>


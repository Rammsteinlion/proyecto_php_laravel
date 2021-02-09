<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{

    public function index()
    {
        //Almacenar toda la informacion y la pagine.

        $datos['clientes']=Clientes::paginate(4);

        return view('clientes.index',$datos);

    }

    public function create()
    {
        //
        return view('clientes.create');
    }


    public function store(Request $request)
    {
        //
        //$datoCliente=request()->all();

        $campos=[
            'nombre' => 'required|string|max:100',
            'foto' => 'required|max:10000|mimes:jpeg,png,jpg',
            'cedula' => 'required|integer',
            'correo' => 'required|email',
            'telefono' => 'required|integer',
            'servicio' => 'required|string|max:100',
            'fechainicio'=> 'required',
            'fechafinal'=> 'required',
            'observaciones' => 'required|string|max:100'

        ];

        $mensaje =["required" => 'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoCliente=request()->except('_token');

        //recolectar la fotografia
        if($request->except('foto')){

            //modificar la informacion la foto,para recolectar y almacenarla
            $datoCliente['foto']=$request->file('foto')->store('uploads','public');
        }

        //insertando datos en la base de datos a exepcion del token
        Clientes::insert($datoCliente);

        //return response()->json($datoCliente);
        return redirect('clientes')->with('Mensaje','Agregado con exito');
    }


    public function show($id)
    {
        $cliente = Clientes::find($id);
       return View('clientes.show')->with('cliente', $cliente);

    }


    public function edit($id)
    {
        //recepcionar la informacion y buscar el cliente con ese id que corresponda
        $cliente = Clientes::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }


    public function update(Request $request,$id)
    {

        $campos=[
            'nombre' => 'required|string|max:100',
            'cedula' => 'required|integer',
            'correo' => 'required|email',
            'telefono' => 'required|integer',
            'servicio' => 'required|string|max:100',
            'fechainicio'=> 'required|date',
            'fechafinal'=> 'required|date',
            'observaciones' => 'required|string|max:100'

        ];

        if($request->hasFile('foto')){
            $campos +=['foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
        }

        $mensaje =["required" => 'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //recepciona la informacion exeptuando el token
        $datoCliente=request()->except(['_token','_method']);

        //recolectar la fotografia
        if($request->except('foto')){

            $cliente = Clientes::findOrFail($id);

            //para borrar en la carpteta storage la foto vieja y poner la nueva.
            Storage::delete('public/'.$cliente->foto);

            //modificar la informacion la foto,para recolectar y almacenarla
            $datoCliente['foto']=$request->file('foto')->store('uploads','public');
        }

        Clientes::where('id', '=',$id)->update($datoCliente);

        return redirect('clientes')->with('Mensaje','Cliente actualizado con exito');


        //$cliente = Clientes::findOrFail($id); //recuperamos la informacion
       // return view('clientes.edit', compact('cliente'));

    }


    public function destroy($id)
    {
        //
        $cliente = Clientes::findOrFail($id);

        if(Storage::delete('public/'.$cliente->foto)){
            Clientes::destroy($id);
        }
        return redirect('clientes')->with('Mensaje','Cliente eliminado con exito');

    }
}

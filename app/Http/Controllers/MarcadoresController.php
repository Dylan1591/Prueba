<?php

namespace App\Http\Controllers;

use App\Models\marcadores;
use Illuminate\Http\Request;

class MarcadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['marcadores']=marcadores::paginate(8);
        return view('marcadores.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('marcadores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion
        $campos=[
            'Titulo'=>'required|string|max:50',
            'Tema'=>'required|string|max:100',
            'URL'=>'required|url',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'URL.required'=>'la Url es requerida'
        ];

        $this->validate($request, $campos,$mensaje);
        //insercion
        $datosMarcadores = request()->except('_token');
        Marcadores::insert($datosMarcadores);
        return redirect('marcadores')->with('mensaje','Creacion exitosa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\marcadores  $marcadores
     * @return \Illuminate\Http\Response
     */
    public function show(marcadores $marcadores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\marcadores  $marcadores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $marcador=marcadores::findOrFail($id);
        return view('marcadores.edit', compact('marcador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\marcadores  $marcadores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validacion
        $campos=[
            'Titulo'=>'required|string|max:50',
            'Tema'=>'required|string|max:100',
            'URL'=>'required|url',
        ];
        
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'URL.required'=>'la Url es requerida'
        ];
        
        $this->validate($request, $campos,$mensaje);
        //insercion
        $datosMarcadores = request()->except(['_token','_method']);
        marcadores::where('id','=',$id)->update($datosMarcadores);
         return redirect('marcadores')->with('mensaje','Cambio exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\marcadores  $marcadores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Marcadores::destroy($id);
        return redirect('marcadores')->with('mensaje','Marcador eliminado');
    }
}

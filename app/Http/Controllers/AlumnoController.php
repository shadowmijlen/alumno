<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlummnoRequest;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('alumno.index', [
            'alumnos' => Alumno::where('flestado', '=', 1)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('alumno.crear', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlummnoRequest $request)
    {
        //
        $alumno = new Alumno;
        $alumno->nombres = $request->nombres;
        $alumno->apaterno = $request->apaterno;
        $alumno->amaterno = $request->amaterno;
        $alumno->tipodoc = $request->tipodoc;
        $alumno->nrodoc = $request->nrodoc;
        $alumno->correo = $request->correo;
        $alumno->celular = $request->celular;
        $alumno->sexo = $request->sexo;
        $alumno->save();
        return redirect('/')->with('status', 'Creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $alumno = Alumno::where('id', '=', $id)->get();
        if (count($alumno) > 0) {
            return view('alumno.editar', [
                'alumno' => $alumno[0],
            ]);
        }else {
            return redirect('/')->with('status', 'No se encontró al alumno para actualizar.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlummnoRequest $request)
    {
        //
        $alumno = Alumno::where('id', '=', $request->id)->get();
        if(count($alumno) > 0){
            $alumno[0]->nombres = $request->nombres;
            $alumno[0]->apaterno = $request->apaterno;
            $alumno[0]->amaterno = $request->amaterno;
            $alumno[0]->tipodoc = $request->tipodoc;
            $alumno[0]->nrodoc = $request->nrodoc;
            $alumno[0]->correo = $request->correo;
            $alumno[0]->celular = $request->celular;
            $alumno[0]->sexo = $request->sexo;
            $alumno[0]->save();
        }else{
            return redirect('/')->with('status', 'No se encontró al alumno para actualizar.');
        }
        
        return redirect('/')->with('status', 'Actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

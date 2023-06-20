<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pacientes as pa')
            ->join('clubs as clu', 'clu.id', '=', 'pa.idClub')
            ->select('pa.nombre as nombre', 'pa.apellido as apellido', 'pa.alergico_a as alergico_a', 'clu.nombre as club','pa.id')
            ->get();
        return view('paciente.index', compact('data'));
    }


    public function show()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =  Club::all();
        return view('paciente.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Paciente();
        $data->nombre = $request->input('nombre');
        $data->apellido = $request->input('apellido');
        $data->alergico_a = $request->input('alergico_a');
        $data->idClub = $request->input('club');
        $data->save();

        return redirect('paciente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        $data =  Club::all();
        return view('paciente.edit',compact('paciente','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {

        $paciente->nombre = $request->input('nombre');
        $paciente->apellido = $request->input('apellido');
        $paciente->alergico_a = $request->input('alergico_a');
        $paciente->idClub = $request->input('club');
        $paciente->save();

        return redirect('paciente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
       $paciente->delete();
        return response()->json(['success' => true]);
    }
}

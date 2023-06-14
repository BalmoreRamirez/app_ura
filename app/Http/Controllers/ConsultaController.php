<?php

namespace App\Http\Controllers;

use App\Models\ConsultaMedicamento;
use Illuminate\Support\Facades\Auth;
use App\Models\Consulta;
use App\Models\Club;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = DB::table('consultas as con')
            ->join('users as us', 'us.id', '=', 'con.idUsuario')
            ->join('pacientes as pa', 'pa.id', '=', 'con.idPaciente')
            ->join('clubs as clu', 'clu.id', '=', 'pa.idClub')
            ->select('us.username', 'us.lastname', 'pa.nombre', 'clu.nombre as club', 'pa.alergico_a', 'con.id')
            ->get();

        return view('consulta.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $username = Auth::user()->username;
        $data = Club::all();
        return view('consulta.create', compact('username', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id_user = Auth::user()->id;
        $paciente = $request->input('formulario');
        parse_str($paciente, $array);

        $consulta = new Consulta();
        $consulta->idUsuario = $id_user;
        $consulta->idPaciente = intval($array['paciente']);
        $consulta->save();

        $id_consulta = Consulta::latest()->pluck('id')->first();
        if (isset($request->products)) {
            foreach ($request->products as $item) {
                $data = new ConsultaMedicamento();
                $data->cuadroCaso = $item['cuadro'];
                $data->cantidad = $item['cantidad'];
                $data->idConsulta = $id_consulta;
                $data->idMedicamento = $item['medicamento'];;
                $data->save();
            };
        }

        return response()->json(['mensaje' => $array]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Consulta $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Consulta $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit(Consulta $consulta)
    {

        $data = ConsultaMedicamento::where('idConsulta', 38)->get();
        $consultaData = DB::table('consultas as con')
            ->join('users as us', 'us.id', '=', 'con.idUsuario')
            ->join('pacientes as pa', 'pa.id', '=', 'con.idPaciente')
            ->join('clubs as clu', 'clu.id', '=', 'pa.idClub')
            ->select('us.username as rescatista', 'pa.nombre as paciente', 'clu.nombre as club')
            ->first();


        $username = Auth::user()->username;
        return view('consulta.edit', compact('username', 'data','consultaData','consulta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Consulta $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consulta $consulta)
    {
        $username = Auth::user()->username;
        return view('consulta.edit', compact('username'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Consulta $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consulta $consulta)
    {
        //
    }

    //METODOS ADICIONALES
    public function listaPacientePorClub(Request $request)
    {
        $data = Paciente::where('idClub', $request->id)->get();
        return response()->json($data);
    }


}

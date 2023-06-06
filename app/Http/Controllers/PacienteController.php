<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    public function index()
    {
        $data = DB::table('pacientes')->get()->toArray();
        return view('paciente.index', compact('data'));
    }

    public function listPaciente(Request $request)
    {
        $data = trim($request->valor);
        $result = DB::table('pacientes')
            ->where('nombre', 'like', '%' . $data . '%')
            ->get();
        return response()->json([
            "result" => $result
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Paciente $paciente)
    {

    }

    public function edit(Paciente $paciente)
    {
    }

    public function update(Request $request, Paciente $paciente)
    {

    }

    public function destroy(Paciente $paciente)
    {

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{

    public function index()
    {
        return view('pacientes.index', ['pacientes' => Paciente::orderBy('id', 'asc')->paginate()]);
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $paciente = new Paciente();

        $paciente->nss = $request->nss;
        $paciente->nombre = $request->nombre;
        $paciente->apellido_paterno = $request->apellido_paterno;
        $paciente->apellido_materno = $request->apellido_materno;
        $paciente->telefono = $request->telefono;
        $paciente->genero_id = $request->genero_id;

        $paciente->save();

        return redirect()->route('pacientes.index');
    }

    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Paciente $paciente, Request $request)
    {
        $paciente->nombre = $request->nombre;
        $paciente->apellido_paterno = $request->apellido_paterno;
        $paciente->apellido_materno = $request->apellido_materno;
        $paciente->telefono = $request->telefono;
        $paciente->genero_id = $request->genero_id;

        $paciente->save();

        return redirect()->route('pacientes.index');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index');
    }

    /*
    Recuperar los datos de un paciente desde una petición ajax.
    
    Tenía la finalidad de servir en la confirmación al quere eliminar un registro, pero no pude terminarlo
    
    public function getPaciente(Request $request) {
        if($request->ajax()) { //Si el request es resultado de una llamada de Ajax
            $paciente = Paciente::find($request->paciente_id);

            return response()->json([
                'paciente' => $paciente,
                'genero' => $paciente->genero->genero,
                'consultas' => $paciente->consultas
            ]);
        }
    }
    */
}

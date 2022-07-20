<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PacienteController extends Controller
{

    public function index()
    {
        return view('pacientes.index', ['pacientes' => Paciente::orderBy('id', 'asc')->paginate()]);
    }

    public function create()
    {
        return view('pacientes.create', ['generos' => Genero::select('id', 'genero')->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nss' => 'required | max:15',
            'nombre' => 'required | max:30',
            'apellido_paterno' => 'required | max:30',
            'apellido_materno' => 'required | max:30',
            'telefono' => 'required | max:20', 
            'genero_id' => ['required', Rule::in(Genero::select('id')->pluck('id'))]
        ]);

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
        $generos = Genero::select('id', 'genero')->get();
        return view('pacientes.edit', compact('paciente', 'generos'));
    }

    public function update(Paciente $paciente, Request $request)
    {
        $request->validate([
            'nss' => 'max:15',
            'nombre' => 'required | max:30',
            'apellido_paterno' => 'required | max:30',
            'apellido_materno' => 'required | max:30',
            'telefono' => 'required | max:20', 
            'genero_id' => ['required', Rule::in(Genero::select('id')->pluck('id'))]
        ]);

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

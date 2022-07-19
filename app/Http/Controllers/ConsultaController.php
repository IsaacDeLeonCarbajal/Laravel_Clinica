<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Doctor;
use App\Models\Especialidad;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{

    public function index(Request $request)
    {
        if ($request->paciente) { //Si se quieren buscar las consultas hechas por un paciente
            $consultas = Consulta::join('Doctores', 'Doctores.id', '=', 'Consultas.doctor_id')->where('paciente_id', $request->paciente)->orderBy('cedula', 'asc')->orderBy('fecha', 'asc')->paginate();
        } else if ($request->doctor) { //Si se quieren buscar las consultas hechas por un doctor
            $consultas = Consulta::join('Pacientes', 'Pacientes.id', '=', 'Consultas.paciente_id')->where('doctor_id', $request->doctor)->orderBy('nss', 'asc')->orderBy('fecha', 'asc')->paginate();
        } else { //Si se quieren buscar todas las consultas
            $consultas = Consulta::join('Pacientes', 'Pacientes.id', '=', 'Consultas.paciente_id')->orderBy('nss', 'asc')->orderBy('fecha', 'asc')->paginate();
        }

        return view('consultas.index', compact('consultas'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        $pacientes = Paciente::select('id', 'nss', 'nombre', 'apellido_paterno', 'apellido_materno')->orderBy('nss', 'asc')->get();
        $doctores = Doctor::select('id', 'cedula', 'nombre', 'apellido_paterno', 'apellido_materno', 'especialidad_id')->orderBy('cedula', 'asc')->get();

        return view('consultas.create', compact('especialidades', 'pacientes', 'doctores'));
    }

    public function store(Request $request)
    {
        $consulta = new Consulta();

        $consulta->paciente_id = $request->paciente_id;
        $consulta->doctor_id = $request->doctor_id;
        $consulta->fecha = $request->fecha;
        $consulta->padecimiento = $request->padecimiento;
        $consulta->tratamiento = $request->tratamiento;

        $consulta->save();

        return redirect()->route('consultas.index');
    }

    public function show(Consulta $consulta)
    {
        return view('consultas.show', compact('consulta'));
    }

    public function edit(Consulta $consulta)
    {
        $pacientes = Paciente::select('id', 'nss', 'nombre', 'apellido_paterno', 'apellido_materno')->orderBy('nss', 'asc')->get();
        $doctores = Doctor::select('id', 'cedula', 'nombre', 'apellido_paterno', 'apellido_materno')->orderBy('cedula', 'asc')->get();

        return view('consultas.edit', compact('consulta', 'pacientes', 'doctores'));
    }

    public function update(Consulta $consulta, Request $request)
    {
        $consulta->paciente_id = $request->paciente_id;
        $consulta->doctor_id = $request->doctor_id;
        $consulta->fecha = $request->fecha;
        $consulta->padecimiento = $request->padecimiento;
        $consulta->tratamiento = $request->tratamiento;

        $consulta->save();

        return redirect()->route('consultas.index');
    }

    public function destroy(Consulta $consulta)
    {
        $consulta->delete();

        return redirect()->route('consultas.index');
    }
}

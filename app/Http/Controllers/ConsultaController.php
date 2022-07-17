<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Doctor;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{

    public function index(Request $request)
    {
        if ($request->paciente) { //Si se quieren buscar las consultas hechas por un paciente
            $consultas = Consulta::where('paciente_id', $request->paciente)->orderBy('doctor_id', 'asc')->orderBy('fecha', 'asc')->paginate();
        } else if ($request->doctor) { //Si se quieren buscar las consultas hechas por un doctor
            $consultas = Consulta::where('doctor_id', $request->doctor)->orderBy('paciente_id', 'asc')->orderBy('fecha', 'asc')->paginate();
        } else { //Si se quieren buscar todas las consultas
            $consultas = Consulta::orderBy('paciente_id', 'asc')->orderBy('fecha', 'asc')->paginate();
        }

        $paciente = $request->paciente;
        $doctor = $request->doctor;

        return view('consultas.index', compact('consultas', 'paciente', 'doctor'));
    }

    public function create(Request $request)
    {
        $pacientes = Paciente::select('id', 'nss', 'nombre', 'apellido_paterno', 'apellido_materno')->orderBy('nss', 'asc')->get();
        $doctores = Doctor::select('id', 'cedula', 'nombre', 'apellido_paterno', 'apellido_materno')->orderBy('cedula', 'asc')->get();

        return view('consultas.create', compact('pacientes', 'doctores'));
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

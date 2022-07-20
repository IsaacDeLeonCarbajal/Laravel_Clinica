<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Especialidad;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{

    public function index()
    {
        return view('doctores.index', ['doctores' => Doctor::orderBy('id', 'asc')->paginate()]);
    }

    public function create()
    {
        return view('doctores.create', ['generos' => Genero::select('id', 'genero')->get(), 'especialidades' => Especialidad::select('id', 'especialidad')->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cedula' => 'required | max:15',
            'nombre' => 'required | max:30',
            'apellido_paterno' => 'required | max:30',
            'apellido_materno' => 'required | max:30',
            'telefono' => 'required | max:20',
            'sueldo' => 'required | numeric',
            'genero_id' => ['required', Rule::in(Genero::select('id')->pluck('id'))],
            'especialidad_id' => ['required', Rule::in(Especialidad::select('id')->pluck('id'))]
        ]);

        $doctor = new Doctor();

        $doctor->cedula = $request->cedula;
        $doctor->nombre = $request->nombre;
        $doctor->apellido_paterno = $request->apellido_paterno;
        $doctor->apellido_materno = $request->apellido_materno;
        $doctor->telefono = $request->telefono;
        $doctor->sueldo = $request->sueldo;
        $doctor->genero_id = $request->genero_id;
        $doctor->especialidad_id = $request->especialidad_id;

        $doctor->save();

        return redirect()->route('doctores.index');
    }

    public  function show(Doctor $doctor)
    {
        return view('doctores.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        $especialidades = Especialidad::select('id', 'especialidad')->get();
        $generos = Genero::select('id', 'genero')->get();

        return view('doctores.edit', compact('doctor', 'especialidades', 'generos'));
    }

    public function update(Doctor $doctor, Request $request)
    {
        $request->validate([
            'cedula' => 'max:15',
            'nombre' => 'required | max:30',
            'apellido_paterno' => 'required | max:30',
            'apellido_materno' => 'required | max:30',
            'telefono' => 'required | max:20',
            'sueldo' => 'required | numeric',
            'genero_id' => ['required', Rule::in(Genero::select('id')->pluck('id'))],
            'especialidad_id' => ['required', Rule::in(Especialidad::select('id')->pluck('id'))]
        ]);

        $doctor->nombre = $request->nombre;
        $doctor->apellido_paterno = $request->apellido_paterno;
        $doctor->apellido_materno = $request->apellido_materno;
        $doctor->telefono = $request->telefono;
        $doctor->sueldo = $request->sueldo;
        $doctor->genero_id = $request->genero_id;
        $doctor->especialidad_id = $request->especialidad_id;

        $doctor->save();

        return redirect()->route('doctores.index');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctores.index');
    }

    public function doctoresPorEspecialidad(Request $request)
    {
        if (isset($request->especialidad_id)) {
            return Doctor::where('especialidad_id', $request->especialidad_id)->orderBy('cedula', 'asc')->get();
        } else {
            return "id de especialidad inválido";
        }
    }
}

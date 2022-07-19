<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index()
    {
        return view('doctores.index', ['doctores' => Doctor::orderBy('id', 'asc')->paginate()]);
    }

    public function create()
    {
        return view('doctores.create', ['especialidades' => Especialidad::select('id', 'especialidad')->get()]);
    }

    public function store(Request $request)
    {
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

        return view('doctores.edit', compact('doctor', 'especialidades'));
    }

    public function update(Doctor $doctor, Request $request)
    {
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

<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        // echo "hello";
        // $estudiantes = Student::all();
        // dd($estudiantes);

        //muestra todos los registros de la tabla
        //$estudiantes = Student::all();
        //dd($estudiantes);

        //$estudiantes =Student::with('faculty')->get();
        //dd($estudiantes);

        $estudiantes = Student::with('faculty:name,id')->get()->map(
            function ($estudiante) {
                $estudiante->faculty_name = $estudiante->faculty->name ?? 'SIN FACULTAD';
//MOSTRAR EL ID DE LA FACULTAD
                return $estudiante;
            }
        );


        //muestra los registros con la informacion relacionada a facultad
//         $estudiantes = Student::with('faculty')->get();

        //asi mostramos mass información de la relación de Faculty
//        $estudiantes = Student::with('faculty:name,id')->get()->map(function($estudiante) {
//            $estudiante->faculty_name = $estudiante->faculty->name ?? 'Sin facultad';
//            $estudiante->faculty_id = $estudiante->faculty->id ?? 'Sin ID de facultad';
//            return $estudiante;
//        });;


//        dd($estudiantes);

        return Inertia::render('Student/Index', [
            'estudiantes' => $estudiantes

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $faculties = Faculty::all();
        return Inertia::render('Student/Create', [
            'faculties' => $faculties
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
//        dd($request);


//        $validated = $request->validate([
//            'student_code' => 'required|max:10',
//            'name' => 'required',
//            'email' => 'required|email',
//            'semester' => 'required',
//            'faculty_id' => 'required',
//            'status' => 'required',
//        ]);
//
//
//        Student::create($validated);
//
//
//        return redirect()->route('student.index')
//            ->with('success', 'Estudiante creado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}

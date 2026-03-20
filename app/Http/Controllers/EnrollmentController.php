<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $enrollments = Enrollment::with(['student:name,id','course:name,id,description'])->get()->map(
            function($enrollment){
                $enrollment -> student_name = $enrollment->student->name ?? 'SIN NOMBRE';
                $enrollment -> course_name = $enrollment->course->name ?? 'SIN NOMBRE';
                $enrollment -> course_description = $enrollment->course->description ?? 'SIN NOMBRE';

                return $enrollment;
            }
        );




        return Inertia::render('Enrollment/Index', [
            'enrollments' => $enrollments

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrrollment)
    {
        //
    }
}

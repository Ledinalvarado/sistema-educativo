<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        $courses = Course::all();

        foreach ($students as $student) {

            $randomCourses = $courses->random(3);

            foreach ($randomCourses as $course) {

                Enrollment::factory()->create([
                    'student_id' => $student->id,
                    'course_id' => $course->id
                ]);

            }
        }
    }
}

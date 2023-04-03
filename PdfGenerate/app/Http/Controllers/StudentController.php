<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use PDF;

class StudentController extends Controller
{
    //
    public function index(){
        $students = Student::all();
        return view('students.index', compact('students'));
    }
    

    public function generatePDF()
    {
        $students = Student::get();

        $data = [
            'title' => 'Students',
            'date' => date('m/d/Y'),
            'students' => $students
        ];

        $pdf = PDF::loadView('students.index', $data);
        return $pdf->stream();
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function guruPage(Request $request)
{
    $page = $request->query('page', 1);
    $teachers = Teacher::orderBy('subject')->get();
    $teachersBySubject = $teachers->groupBy('subject');
    $totalPages = ceil($teachersBySubject->count() / 8);

    return view('guru', [
        'teachers' => $teachersBySubject,
        'currentPage' => $page,
        'totalPages' => $totalPages,
    ]);
}

    public function showTeacher(Teacher $teacher)
{
    return view('guru.show', compact('teacher'));
}
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CheckCourseAccess
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        $course = $request->route('course');

        if (!$course instanceof Course) {
            $course = Course::findOrFail($request->route('course'));
        }

        // Admin memiliki akses ke semua course
        if ($user->is_admin || $user->role === 'admin') {
            return $next($request);
        }

        // Cek akses berdasarkan grade dan major
        if ($user->grade_id === $course->grade_id && 
            $user->major_id === $course->major_id) {
            return $next($request);
        }

        return redirect()->back()->with('error', 'Anda tidak memiliki akses ke kelas ini');
    }
}
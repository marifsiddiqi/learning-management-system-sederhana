<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\MateriCourse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_user = Auth::id();
        $user = User::findOrFail($id_user);
        $course = Course::orderByDesc('created_at')->get();
        return view('user/education', compact('user', 'course'));
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
    public function show($id)
    {
        // dd($id);
        $id_user = Auth::id();
        $user = User::findOrFail($id_user);
        $course = Course::findOrFail($id);
        $materis = MateriCourse::join('courses', 'courses.id', '=', 'materi_courses.course_id')
            ->where('courses.id', $id)
            ->select('materi_courses.id', 'materi_courses.gambar_materi', 'materi_courses.nama_materi', 'materi_courses.isi_materi')
            ->get();
        return view('user/education_detail', compact('user', 'course', 'materis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::orderByDesc('created_at')->get();
        return view('admin/manage_education', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/manage_education_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = new Course();

        $course->nama_course = $request->nama_course;
        $course->deskripsi_course = $request->deskripsi_course;

        if ($request->file('gambar_course')) {
            $file = $request->file('gambar_course');
            $filename = date('d-m-Y-H-i-s') . '_' . $request->nama_course . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('course'), $filename);
            $course->gambar_course = $filename;
        }

        $course->save();
        return redirect('/manage-education');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin/manage_education_edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);
        $course->nama_course = $request->nama_course;
        $course->deskripsi_course = $request->deskripsi_course;

        if ($request->hasFile('gambar_course')) {
            if ($course->gambar_course) {
                $filePath = 'course/' . $course->gambar_course;
                if (file_exists(public_path($filePath))) {
                    unlink(public_path($filePath));
                }
            }

            $file = $request->file('gambar_course');
            $filename = date('d-m-Y-H-i-s') . '_' . $request->nama_course . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('course'), $filename);
            $course->gambar_course = $filename;
        }

        $course->save();
        return redirect('/manage-education');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        if ($course->gambar_course) {
            $filePath = 'course/' . $course->gambar_course;
            if (file_exists(public_path($filePath))) {
                unlink(public_path($filePath));
            }
        }
        $course->delete();
        return redirect('/manage-education');
    }
}

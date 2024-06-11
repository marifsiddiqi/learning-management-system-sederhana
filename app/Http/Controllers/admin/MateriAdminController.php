<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MateriCourse;
use Illuminate\Http\Request;

class MateriAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_course)
    {
        $materis = MateriCourse::join('courses', 'courses.id', '=', 'materi_courses.course_id')
            ->where('courses.id', $id_course)
            ->select('materi_courses.id', 'materi_courses.gambar_materi', 'materi_courses.nama_materi', 'materi_courses.isi_materi')
            ->get();
        return view('admin/manage_materi', compact('materis', 'id_course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_course)
    {
        return view('admin/manage_materi_create', compact('id_course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_course)
    {
        $materi = new MateriCourse();
        $materi->course_id = $id_course;
        $materi->nama_materi = $request->nama_materi;
        $materi->isi_materi = $request->isi_materi;
        if ($request->file('gambar_materi')) {
            $file = $request->file('gambar_materi');
            $filename = date('d-m-Y-H-i-s') . '_' . $request->nama_materi . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('materi_course'), $filename);
            $materi->gambar_materi = $filename;
        }
        $materi->save();
        return redirect('/manage-materi/' . $id_course);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_course, $id_materi)
    {
        $materi = MateriCourse::findOrFail($id_materi);
        return view('admin/manage_materi_edit', compact('id_course', 'materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_course, $id_materi)
    {
        $materi = MateriCourse::findOrFail($id_materi);
        $materi->nama_materi = $request->nama_materi;
        $materi->isi_materi = $request->isi_materi;
        if ($request->hasFile('gambar_materi')) {
            if ($materi->gambar_materi) {
                $filePath = 'materi_course/' . $materi->gambar_materi;
                if (file_exists(public_path($filePath))) {
                    unlink(public_path($filePath));
                }
            }

            $file = $request->file('gambar_materi');
            $filename = date('d-m-Y-H-i-s') . '_' . $request->nama_materi . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('materi_course'), $filename);
            $materi->gambar_materi = $filename;
        }
        $materi->save();
        return redirect('/manage-materi/' . $id_course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_course, $id_materi)
    {
        $materi = MateriCourse::findOrFail($id_materi);
        if ($materi->gambar_materi) {
            $filePath = 'materi_course/' . $materi->gambar_materi;
            if (file_exists(public_path($filePath))) {
                unlink(public_path($filePath));
            }
        }
        $materi->delete();
        return redirect('/manage-materi/' . $id_course);
    }
}

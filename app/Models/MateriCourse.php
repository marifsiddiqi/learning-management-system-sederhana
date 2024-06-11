<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriCourse extends Model
{
    use HasFactory;
    protected $table = 'materi_courses';
    protected $fillable = ['course_id', 'nama_materi', 'gambar_materi', 'isi_matetri'];
    protected $guarded = [];

    public function course() {
        return $this->belongsTo(Course::class, 'course_id');
    }
}

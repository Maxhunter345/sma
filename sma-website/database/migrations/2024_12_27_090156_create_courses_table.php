<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();  // Kode mata pelajaran (contoh: IF330)
            $table->string('name');           // Nama mata pelajaran
            $table->text('description')->nullable(); // Deskripsi mata pelajaran
            $table->string('type');           // Tipe kelas (LEC, LAB, etc)
            $table->string('semester');       // Semester
            $table->string('academic_year');  // Tahun akademik
            $table->time('start_time')->nullable(); // Waktu mulai
            $table->time('end_time')->nullable();   // Waktu selesai
            $table->string('day')->nullable(); // Hari
            $table->string('room')->nullable(); // Ruangan
            $table->foreignId('teacher_id')   // ID guru pengajar
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();  // Untuk fitur "trash" jika diperlukan
        });

        // Tabel pivot untuk relasi many-to-many antara users (students) dan courses
        Schema::create('course_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Memastikan satu siswa hanya bisa enroll sekali di satu course
            $table->unique(['course_id', 'user_id']);
        });

        // Tabel untuk materi pembelajaran
        Schema::create('course_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->string('type'); // document, video, link, etc
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabel untuk assignments/tugas
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->datetime('due_date');
            $table->integer('max_score')->default(100);
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabel untuk submission tugas
        Schema::create('assignment_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->integer('score')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamps();

            // Satu siswa hanya bisa submit sekali per assignment
            $table->unique(['assignment_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_submissions');
        Schema::dropIfExists('assignments');
        Schema::dropIfExists('course_materials');
        Schema::dropIfExists('course_student');
        Schema::dropIfExists('courses');
    }
};
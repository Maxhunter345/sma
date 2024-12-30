<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Buat tabel majors jika belum ada
        if (!Schema::hasTable('majors')) {
            Schema::create('majors', function (Blueprint $table) {
                $table->id();
                $table->string('name');   // IPA, IPS
                $table->string('code');   // science, social
                $table->timestamps();
            });

            // Insert data awal untuk majors
            DB::table('majors')->insert([
                ['name' => 'IPA', 'code' => 'science', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'IPS', 'code' => 'social', 'created_at' => now(), 'updated_at' => now()],
            ]);
        }

        // Insert data awal untuk grades jika tabel sudah ada tapi kosong
        if (Schema::hasTable('grades') && DB::table('grades')->count() === 0) {
            DB::table('grades')->insert([
                ['level' => 10, 'name' => 'X', 'created_at' => now(), 'updated_at' => now()],
                ['level' => 11, 'name' => 'XI', 'created_at' => now(), 'updated_at' => now()],
                ['level' => 12, 'name' => 'XII', 'created_at' => now(), 'updated_at' => now()],
            ]);
        }

        // Tambah kolom ke users
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'grade_id')) {
                $table->foreignId('grade_id')->nullable()->constrained()->onDelete('set null');
            }
            if (!Schema::hasColumn('users', 'major_id')) {
                $table->foreignId('major_id')->nullable()->constrained()->onDelete('set null');
            }
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('student'); // admin, student, teacher
            }
        });

        // Tambah kolom ke courses
        Schema::table('courses', function (Blueprint $table) {
            if (!Schema::hasColumn('courses', 'grade_id')) {
                $table->foreignId('grade_id')->nullable()->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('courses', 'major_id')) {
                $table->foreignId('major_id')->nullable()->constrained()->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['grade_id']);
            $table->dropForeign(['major_id']);
            $table->dropColumn(['grade_id', 'major_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['grade_id']);
            $table->dropForeign(['major_id']);
            $table->dropColumn(['grade_id', 'major_id', 'role']);
        });

        // Hanya drop tabel majors karena grades dibuat di migration lain
        Schema::dropIfExists('majors');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->integer('level'); // 10, 11, 12
            $table->string('name');   // X, XI, XII
            $table->timestamps();
        });

        Schema::create('majors', function (Blueprint $table) {
            $table->id();
            $table->string('name');   // IPA, IPS
            $table->string('code');   // science, social
            $table->timestamps();
        });

        // Tambahkan kolom untuk grade dan major di users
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('grade_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('major_id')->nullable()->constrained()->onDelete('set null');
            $table->string('role')->default('student'); // admin, student, teacher
        });

        // Tambahkan kolom untuk grade dan major di courses
        Schema::table('courses', function (Blueprint $table) {
            $table->foreignId('grade_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('major_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
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

        Schema::dropIfExists('majors');
        Schema::dropIfExists('grades');
    }
};
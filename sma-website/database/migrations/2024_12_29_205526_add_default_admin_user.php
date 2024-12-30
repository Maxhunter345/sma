<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Pastikan kolom is_admin ada
        if (!Schema::hasColumn('users', 'is_admin')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('is_admin')->default(false);
            });
        }

        // Hanya insert admin jika belum ada
        if (!DB::table('users')->where('email', 'admin@admin.com')->exists()) {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    public function down()
    {
        DB::table('users')->where('email', 'admin@admin.com')->delete();
    }
};
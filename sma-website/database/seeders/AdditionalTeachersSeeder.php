<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;

class AdditionalTeachersSeeder extends Seeder
{
    public function run()
    {
        $teachers = [
            ['name' => 'Drs. Khoerudin', 'subject' => 'Sosiologi'],
            ['name' => 'Sri Ulina Singarimbun, S.Pd', 'subject' => 'Sosiologi'],
            ['name' => 'Gian Sugiana, S.Pd', 'subject' => 'Sosiologi'],
            ['name' => 'M. Ifdlol Abdul Hafid, S.Pd', 'subject' => 'Antropologi'],
        ];
        
        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}

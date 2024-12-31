<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        $teachers = [
            ['name' => 'Ejeh Jaitun, S.Ag', 'subject' => 'Pend. Agama dan Budi Pekerti'],
            ['name' => 'Maralo Sagala, S.PAK', 'subject' => 'Pend. Agama dan Budi Pekerti'],
            ['name' => 'Abdul Muhyidin, S.Pd.I', 'subject' => 'Pend. Agama dan Budi Pekerti'],
            ['name' => 'Iqbal Irawan, S.Pd.I', 'subject' => 'Pend. Agama dan Budi Pekerti'],
            ['name' => 'Siti Hasanah, M.Pd', 'subject' => 'Pend. Pancasila dan Kewarganegaraan'],
            ['name' => 'Puji Astuti, S.Pd', 'subject' => 'Pend. Pancasila dan Kewarganegaraan'],
            ['name' => 'Imaniar Indah Sri L, S.Pd', 'subject' => 'Pend. Pancasila dan Kewarganegaraan'],
            ['name' => 'Mayang Santika, S.Pd', 'subject' => 'Bahasa Indonesia'],
            ['name' => 'Dian Pertiwi, S.Pd', 'subject' => 'Bahasa Indonesia'],
            ['name' => 'Andri Darmawan, S.Pd', 'subject' => 'Bahasa Indonesia'],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}

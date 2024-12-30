<?php

namespace App\Imports;

use App\Models\Ppdb;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PpdbImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Ppdb([
            'nisn' => $row['nisn'],
            'name' => $row['name'],
            'asal_sekolah' => $row['asal_sekolah'],
        ]);
    }
}
<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Pelajar;

class BulkPelajarImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if ($row[0] != 'Nama') {
                $pelajar = new Pelajar();
                $pelajar->Nama = $row[0];
                $pelajar->NoKP = $row[1];
                $pelajar->Kod_IPT = $row[2];
                $pelajar->Tarikh_Data = now();
                $pelajar->save();
            }
        }
    }
}

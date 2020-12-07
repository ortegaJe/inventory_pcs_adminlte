<?php

namespace App\Exports;

use App\Campu;
use Maatwebsite\Excel\Concerns\FromCollection;

class CampusExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Campu::all();
    }
}

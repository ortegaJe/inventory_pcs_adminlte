<?php

namespace App\Exports;

use App\Machine;
use Maatwebsite\Excel\Concerns\FromCollection;

class MachinesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Machine::all();
    }
}

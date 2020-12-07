<?php

namespace App\Exports;

use App\Machine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class MachinesViewExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $machines = DB::table('machines AS m')
                ->join('types AS t', 't.id', '=', 'm.type_id')
                ->join('campus AS c', 'c.id', '=', 'm.campus_id')
                ->join('rams AS r', 'r.id', '=', 'm.ram_slot_00_id')
                ->select('m.id','t.name','m.serial','m.manufacturer','m.model','m.cpu','r.ram',
                    'm.name_pc','m.ip_range','m.mac_address','m.anydesk','m.os',
                    'm.location','m.comment','m.created_at','c.campu_name')
                ->whereNull('deleted_at')
                ->get();

        return view('machines.table_machines', [
            'machines' => $machines
        ]);
    }
}

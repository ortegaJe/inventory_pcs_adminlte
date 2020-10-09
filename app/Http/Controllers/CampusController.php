<?php

namespace App\Http\Controllers;

use App\Campu;
use App\Machine;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampusController extends Controller
{
    public function all()
    {
        $machines = DB::select('SELECT `id`,`serial`, `lote`, `type_id`, `manufacturer`, 
                                       `model`, `ram_slot_00_id`, `ram_slot_01_id`, 
                                       `hard_drive`, `cpu`, `ip_range`, `mac_address`,
                                       `anydesk`, `campus_id`, `location`, `image`, 
                                       `comment`, `created_at`, `updated_at` 
                                        FROM 
                                       `machines` WHERE campus_id=1', [1]);
        $types = DB::select('SELECT id,name FROM types', [1]);
        $rams = DB::select('SELECT id,ram FROM rams', [1]);
        $options = DB::select('SELECT id,label FROM options', [1]);
        $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
        $campus = DB::select('SELECT id,name FROM campus', [1]);

        return view('sede.mac', [
            'machines' => $machines,
            'types' => $types,
            'campus' => $campus,
            'rams' => $rams,
            'options' => $options,
            'hddss' => $hdds
        ]);
    }
}

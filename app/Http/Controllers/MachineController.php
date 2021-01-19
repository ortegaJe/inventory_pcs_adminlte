<?php

namespace App\Http\Controllers;

use App\Exports\MachinesCsvExport;
use App\Exports\MachinesExport;
use App\Http\Requests\MachineFormRequest;
use Illuminate\Http\Request;
use App\Machine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\UserSystemInfoHelper;
use App\Http\Requests\StoreFormRequest;
use App\Type;
use Maatwebsite\Excel\Excel;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class MachineController extends Controller
{

  public function __construct(Excel $excel)
  {
    $this->middleware('admin');
    $this->middleware('verified');
    $this->excel = $excel;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    //info_box//
    $global_atril_count = Machine::where('status_deleted_at', '=', [1])
      ->where('deleted_at', '=', NULL)
      ->where('type_id', '=', [2])
      ->count();

    $type_atril = DB::table('types')->get(); //nombres de los tipos

    $global_pc_count = DB::table('machines')
      ->select('type_id', 'campus_id', 'status_deleted_at')
      ->where('status_deleted_at', '=', [1])
      ->where('deleted_at', '=', NULL)
      ->where('type_id', '=', [1])
      ->count();

    $type_pc = DB::table('types')->get();

    $global_laptop_count = DB::table('machines')
      ->select('type_id', 'campus_id', 'status_deleted_at')
      ->where('status_deleted_at', '=', [1])
      ->where('deleted_at', '=', NULL)
      ->where('type_id', '=', [3])
      ->count();

    $type_laptop = DB::table('types')->get();

    $global_berry_count = DB::table('machines')
      ->select('type_id', 'campus_id', 'status_deleted_at')
      ->where('status_deleted_at', '=', [1])
      ->where('deleted_at', '=', NULL)
      ->where('type_id', '=', [4])
      ->count();

    $type_berry = DB::table('types')->get();
    //end info_box//

    $act_recent_machines = DB::table('machines AS m')
      ->join('types AS t', 't.id', '=', 'm.type_id')
      ->join('campus AS c', 'c.id', '=', 'm.campus_id')
      ->select([
        'm.id',
        't.name',
        'm.serial',
        'm.ip_range',
        'm.created_at',
        'c.campu_name'
      ])
      ->where('m.status_deleted_at', '=', 1)
      //->where('m.created_at', '!=', now())
      ->orderByDesc('m.created_at')
      ->limit(3)
      ->get();


    $upd_recent_machines = DB::table('machines AS m')
      ->join('types AS t', 't.id', '=', 'm.type_id')
      ->join('campus AS c', 'c.id', '=', 'm.campus_id')
      ->select([
        'm.id',
        't.name',
        'm.serial',
        'm.ip_range',
        'm.updated_at',
        'c.campu_name'
      ])
      ->where('m.status_deleted_at', '=', 1)
      //->where('m.updated_at', '<', now())
      ->orderByDesc('m.updated_at')
      ->limit(3)
      ->get();

    if ($request->ajax()) {
      DB::statement(DB::raw('set @rownum=0'));
      $machines = DB::table('machines AS m')
        ->leftJoin('types AS t', 't.id', '=', 'm.type_id')
        ->leftJoin('campus AS c', 'c.id', '=', 'm.campus_id')
        ->leftJoin('status_codes AS code_s', 'code_s.id_code', '=', 'm.id_statu')
        ->leftJoin('status AS statu_description', 'statu_description.id_statu', '=', 'code_s.id_statu')
        ->select([
          DB::raw('@rownum  := @rownum  + 1 AS rownum'),
          'm.id',
          't.name',
          'm.serial',
          'm.serial_monitor',
          'm.manufacturer',
          'm.model',
          'm.cpu',
          'm.name_pc',
          'm.ip_range',
          'm.mac_address',
          'm.anydesk',
          'm.os',
          'm.location',
          'm.comment',
          'm.created_at',
          'c.campu_name',
          'statu_description.description'
        ])->where('m.status_deleted_at', '=', [1])
        ->whereIn('m.id_statu', [1, 2, 3, 4])
        ->whereNull('m.deleted_at');

      $datatables = DataTables::of($machines);

      $datatables->addColumn('rownum', 'whereRaw', '@rownum  + 1');

      $datatables->editColumn('m.created_at', function ($machines) {
        return $machines->created_at ? with(new Carbon($machines->created_at))
          ->toDayDateTimeString() : '';
      });
      $datatables->blacklist(['deleted_at']);
      $datatables->addColumn('action', 'machines.actions');
      $datatables->rawColumns(['action']);
      return $datatables->make(true);
    }

    return view(
      'machines.index',
      [
        'act_recent_machines' => $act_recent_machines,
        'upd_recent_machines' => $upd_recent_machines,
        'global_atril_count' => $global_atril_count,
        'type_atril' => $type_atril,
        'global_pc_count' => $global_pc_count,
        'type_pc' => $type_pc,
        'global_laptop_count' => $global_laptop_count,
        'type_laptop' => $type_laptop,
        'global_berry_count' => $global_berry_count,
        'type_berry' => $type_berry
      ]
    );
  }

  /*return Datatables::of(User::withTrashed())
                ->withTrashed()
                ->make(true);*/

  public function charts(Request $request)
  {
    return 'hello';
  }

  public function export_csv()
  {
    return new MachinesCsvExport;
  }

  public function export_excel()
  {
    return new MachinesExport;
  }

  public function exportPdf()
  {
    //return new MachinesPdfExport;
    //return $this->excel->download(new MachinesPdfExport, 'invoices.pdf', Excel::DOMPDF);
    $machines = Machine::table('machines')
      ->select(
        'types.name',
        'machines.serial',
        'machines.serial_monitor',
        'machines.manufacturer',
        'machines.model',
        'machines.cpu',
        'hdds.size',
        'hdds.type',
        'ram0.ram AS r0',
        'ram1.ram AS r1',
        'machines.name_pc',
        'machines.ip_range',
        'machines.mac_address',
        'machines.anydesk',
        'machines.os',
        'machines.location',
        'machines.comment',
        'machines.created_at',
        'campus.campu_name'
      )
      ->leftJoin('types', 'types.id', '=', 'machines.type_id')
      ->leftJoin('hdds', 'hdds.id', '=', 'machines.hard_drive_id')
      ->leftJoin('campus', 'campus.id', '=', 'machines.campus_id')
      ->leftJoin('rams AS ram0', 'ram0.id', '=', 'machines.ram_slot_00_id')
      ->leftJoin('rams AS ram1', 'ram1.id', '=', 'machines.ram_slot_01_id')
      ->where('machines.status_deleted_at', '=', 1)
      ->orderBy('machines.id', 'DESC')
      ->get();

    $pdf = PDF::loadView(
      'machines.export_pdf_table',
      [
        'machines' => $machines
      ]
    )->setPaper('a4', 'landscape');

    return $pdf->stream('inventor_export_all_machines.pdf');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
    //$types = DB::select('SELECT id,name FROM types', [1]);
    $types = Type::select('id', 'name')->get();
    $rams = DB::select('SELECT id,ram FROM rams', [1]);
    $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
    $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
    $roles = DB::select('SELECT id FROM roles', [1]);
    $status_code = DB::select('SELECT STATUS_CODE.id_code AS ID_CODE,STATUS.description AS DESCRIPTION,STATUS.ico AS BADGE,STATUS.created_at,STATUS.updated_at FROM status_codes AS STATUS_CODE 
                                INNER JOIN status AS STATUS ON STATUS_CODE.id_statu = STATUS.id_statu
                                WHERE ID_CODE IN (1,2,3,4)', [1]);

    //$getip = UserSystemInfoHelper::get_ip();
    $findmacaddress = exec('getmac');
    $getmacaddress = strtok($findmacaddress, ' ');
    $getos = UserSystemInfoHelper::get_os();


    return view('machines.create', [
      'getmacaddress' => $getmacaddress,
      'getos' => $getos,
      //'getip' => $getip,
      //'types' => $types,
      'types' => $types,
      'campus' => $campus,
      //'mac_campus' => $mac_campus,
      'rams' => $rams,
      'hdds' => $hdds,
      'roles' => $roles,
      'status_code' => $status_code
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreFormRequest $request)
  {
    //$getip = UserSystemInfoHelper::get_ip();
    //$findmacaddress = exec('getmac');
    //$getmacaddress = strtok($findmacaddress, ' ');
    //$getos = UserSystemInfoHelper::get_os();
    $roles = Auth::user()->rol_id;
    $ts = now()->toDateTimeString();
    $machines = new Machine();

    //        [db]           [name] (db campos en la base de datos - name campus en el blade create)
    $machines->type_id = $request['type'];
    $machines->manufacturer = request('manufact');
    $machines->model = request('model');
    $machines->serial = $request['serial'];
    $machines->serial_monitor = $request['serial-monitor'];
    $machines->ram_slot_00_id = $request['ramslot00'];
    $machines->ram_slot_01_id = $request['ramslot01'];
    $machines->hard_drive_id = $request['hard-drive'];
    $machines->cpu = request('cpu');
    $machines->name_pc = request('name-pc');
    $machines->ip_range = $request['ip'];
    $machines->mac_address = $request['mac'];
    $machines->anydesk = request('anydesk');
    $machines->os = request('os');
    $machines->created_by = Auth::user()->id;
    $machines->rol_id = $roles;
    $machines->status_deleted_at = request('status');
    $machines->campus_id = $request['campus'];
    $machines->location = $request['location'];
    $machines->comment = request('comment');
    $machines->id_statu = request('status-code');
    dd($machines);
    //$machines->created_at = $ts;
    $machines->save();

    return redirect('/inventor/machines')->with(
      'machine_created',
      'Nuevo equipo fué añadido al inventario'
    );
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    return view('machines.show', ['machine' => Machine::findOrFail($id)]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($machines)
  {
    $types = DB::select('SELECT id,name FROM types', [1]);
    $rams = DB::select('SELECT id,ram FROM rams', [1]);
    $hdds = DB::select('SELECT id,size,type FROM hdds', [1]);
    $campus = DB::select('SELECT id,campu_name FROM campus', [1]);
    $status_code = DB::select('SELECT STATUS_CODE.id_code AS ID_CODE,STATUS.description AS DESCRIPTION,STATUS.ico AS BADGE,STATUS.created_at,STATUS.updated_at FROM status_codes AS STATUS_CODE 
                                INNER JOIN status AS STATUS ON STATUS_CODE.id_statu = STATUS.id_statu
                                WHERE ID_CODE IN (1,2,3,4)', [1]);

    //$getos = UserSystemInfoHelper::get_os();

    return view('machines.edit', [
      'machine' => Machine::findOrFail($machines),
      'status_code' => $status_code,
      //'getos' => $getos,
      'types' => $types,
      'campus' => $campus,
      'rams' => $rams,
      'hdds' => $hdds
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(MachineFormRequest $request, $id)
  {
    //$getos = UserSystemInfoHelper::get_os();
    //$ts = now()->toDateTimeString();

    $machines = Machine::findOrFail($id);

    //        [db]                 [name] (db campos en la base de datos - name campus en el blade edit)
    $machines->type_id = $request->get('type');
    $machines->manufacturer = $request->get('manufact');
    $machines->model = $request->get('model');
    $machines->serial = $request->get('serial');
    $machines->serial_monitor = $request->get('serial-monitor');
    $machines->ram_slot_00_id = $request->get('ramslot00');
    $machines->ram_slot_01_id = $request->get('ramslot01');
    $machines->hard_drive_id = $request->get('hard-drive');
    $machines->cpu = $request->get('cpu');
    $machines->name_pc = $request->get('name-pc');
    $machines->ip_range = $request->get('ip');
    $machines->mac_address = $request->get('mac');
    $machines->anydesk = $request->get('anydesk');
    $machines->os = $request->get('os');
    $machines->campus_id = $request->get('campus_id');
    $machines->id_statu = request('status-code');
    $machines->location = $request->get('location');
    $machines->comment = $request->get('comment');
    //$machines->updated_at = $ts;

    $machines->save();

    return redirect('/inventor/machines')
      ->with(
        'machine_update',
        'Equipo fue actualizado en el inventario'
      );
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //$status = DB::select('UPDATE machines SET status=0 WHERE deleted_at!= NOW()');
    //SELECT status,deleted_at FROM machines WHERE deleted_at != "" AND status=1
    //SELECT id,status,deleted_at FROM machines WHERE deleted_at != ''  AND status=0
    //SELECT id,status,deleted_at FROM machines WHERE deleted_at IS NULL  AND status=0
    //UPDATE machines SET status=0 WHERE deleted_at!= NOW()
    $machines = Machine::findOrFail($id);

    if ($machines->delete()) { // If softdeleted

      $ts = now()->toDateTimeString();
      $data = array('deleted_at' => $ts, 'status_deleted_at' => 0, 'id_statu' => 5);
      DB::table('machines')->where('id', $id)->update($data);
    }

    return redirect('/inventor/machines')
      ->with(
        'machine_deleted',
        'Equipo eliminado del inventario'
      );
  }
}

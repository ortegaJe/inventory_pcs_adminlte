<?php

namespace App\Http\Controllers;

use App\CancelReport;
use App\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ReportController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $machines = DB::table('machines AS m')
      //->leftJoin('cancel_reports AS cr', 'cr.machine_id', 'm.id')
      ->leftJoin('types AS t', 't.id', 'm.type_id')
      ->leftJoin('campus AS c', 'c.id', 'm.campus_id')
      ->leftJoin('status_codes AS code_s', 'code_s.id_code', 'm.id_statu')
      ->leftJoin('status AS statu_description', 'statu_description.id_statu', 'code_s.id_statu')
      ->select([
        //'cr.id AS repoID',
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
        'm.created_at AS FechaCreacionPC',
        'c.campu_name',
        'statu_description.description AS EstadoPc'
      ])->where('m.status_deleted_at', '=', [1])
      ->whereIn('m.id_statu', [1, 2, 3, 4])
      ->whereNull('m.deleted_at')
      ->orderByDesc('m.id')->paginate(20, ['*'], 'machines');
    //dd($machines);
    return view(
      'machines.reportes.index-report',
      [
        'machines' => $machines,
      ]
    );
  }

  public function createReport($id)
  {
    $cancel_repo_pc = Machine::findOrFail($id);

    $name_reports = DB::table('name_reports')->get();
    $altsolucions = DB::table('altsolucions')->get();

    $repos_cancel = DB::table('cancel_reports AS CR')
      ->leftJoin('machines AS M', 'M.id', 'CR.machine_id')
      ->leftJoin('name_reports AS NR', 'NR.id', 'CR.name_reports_id')
      ->select([
        'CR.id AS BajaRepoID',
        'CR.name_reports_id AS NameRepoID',
        'NR.name AS NombreRepo900',
        'CR.machine_id AS ComputerID',
        'M.serial AS Serial',
        'CR.created_at AS FechaCreacion'
      ])
      ->where('CR.machine_id', $id)
      ->orderByDesc('CR.created_at')
      ->paginate(4, ['*'], 'repos_cancel');

    //$name_reports = DB::table('name_reports')->get();
    //$altsolucions = DB::table('altsolucions')->get();

    $delivery_repos = DB::table('delivery_reports AS DR')
      ->leftJoin('machines AS M', 'M.id', 'DR.machine_id')
      ->leftJoin('name_reports AS NR', 'NR.id', 'DR.name_reports_id')
      ->select([
        'DR.id AS DeliveryRepoID',
        'DR.name_reports_id AS NameRepoID',
        'NR.name AS NombreRepo9001',
        'DR.machine_id AS ComputerID',
        'M.serial AS Serial',
        'DR.created_at AS FechaCreacion'
      ])
      ->where('DR.machine_id', $id)
      ->orderByDesc('DR.created_at')
      ->paginate(4, ['*'], 'delivery_repos');
    //dd($delivery_repo);

    $data =
      [
        'repos_cancel' => $repos_cancel,
        'delivery_repos' => $delivery_repos,
        'name_reports' => $name_reports,
        'altsolucions' => $altsolucions,
        'cancel_repo_pc' => $cancel_repo_pc,
      ];

    return view('machines.reportes.create-report')->with($data);
  }

  public function saveReport(Request $request)
  {

    $rules = [
      'name-depen' => 'required',
      'alt-solucions' =>
      [
        'required',
        Rule::in([1, 'REPARACION NO RENTABLE', 2, 'COMPRAR REPUESTOS PARA REPARACION', 3, 'ENVIAR A SERVICIO TECNICO ESPECIALIZADO', 4, 'REEMPLAZAR POR OBSOLETO', 5, 'REASIGNAR BIENES EN BUEN ESTADO', 6, 'OTROS (Especificar en recudro observaciones)']),
        Rule::notIn([0, 'Seleccionar solucion...']),

      ],
      'diagnostic' => 'required',
    ];

    $messages = [
      'name-depen.required' => 'Nombre de la dependecia es requerido',
      'alt-solucions.required' => 'Seleccione una solución técnica',
      'alt-solucions.in' => 'Seleccione una solución técnica de la lista',
      'alt-solucions.notIn:0' => 'Seleccione una solución técnica valida',
      'diagnostic.required' => 'Es requerido un diagnostico',
    ];

    $validator = Validator::make(
      $request->all(),
      $rules,
      $messages
    );
    if ($validator->fails()) :
      return back()->withErrors($validator)->with(
        'message',
        'Se ha producido un error:'
      )->with(
        'typealert',
        'danger'
      );
    else :
      $cancel_reports = new CancelReport();
      $cancel_reports->act_fijo = $request['act-fijo'];
      $cancel_reports->name_dependency = $request['name-depen'];
      $cancel_reports->s_t = $request['alt-solucions'];
      $cancel_reports->diagnostic = $request['diagnostic'];
      $cancel_reports->observation = $request['observation'];
      $cancel_reports->name_reports_id = $request['id-format'];
      $cancel_reports->user_id = Auth::user()->id;
      $cancel_reports->machine_id = $request['id-machine'];
      //dd($cancel_reports);

      if ($cancel_reports->save()) :
        return back()
          ->withErrors($validator)
          ->with('report_created', 'Reporte creado!');
      endif;
    endif;
  }

  public function generatedReport($id, $nombrerepo, $serial)
  {
    CancelReport::findOrFail($id);

    $name_reports = DB::table('name_reports')->get();

    $generated_report_pc = DB::table('reportBajaComputers')
      ->where('IDCancelRepo', $id)
      ->get();

    $pdf = PDF::loadView(
      'machines.reportes.9000_report.generated-report',
      [
        'generated_report_pc' => $generated_report_pc,
        'name_reports' => $name_reports,
      ]
    );

    return $pdf->stream('formato-informe-tecnico-de-equipos-' . $serial . '.pdf');
  }

  /*public function createReportActaEntrega($id)
  {
    $cancel_repo_pc = Machine::findOrFail($id);

    $name_reports = DB::table('name_reports')->get();
    $altsolucions = DB::table('altsolucions')->get();

    $repos_cancel = DB::table('delivery_reports AS DR')
      ->leftJoin('machines AS M', 'M.id', 'DR.machine_id')
      ->leftJoin('name_reports AS NR', 'NR.id', 'DR.name_reports_id')
      ->select([
        'DR.id AS BajaRepoID',
        'DR.name_reports_id AS NameRepoID',
        'NR.name AS NombreRepo900',
        'DR.machine_id AS ComputerID',
        'M.serial AS Serial',
        'DR.created_at AS FechaCreacion'
      ])
      ->where('DR.machine_id', $id)
      ->orderByDesc('DR.created_at')
      ->paginate(4, ['*'], 'repos_cancel');
    dd($repos_cancel);

    $data =
      [
        'repos_cancel' => $repos_cancel,
        'name_reports' => $name_reports,
        'altsolucions' => $altsolucions,
        'cancel_repo_pc' => $cancel_repo_pc,
      ];

    return view('machines.reportes.create-report')->with($data);
  }*/

  public function saveReportActaEntrega(Request $request)
  {

    $rules = [
      'name-depen' => 'required',
      'alt-solucions' =>
      [
        'required',
        Rule::in([1, 'REPARACION NO RENTABLE', 2, 'COMPRAR REPUESTOS PARA REPARACION', 3, 'ENVIAR A SERVICIO TECNICO ESPECIALIZADO', 4, 'REEMPLAZAR POR OBSOLETO', 5, 'REASIGNAR BIENES EN BUEN ESTADO', 6, 'OTROS (Especificar en recudro observaciones)']),
        Rule::notIn([0, 'Seleccionar solucion...']),

      ],
      'diagnostic' => 'required',
    ];

    $messages = [
      'name-depen.required' => 'Nombre de la dependecia es requerido',
      'alt-solucions.required' => 'Seleccione una solución técnica',
      'alt-solucions.in' => 'Seleccione una solución técnica de la lista',
      'alt-solucions.notIn:0' => 'Seleccione una solución técnica valida',
      'diagnostic.required' => 'Es requerido un diagnostico',
    ];

    $validator = Validator::make(
      $request->all(),
      $rules,
      $messages
    );
    if ($validator->fails()) :
      return back()->withErrors($validator)->with(
        'message',
        'Se ha producido un error:'
      )->with(
        'typealert',
        'danger'
      );
    else :
      $cancel_reports = new CancelReport();
      $cancel_reports->act_fijo = $request['act-fijo'];
      $cancel_reports->name_dependency = $request['name-depen'];
      $cancel_reports->s_t = $request['alt-solucions'];
      $cancel_reports->diagnostic = $request['diagnostic'];
      $cancel_reports->observation = $request['observation'];
      $cancel_reports->name_reports_id = $request['id-format'];
      $cancel_reports->user_id = Auth::user()->id;
      $cancel_reports->machine_id = $request['id-machine'];
      //dd($cancel_reports);

      if ($cancel_reports->save()) :
        return back()
          ->withErrors($validator)
          ->with('report_created', 'Reporte creado!');
      endif;
    endif;
  }

  public function generatedReportActaEntrega($id)
  {
    CancelReport::findOrFail($id);

    $name_reports = DB::table('name_reports')->get();

    $generated_report_pc = DB::table('reportBajaComputers')
      ->where('IDCancelRepo', $id)
      ->get();

    $pdf = PDF::loadView(
      'machines.reportes.9001_report.generated-report',
      [
        'generated_report_pc' => $generated_report_pc,
        'name_reports' => $name_reports,
      ]
    );

    return $pdf->stream('formato-acta-de-entrega-equipos-computacionales.pdf');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //PROBAR ENVIANDO EL PARAMETRO $ID
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function store(Request $request)
  {
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id, $serial)
  {
    $cancel_repo_pcs = CancelReport::findOrFail($id);

    $name_reports = DB::table('name_reports')->get();
    $altsolucions = DB::table('altsolucions')->get();

    $repos_cancel = DB::table('cancel_reports AS CR')
      ->leftJoin('machines AS M', 'M.id', 'CR.machine_id')
      ->leftJoin('name_reports AS NR', 'NR.id', 'CR.name_reports_id')
      ->select([
        'CR.id AS BajaRepoID',
        'CR.name_reports_id AS NameRepoID',
        'NR.name AS NombreRepo900',
        'CR.machine_id AS ComputerID',
        'M.serial AS Serial',
        'CR.created_at AS FechaCreacion'
      ])
      ->where('CR.id', $id)
      ->orderByDesc('CR.created_at')
      ->paginate(8, ['*'], 'repos_cancel');

    $data =
      [
        'cancel_repo_pcs' => $cancel_repo_pcs,
        'name_reports' => $name_reports,
        'altsolucions' => $altsolucions,
        'repos_cancel' => $repos_cancel,
      ];

    return view('machines.reportes.9000_report.create-report')->with($data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}

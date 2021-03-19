<?php

namespace App\Http\Controllers;

use App\CancelReport;
use App\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ReportController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $machines = DB::table('cancel_reports AS cr')
      ->leftJoin('machines AS m', 'm.id', '=', 'cr.machine_id')
      ->leftJoin('types AS t', 't.id', '=', 'm.type_id')
      ->leftJoin('campus AS c', 'c.id', '=', 'm.campus_id')
      ->leftJoin('status_codes AS code_s', 'code_s.id_code', '=', 'm.id_statu')
      ->leftJoin('status AS statu_description', 'statu_description.id_statu', '=', 'code_s.id_statu')
      ->select([
        'cr.id AS repoID',
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
        'statu_description.description AS EstadoPc'
      ])->where('m.status_deleted_at', '=', [1])
      ->whereIn('m.id_statu', [1, 2, 3, 4])
      ->whereNull('m.deleted_at')
      ->orderByDesc('m.id')->paginate(20, ['*'], 'machines');
    //dd($machines);
    return view(
      'machines.reportes.9000_report.index-report',
      [
        'machines' => $machines,
      ]
    );
  }

  public function createReport($id, $serial)
  {
    $cancel_repo_pc = CancelReport::findOrFail($id);

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
        'name_reports' => $name_reports,
        'altsolucions' => $altsolucions,
        'cancel_repo_pc' => $cancel_repo_pc,
        'repos_cancel' => $repos_cancel,
      ];

    return view('machines.reportes.9000_report.create-report')->with($data);
  }

  public function saveReport(Request $request, $id)
  {
    $cancel_reports = CancelReport::findOrFail($id);

    $cancel_reports->act_fijo = $request->get('act-fijo');
    $cancel_reports->name_dependency = $request->get('name-depen');
    $cancel_reports->s_t = $request->get('alt-solucions');
    $cancel_reports->diagnostic = $request->get('diagnostic');
    $cancel_reports->observation = $request->get('observation');
    $cancel_reports->name_reports_id = $request->get('id-format');
    $cancel_reports->user_id = Auth::user()->id;
    //$cancel_reports->machine_id = $request->get('id-machine');
    //dd($cancel_reports);

    $cancel_reports->save();

    return back();
  }

  public function generatedReport($id, $nombrerepo, $serial)
  {
    CancelReport::findOrFail($id);

    $name_reports = DB::table('name_reports')->get();

    $generated_report_pc = DB::table('reportBajaComputers')
      ->where('IDCancelRepo', '=', $id)
      ->get();

    $pdf = PDF::loadView(
      'machines.reportes.generated-report',
      [
        'generated_report_pc' => $generated_report_pc,
        'name_reports' => $name_reports,
      ]
    );

    return $pdf->stream('formato-informe-tecnico-de-equipos-' . $serial . '.pdf');
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
  public function edit($id)
  {
    //
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

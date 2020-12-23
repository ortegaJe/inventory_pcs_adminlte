<?php

namespace App\Exports;

use App\Machine;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class SoledadExport implements
    FromCollection,
    Responsable,
    //ShouldAutoSize,
    WithColumnWidths,
    WithHeadings,
    WithEvents,
    WithCustomStartCell
{
    use Exportable;

    private $fileName = "inventor_machines_sol.xlsx";
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        DB::statement(DB::raw('set @rownum=0'));
        return DB::table('machines')
            ->select(
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
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
            ->where('campus.label', '=', 'SOL')
            ->orderBy('rownum', 'ASC')
            ->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'TIPO DE MAQUINA',
            'SERIAL',
            'MONITOR S/N',
            'FABRICANTE',
            'MODELO',
            'PROCESADOR',
            'DISCO DURO TAMAÑO',
            'DISCO DURO TIPO',
            'MEMORIA RAM SLOT 1',
            'MEMORIA RAM SLOT 2',
            'NOMBRE DEL EQUIPO',
            'IP',
            'MAC',
            'ANYDESK',
            'SISTEMA OPERATIVO',
            'UBICACIÓN',
            'OBSERVACION',
            'FECHA DE CREACIÓN',
            'SEDE' //19
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:U500')->getFont()->setName('Nunito');
                $event->sheet->insertNewColumnBefore('A', 1);
                $event->sheet->getRowDimension('2')->setRowHeight(30);
                $event->sheet->getRowDimension('3')->setRowHeight(25);
                $event->sheet->setAutoFilter('B3:U3');
                $event->sheet->mergeCells('B1:C1');
                $event->sheet->getCell('B1')->setValue("Generado: ");
                $time = Carbon::now()->toDayDateTimeString();
                $event->sheet->setCellValue('D1', ($time));
                $event->sheet->getStyle('D1')->getNumberFormat()
                    ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
                $event->sheet->mergeCells('B2:U2');
                $event->sheet->getStyle('B2:U2')
                    ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
                $event->sheet->getCell('B2')->setValue("INVENTARIO DE EQUIPOS REGISTRADOS | SEDE VIVA 1A SOLEDAD");
                $event->sheet->getStyle('B2:U2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 18,
                    ],
                ]);
                $event->sheet->getStyle('B3:U3')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 10,
                        "color" => ["rgb" => "FFFFFF"]
                    ],
                    "fill" => [
                        "fillType" => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        "startColor" => ["rgb" => "636E72"]
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '#7f8c8d'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('B4:U500')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '#7f8c8d'],
                        ],
                    ],
                    'font' => [
                        'size' => 9,
                    ],
                ]);
            }
        ];
    }

    public function startCell(): string
    {
        return 'A3';
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            //'B' => 45,
        ];
    }
}

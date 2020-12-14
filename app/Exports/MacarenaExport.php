<?php

namespace App\Exports;

use App\Machine;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class MacarenaExport implements
    FromCollection,
    Responsable,
    //ShouldAutoSize,
    WithHeadings,
    WithEvents,
    WithCustomStartCell
{
    use Exportable;

    private $fileName = "inventor_machines_mac.xlsx";
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('machines')
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
            ->where('campus.label', '=', 'MAC')
            ->orderBy('machines.id', 'ASC')
            ->get();
    }

    public function headings(): array
    {
        return [
            //'#',
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
                $event->sheet->insertNewColumnBefore('A', 1);
                //$event->sheet->getRowDimension('2')->setRowHeight(60);
                $event->sheet->getRowDimension('3')->setRowHeight(25);
                $event->sheet->setAutoFilter('B3:T3');
                $event->sheet->getStyle('B3:T3')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                    ],
                    "fill" => [
                        "fillType" => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        "startColor" => ["rgb" => "28A745"]
                    ],
                    "font" => [
                        "color" => ["rgb" => "FFFFFF"]
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '#7f8c8d'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('B4:S500')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '#7f8c8d'],
                        ],
                    ]
                ]);
            }
        ];
    }

    public function startCell(): string
    {
        return 'A3';
    }
}

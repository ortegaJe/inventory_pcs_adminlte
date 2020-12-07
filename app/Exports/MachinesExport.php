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

class MachinesExport implements
    FromCollection,
    Responsable,
    ShouldAutoSize,
    WithHeadings,
    WithEvents,
    WithCustomStartCell
{
    use Exportable;

    private $fileName = "inventor_all_machines.xlsx";
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('machines AS m')
            ->join('types AS t', 't.id', '=', 'm.type_id')
            ->join('campus AS c', 'c.id', '=', 'm.campus_id')
            ->join('rams AS r', 'r.id', '=', 'm.ram_slot_00_id')
            ->join('rams AS ra', 'ra.id', '=', 'm.ram_slot_01_id')
            ->select(
                't.name',
                'm.serial',
                'm.manufacturer',
                'm.model',
                'm.cpu',
                'r.ram',
                'ra.ram',
                'm.name_pc',
                'm.ip_range',
                'm.mac_address',
                'm.anydesk',
                'm.os',
                'm.location',
                'm.comment',
                'm.created_at',
                'c.campu_name'
            )->whereNull('deleted_at')->get();

        /*SELECT  t.name,m.serial,m.manufacturer,m.model,m.cpu,r0.ram,r1.ram,
        m.name_pc,m.ip_range,m.mac_address,m.anydesk,m.os,
        m.location,m.comment,m.created_at,c.campu_name
FROM machines AS m
INNER JOIN types AS t ON t.id = m.type_id
INNER JOIN campus AS c ON c.id = m.campus_id
INNER JOIN rams AS r0 ON  m.ram_slot_00_id  = r0.id
FULL JOIN rams AS r1 ON  m.ram_slot_01_id  = r1.id*/
    }

    public function headings(): array
    {
        return [
            'TIPO DE MAQUINA',
            'SERIAL',
            'FABRICANTE',
            'MODELO',
            'PROCESADOR',
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
            'SEDE'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->insertNewColumnBefore('A', 1);
                //$event->sheet->getRowDimension('2')->setRowHeight(60);
                $event->sheet->getRowDimension('3')->setRowHeight(20);
                $event->sheet->getStyle('B3:R3')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                    ],
                    "fill" => [
                        "fillType" => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        "startColor" => ["rgb" => "595959"]
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
                $event->sheet->getStyle('B4:R500')->applyFromArray([
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

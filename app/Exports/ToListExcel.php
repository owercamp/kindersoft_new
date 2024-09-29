<?php

namespace App\Exports;

use App\Models\Achievement;
use App\Models\Intelligence;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ToListExcel implements FromCollection, WithTitle, WithHeadings, WithStyles, WithColumnWidths
{
  public function title(): string
  {
    return 'Listado de Logros';
  }

  public function collection()
  {
    return Intelligence::select('name')->get();
  }

  public function headings(): array
  {
    return ['INTELIGENCIAS'];
  }

  public function styles(Worksheet $sheet)
  {
    return [
      'A1' => [
        'font' => [
          'bold' => true,
          'size' => 12,
          'color' => [
            'argb' => 'fff0ffff'
          ]
        ],
        'alignment' => [
          'horizontal' => 'center'
        ],
        'fill' => [
          'fillType' => 'solid',
          'color' => [
            'argb' => 'ff538dd5'
          ]
        ]
      ],

      'A2:A20' => [
        'alignment' => [
          'horizontal' => 'center'
        ],
        'borders' => [
          'allBorders' => [
            'borderStyle' => \PHPOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'ff538dd5']
          ]
        ]
      ]
    ];
  }

  public function columnWidths(): array
  {
    return [
      'A' => 20
    ];
  }
}

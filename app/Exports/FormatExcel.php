<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FormatExcel implements FromView, WithStyles, WithColumnWidths, WithTitle
{
  public function title(): string
  {
    return 'Formato';
  }
  public function view(): View
  {
    return view('template.Achievement');
  }

  public function styles(Worksheet $sheet)
  {
    return [
      'A1:B1' => [
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
        ]
      ],

      'A2:B20' => [
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
      'A' => 20,
      'B' => 40,
    ];
  }
}

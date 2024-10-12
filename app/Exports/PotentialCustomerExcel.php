<?php

namespace App\Exports;

use App\Models\PotentialCustomer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PotentialCustomerExcel implements FromView, ShouldAutoSize, WithStyles
{
  protected $id;

  public function __construct(int $id)
  {
    $this->id = $id;
  }

  public function styles(Worksheet $sheet)
  {
    $sheet->getStyle('A1:B1')->getFont()->setBold(true);
    $sheet->getStyle('A1:B1')->getFont()->setSize(14);
    $sheet->getStyle('A1:B1')->getAlignment()->setHorizontal('center')->setVertical('center');
    $sheet->getStyle('A1:B1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $sheet->getStyle('A1:B1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
    $sheet->getStyle('A1:B1')->getFill()->getStartColor()->setARGB('FFA8ADF7');
    $sheet->getStyle('A1:B1')->getFont()->getColor()->setARGB('FFFFFFFF');
    $sheet->getStyle('A1:B1')->getAlignment()->setWrapText(true);
    $sheet->getStyle('A2:B9')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $sheet->getStyle('A2:B9')->getBorders()->getAllBorders()->getColor()->setARGB('FFA8ADF7');
    $sheet->getStyle('A2:B9')->getAlignment()->setHorizontal('center')->setVertical('center');
  }

  public function view(): View
  {
    $potentialCustomer = PotentialCustomer::with('genre:id,name')->find($this->id);
    return view('template.potential-customer', compact('potentialCustomer'));
  }
}

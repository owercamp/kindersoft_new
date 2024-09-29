<?php

namespace App\Exports;

use App\Exports\FormatExcel;
use App\Exports\ToListExcel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AchievementExcel implements WithMultipleSheets
{
  public function sheets(): array
  {
    return [
      new FormatExcel(),
      new ToListExcel()
    ];
  }
}

<?php

namespace App\Imports;

use App\Imports\ImportArchievement;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AchievementImport implements WithMultipleSheets
{
  public function sheets(): array
  {
    return [
      "Formato" => new ImportArchievement()
    ];
  }
}

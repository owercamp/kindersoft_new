<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class RemarkImport implements WithMultipleSheets
{
  public function sheets(): array
  {
    return [
      "Formato" => new ImportRemark()
    ];
  }
}

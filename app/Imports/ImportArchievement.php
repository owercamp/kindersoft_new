<?php

namespace App\Imports;

use App\Models\Achievement;
use App\Models\Intelligence;
use App\Service\AchievementService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportArchievement implements ToCollection
{
  public function collection(Collection $rows)
  {
    foreach ($rows as $row) {
      if ($row[0] != "Inteligencia") {
        $intelligence_id = self::getIntelligence($row[0]);
        $increment = AchievementService::get_consulting_increment('achievements', 'register');
        $description = $row[1];

        if ($intelligence_id) {
          $register = new Achievement();
          $register->intelligence_id = $intelligence_id;
          $register->register = $increment;
          $register->description = $description;
          $register->save();
        }
      }
    }
  }

  private function getIntelligence($data)
  {
    $intelligence = Intelligence::where('name', $data)->value('id');
    return $intelligence;
  }
}

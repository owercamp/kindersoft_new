<?php

namespace App\Service;

use App\Models\Scheduling;
use Carbon\Carbon;

class StadisticService extends ConsultingServices
{
  public static function data_year(int $year_now, int $year_before)
  {
    $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    $years = [];

    for ($i = $year_before; $i <= $year_now; $i++) {
      $info_year = Scheduling::whereBetween('date', [$i . '-01-01', $i . '-12-31'])->get();
      $counter_month = [];
      $counter_month_attended = [];
      $counter_month_not_attended = [];

      foreach ($months as $month) {
        $count_attended = 0;
        $count_not_attended = 0;
        foreach ($info_year as $register) {
          if (Carbon::parse($register->date)->format('m') == $month) {
            if ($register->attended == 'attended') {
              $count_attended++;
            }
            if ($register->attended == 'not attended') {
              $count_not_attended++;
            }
          }
        }
        $counter_month_attended[] = $count_attended;
        $counter_month_not_attended[] = $count_not_attended;
      }
      $counter_month['attended']['name'] = __('Attended') . " " . $i;
      $counter_month['attended']['type'] = "column";
      $counter_month['attended']['data'] = $counter_month_attended;
      $counter_month['not_attended']['name'] = __('Not Attended') . " " . $i;
      $counter_month['not_attended']['type'] = "column";
      $counter_month['not_attended']['data'] = $counter_month_not_attended;
      $years[$i] = $counter_month;
    }

    return $years;
  }
}

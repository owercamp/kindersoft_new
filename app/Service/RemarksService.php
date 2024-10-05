<?php

namespace App\Service;

use App\Livewire\Forms\AchievementForm;
use App\Models\Remark;
use App\Service\ConsultingServices;
use App\Service\Notified\SuccessNotification;

class RemarksService extends ConsultingServices
{
  public static function store(AchievementForm $achievementForm): bool
  {
    $achievement = new Remark();
    $achievement->intelligence_id = $achievementForm->intelligence;
    $achievement->register = $achievementForm->register;
    $achievement->description = $achievementForm->description;
    if ($achievement->save()) {
      return true;
    }

    return false;
  }

  public static function delete(int $id): bool
  {
    $exists = ConsultingServices::get_exists('achievements', [
      ['id', $id]
    ]);
    if ($exists) {
      $deleted = Remark::where('id', $id)->delete();
      if ($deleted) {
        return true;
      } else {
        return false;
      }
    }
  }

  public static function edit(AchievementForm $achievementForm, int $id, int $status)
  {
    $exists = RemarksService::information($id);
    if ($exists) {
      $exists->intelligence_id = $achievementForm->intelligence;
      $exists->register = $achievementForm->register;
      $exists->description = $achievementForm->description;
      $exists->status_id = $status;
      if ($exists->save()) {
        return SuccessNotification::get_notifications('success', __('Successfully Updated Record'), 1500, 'completed');
      }
    }
  }
  public static function all()
  {
    $archievements = Remark::with('intelligence:id,name', 'status:id,name')->paginate(10);
    return $archievements;
  }
  public static function status()
  {
    $status = ConsultingServices::status();
    return $status;
  }
  public static function information(int $id)
  {
    return Remark::with('status:id,name', 'intelligence:id,name')->find($id);
  }
  public static function searchingIntelligence(int $id)
  {
    $intelligence = IntelligenceService::information($id);
    return $intelligence->register;
  }
}

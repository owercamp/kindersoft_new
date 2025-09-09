<?php

namespace App\Service;

use App\Models\Notification;
use App\Service\SanitizeService;
use Illuminate\Support\Facades\DB;
use App\Service\ConsultingServices;
use App\Service\Uploads\UploadService;
use App\Livewire\Forms\NotificationForm;
use App\Service\Notified\InfoNotification;
use App\Service\Notified\ErrorNotification;
use App\Service\Notified\SuccessNotification;

class FinanceService
{
  static function saveFinance(NotificationForm $form)
  {
    $path = null;
    DB::beginTransaction();
    try {
      if ($form->firm) {
        $path = UploadService::upload('Firmas', $form->firm);
      }

      $email = SanitizeService::sanitize($form->email, 'email');
      $content = SanitizeService::sanitize($form->content, 'html');

      $administrative = new Notification();
      $administrative->email = $email;
      $administrative->content = $content;
      $administrative->firm = $path;
      $administrative->type = 'finance';

      if ($administrative->save()) {
        DB::commit();
        return SuccessNotification::get_notifications('success', __('Successfully Created Record'), 1500, 'completed');
      }
    } catch (\Throwable $th) {
      DB::rollBack();
      return ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed');
    }
  }

  static function editFinance(NotificationForm $form, int $id)
  {
    $path = null;

    $register = ConsultingServices::get_exists('notifications', ['id' => $id]);
    if (!$register) {
      return  InfoNotification::get_notifications('info', __('Record Not Found'), 1500, 'success');
    }

    $information = Notification::find($id);

    DB::beginTransaction();
    try {
      if ($form->firm) {
        $path = UploadService::upload('Firmas', $form->firm);
      }

      $email = SanitizeService::sanitize($form->email, 'email');
      $content = SanitizeService::sanitize($form->content, 'html');

      $information->email = $email;
      $information->content = $content;
      $information->firm = ($path) ? $path : $information->firm;
      if ($information->save()) {
        DB::commit();
        return SuccessNotification::get_notifications('success', __('Successfully Updated Record'), 1500, 'completed');
      }
    } catch (\Throwable $th) {
      DB::rollBack();
      return ErrorNotification::get_notifications('error', __('An error has occurred'), 1500, 'completed');
    }
  }

  static function destroyFinance(int $id)
  {
    $exists = ConsultingServices::get_exists('notifications', ['id' => $id]);
    if (!$exists) {
      return  InfoNotification::get_notifications('info', __('Record Not Found'), 1500, 'success');
    }
    if (Notification::destroy($id)) {
      return SuccessNotification::get_notifications('success', __('Successfully Deleted Record'), 1500, 'completed');
    }
  }

  static function getFinances()
  {
    $registers = Notification::where('type', 'finance')->paginate(10);
    return $registers;
  }

  static function getInformation(int $id)
  {
    return Notification::find($id);
  }
}

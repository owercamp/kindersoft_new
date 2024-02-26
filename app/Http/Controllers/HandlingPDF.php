<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Headquarter;
use Illuminate\Http\Request;
use App\Models\TaxInformation;
use App\Models\CorporateImages;
use App\Models\GeneralInformation;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;

class HandlingPDF extends Controller
{
  public function pdf_commercial(Request $request)
  {
    $logo = filter_var(CorporateImages::where('name', 'Logo Corporativo')->value('url_image'), FILTER_SANITIZE_URL);
    if (config('app.env') == 'prod') {
      $image = str_replace('\\', '/', str_replace('/storage/', '', Storage::disk('public')->url($logo)));
    } else {
      $image = str_replace('\\', '/', str_replace('/storage/', '/', Storage::disk('public')->url($logo)));
    }
    $reason = GeneralInformation::where('id', 1)->select('company', 'commercial')->get();
    $headquarters = Headquarter::where('company_id', 1)->select('headquarters')->get();
    $proposal = __('Commercial Proposal');
    $locale = config('app.locale', 'en');
    $now = Carbon::now();
    $date = ucfirst(Carbon::parse($now)->locale($locale)->isoFormat('dddd')) . ', ' . Carbon::parse($now)->locale($locale)->isoFormat('DD') . ' ' . __('of') . ' ' . Carbon::parse($now)->locale($locale)->isoFormat('MMMM') . ' ' . __('of') . ' ' . Carbon::parse($now)->locale($locale)->isoFormat('YYYY');
    $consecutive = TaxInformation::where('id', 1)->value('next_invoice');
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadView('templatePDF.admissionsPDF', compact('image', 'reason', 'proposal', 'date', 'consecutive', 'headquarters'))->setPaper('a4', 'landscape');
    return $pdf->stream();
  }

  public function pdf_cooperative(Request $request)
  {
    $logo = filter_var(CorporateImages::where('name', 'Logo Corporativo')->value('url_image'), FILTER_SANITIZE_URL);
    if (config('app.env') == 'prod') {
      $image = str_replace('\\', '/', str_replace('/storage/', '', Storage::disk('public')->url($logo)));
    } else {
      $image = str_replace('\\', '/', str_replace('/storage/', '/', Storage::disk('public')->url($logo)));
    }
    $reason = GeneralInformation::where('id', 1)->select('company', 'commercial')->get();
    $headquarters = Headquarter::where('company_id', 1)->select('headquarters')->get();
    $proposal = __('Educational Cooperation Contract');
    $locale = config('app.locale', 'en');
    $now = Carbon::now();
    $date = ucfirst(Carbon::parse($now)->locale($locale)->isoFormat('dddd')) . ', ' . Carbon::parse($now)->locale($locale)->isoFormat('DD') . ' ' . __('of') . ' ' . Carbon::parse($now)->locale($locale)->isoFormat('MMMM') . ' ' . __('of') . ' ' . Carbon::parse($now)->locale($locale)->isoFormat('YYYY');
    $consecutive = TaxInformation::where('id', 1)->value('next_invoice');
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadView('templatePDF.admissionsPDF', compact('image', 'reason', 'proposal', 'date', 'consecutive', 'headquarters'))->setPaper('a4', 'landscape');
    return $pdf->stream();
  }

  public function pdf_legal(Request $request)
  {
    $logo = filter_var(CorporateImages::where('name', 'Logo Corporativo')->value('url_image'), FILTER_SANITIZE_URL);
    if (config('app.env') == 'prod') {
      $image = str_replace('\\', '/', str_replace('/storage/', '', Storage::disk('public')->url($logo)));
    } else {
      $image = str_replace('\\', '/', str_replace('/storage/', '/', Storage::disk('public')->url($logo)));
    }
    $reason = GeneralInformation::where('id', 1)->select('company', 'commercial')->get();
    $headquarters = Headquarter::where('company_id', 1)->select('headquarters')->get();
    $proposal = __('Guarantee Promissory note');
    $locale = config('app.locale', 'en');
    $now = Carbon::now();
    $date = ucfirst(Carbon::parse($now)->locale($locale)->isoFormat('dddd')) . ', ' . Carbon::parse($now)->locale($locale)->isoFormat('DD') . ' ' . __('of') . ' ' . Carbon::parse($now)->locale($locale)->isoFormat('MMMM') . ' ' . __('of') . ' ' . Carbon::parse($now)->locale($locale)->isoFormat('YYYY');
    $consecutive = TaxInformation::where('id', 1)->value('next_invoice');
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadView('templatePDF.admissionsPDF', compact('image', 'reason', 'proposal', 'date', 'consecutive', 'headquarters'))->setPaper('a4', 'landscape');
    return $pdf->stream();
  }
}

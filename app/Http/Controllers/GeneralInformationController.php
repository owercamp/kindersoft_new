<?php

namespace App\Http\Controllers;

use App\Models\GeneralInformation;
use Illuminate\Http\Request;

class GeneralInformationController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'company_name' => 'required|max:50',
      'commercial_name' => 'required|max:50',
      'nit' => 'required|max:8',
      'dv' => 'required|max:1',
      'email' => 'required|email',
      'website' => 'required|url'
    ]);

    return back()->with('info', 'Seccion en proceso de creación');
  }

  /**
   * Display the specified resource.
   */
  public function show(GeneralInformation $generalInformation)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(GeneralInformation $generalInformation)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, GeneralInformation $generalInformation)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(GeneralInformation $generalInformation)
  {
    //
  }
}

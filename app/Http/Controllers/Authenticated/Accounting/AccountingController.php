<?php

namespace App\Http\Controllers\Authenticated\Accounting;

use App\Http\Controllers\Controller;
use App\Models\AccAccount;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
  public function index()
  {
    $accounts = AccAccount::where('type', 'root')->get();
    return view('pages.authenticated.coa.index', compact('accounts'));
  }
}

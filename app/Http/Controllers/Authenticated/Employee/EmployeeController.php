<?php

namespace App\Http\Controllers\Authenticated\Employee;

use App\Http\Controllers\Controller;
use App\Models\AccAccount;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
      $accounts = AccAccount::where('type', 'root')->get();
      return view('pages.authenticated.employee.index', compact('accounts'));
    }
}

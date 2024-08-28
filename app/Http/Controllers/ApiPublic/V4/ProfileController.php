<?php

namespace App\Http\Controllers\ApiPublic\V4;

use App\Http\Controllers\Controller;
use App\Http\Resources\V4\UserResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function user(Request $r)
  {
    return new UserResource($r);
  }
}

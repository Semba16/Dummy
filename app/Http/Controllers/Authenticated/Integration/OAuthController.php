<?php

namespace App\Http\Controllers\Authenticated\Integration;

use App\DataTables\Authenticated\Integration\OAuthClientDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Integration\CreateOAuthRequest;
use Illuminate\Http\Request;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\Client;

class OAuthController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(OAuthClientDataTable $t)
  {
    return $t->render('pages.authenticated.integration.oauth.index');
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
  public function store(CreateOAuthRequest $r, ClientRepository $repo)
  {
    $data = $repo->create(
      $r->user()->id,
      $r->post('name'),
      $r->post('redirect'),
      null,
      false,
      false,
      true
    );
    return redirect()->route('integration.oauth2.edit', $data);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
        //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Client $oauth2, ClientRepository $repo)
  {
    $data = $oauth2;

    return view('pages.authenticated.integration.oauth.edit', compact('data'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Client $oauth2, ClientRepository $repo)
  {
    $data = $oauth2;

    if ($request->post('regenerate')) {
      $repo->regenerateSecret($data);

      return redirect()->route('integration.oauth2.edit', $data);
    }

    $data->update($request->only(['name', 'redirect']));

    return redirect()->route('integration.oauth2.edit', $data);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $r, Client $oauth2, ClientRepository $repo)
  {
    $data = $oauth2;
    $repo->delete($data);

    if ($r->expectsJson()) {
      return response()->json([
        'message' => 'Data berhasil dihapus',
        'data' => $data
      ]);
    }

    return redirect()->route($this->route('index'), $data);
  }
}

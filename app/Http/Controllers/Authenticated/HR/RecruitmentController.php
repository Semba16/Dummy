<?php

namespace App\Http\Controllers\Authenticated\HR;

use App\DataTables\Authenticated\Hr\RecruitmentDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Authenticated\HR\HrController;
use App\Http\Requests\Authenticated\HR\CreateRecruitmentRequest;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\Client;

class RecruitmentController extends Controller
{
    public function index(RecruitmentDataTable $t)
    {
        return $t->render('pages.authenticated.hr.recruitment.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRecruitmentRequest $r, ClientRepository $repo)
    {
        $data = $repo->create(
            $r->user()->id,
            $r->post('image_url'),
            $r->post('name'),
            $r->post('expired_date'),
            null,
            false,
            false,
            true
        );
        return redirect()->route('hr.recruitment.edit', $data);
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


<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function createSession(Request $request)
    {
        // session()->put('customer', [
        //     'token' => $request->input('_token'),
        //     'name' => $request->input('name'),
        //     'id' => $request->input('id'),
        // ]);
    }

    public function updateSession(Request $request)
    {
        session()->put('customer', $request->except('token'));
    }


    public function deleteSession()
    {
        session()->flush('customer');
    }

}

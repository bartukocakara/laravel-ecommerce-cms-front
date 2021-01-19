<?php

namespace App\Http\Controllers\FrontAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontLoginController extends Controller
{
    public function login()
    {
        return view('front-auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $this->createSession($request);
        return redirect('');
    }

    public function logout()
    {
        $this->deleteSession();
        return redirect()->back();
    }
}

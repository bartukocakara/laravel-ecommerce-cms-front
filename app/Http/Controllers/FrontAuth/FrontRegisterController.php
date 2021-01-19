<?php

namespace App\Http\Controllers\FrontAuth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontRegisterController extends Controller
{
    public function register()
    {
        return view('front-auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:customers',
        ]);
        $request->all();
        Customer::insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
            'remember_token' => $request->input('_token')
        ]);
        $this->createSession($request);
        return redirect()->back()->with('createCustomer', 'Üyeliğiniz başarıyla oluşturuldu');

    }
}

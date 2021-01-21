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
        if(session('customer'))
        {
            return redirect()->back();
        }
        return view('front-auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:customers',
            'password' => 'required|min:6',
            'password-2' => 'required_with:password|same:password|min:6',
        ]);
        Customer::insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
            'remember_token' => $request->input('_token')
        ]);
        $id = Customer::where('name', $request->name)->first()->id;
        session()->put('customer', [
            'token' => $request->input('_token'),
            'name' => $request->input('name'),
            'id' => $id,
        ]);
        // dd(session('customer'));
        return redirect('')->with('createCustomer', 'Üyeliğiniz başarıyla oluşturuldu');

    }
}

<?php

namespace App\Http\Controllers\FrontAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontLoginController extends Controller
{
    public function login()
    {
        if(session('customer'))
        {
            return redirect()->back();
        }
        return view('front-auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $customerCheck = Customer::where('email', $request->email)->first();
        if($customerCheck)
        {
            $validCredentials = Hash::check($request->password, $customerCheck->password);
            if($validCredentials)
            {
                session()->put('customer', [
                    'token' => $request->_token,
                    'name' => $customerCheck->name,
                    'email' => $request->email,
                    'id' => $customerCheck->id,
                ]);
                return redirect('')->with('customerLoggdedIn', 'Giriş yaptınız');
            }
        }

        return redirect()->back()->with('error', 'Giriş bilgileriniz hatalı');
    }

    public function logout()
    {
        $this->deleteSession();
        return redirect('');
    }
}

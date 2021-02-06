<?php

namespace App\Http\Controllers\FrontAuth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FrontForgotPasswordContoller extends Controller
{
    public function forgotPassword()
    {
        return view('front-auth.passwords.email');
    }

    public function submitForgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers'
        ]);
        $token = Str::random(60);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('mails.password-verify', ['token' => $token] , function($message) use ($request) {
            $message->from($request->email);
            $message->to('kocakarabartu@gmail.com');
            $message->subject('Şifre yenileme mesajı');
        });

        return back()->with('message', 'Şifre yenileme linkiniz email adresinize gönderilmiştir.');
    }
}

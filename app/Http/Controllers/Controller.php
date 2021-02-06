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

    public function destroyCard()
    {
        return Cart::destroy('customer_id', session('customer')['id']);
    }

    public function updateImage($modalName, $path, $id, Request $request, $fileName)
    {
        $data = $modalName::where('id', $id)->first();

        unlink(public_path($path.$data->image_1));

        $request->image_1->move(public_path($path), $fileName);
    }

    // public function updateProductImages(Request $request, $data)
    // {
    //     for($i = 1; $i < 4; $i++)
    //     {
    //         if($request->image_.$i)
    //         {
    //             $y = time().$request->file()['image_'.$i]->getClientOriginalName();
    //             unlink(public_path('storage\\product-images\\'.$data->image_.'{.$i}'));
    //             $request->image_1->move(public_path('storage/product-images/'), $y);
    //         }
    //         break;

    //     }
    // }

}

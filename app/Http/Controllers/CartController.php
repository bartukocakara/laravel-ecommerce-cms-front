<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $cart = Cart::where('customer_id', session('customer')['id'])->first();
        if(isset($cart))
        {
            $products = json_decode($cart->products);
            return view('front.cart', compact('cart', 'products'));
        }
        return view('front.cart', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        if (session('customer')){
            $cart = Cart::firstWhere('customer_id', session('customer')['id']);
            if ($cart){
                $product = [
                    'product_id' => $request->products['product_id'],
                    'name' => $request->products['name'],
                    'price' => $request->products['price'],
                    'quantity' => 1,
                    'size' => $request->products['size'],
                    'image_1' => $request->products['image_1'],
                    'product_slug' => $request->products['product_slug']
                ];
                $productArray = $request->products;
                if(!$cart->products)
                {
                    $cart->update([
                        'products' => json_encode($productArray),
                        'total_quantity' => 1,
                        'total_price' => $request->products['price']
                        ]);
                    return redirect()->back()->with('added', 'Ürün sepetinize eklendi');
                }
                $products = json_decode($cart->products, true);
                $addtoarray = true;
                for ($i=0; $i < count($products); $i++) {
                    if ($products[$i]['product_id'] == $request->products['product_id'] && $products[$i]['size'] == $request->products['size']){
                        $products[$i]['quantity'] += $request->products['quantity'];
                        $cart->total_price += $request->products['price'];
                        $cart->total_quantity += $i;
                        $addtoarray = false;
                    }
                }
                if ($addtoarray){
                    array_push($products, $product);
                }
                $totalPrice = null;
                for ($i=0; $i < count($products); $i++) {
                    $totalPrice += $products[$i]['price']*$products[$i]['quantity'];
                }
                $cart->update([
                    'products' => json_encode($products),
                    'total_quantity' => count($products),
                    'total_price' => $totalPrice
                ]);
                return redirect()->back()->with('added', 'Ürün sepetinize eklendi');

            }
            else {
                // SEPET YOK
                $cartcontent = [];
                $cartitem = [
                    'product_id' => $request->products['product_id'],
                    'name' => $request->products['name'],
                    'price' => $request->products['price'],
                    'quantity' => 1,
                    'size' => $request->products['size'],
                    'image_1' => $request->products['image_1'],
                    'product_slug' => $request->products['product_slug']
                ];
                array_push($cartcontent, $cartitem);
                Cart::create([
                    'customer_id' => session('customer')['id'],
                    'products' => json_encode($cartcontent),
                    'total_price' => $request->products['price'] * $request->products['quantity'],
                    'total_quantity' => 1,
                    'shipping_cost' => 5
                ]);
                return redirect()->back()->with('added', 'Ürün sepetinize eklendi');
            }
        }else{
            return redirect()->back()->with('notLoggedIn', 'Sepete ürün eklemek için üyelik oluşturunuz');
        }
    }

    public function increaseQuantity(Request $request)
    {
        // Miktar arttırım yapacağımız sepeti belirliyoruz
        $cart = Cart::where('customer_id', session('customer')['id'])->first();

        //Sepetteki ürünleri array yapıyoruz
        $products = json_decode($cart->products, true);

        //Ajaxtan gelen verileri derliyoruz
        $data['total_price'] = $request->total_price ;
        $data['product_id'] = $request->product_id ;
        $data['price'] = $request->price ;
        $data['quantity'] = $request->quantity ;

        for ($i=0; $i < count($products); $i++) {
            if($data['product_id'] == $products[$i]['product_id'])
            {
                if($data['quantity']  == 20) {
                    break;
                }
                else{
                $products[$i]['quantity'] += 1;
                $data['quantity'] = $products[$i]['quantity'];
                $cart->total_price += $products[$i]['price'];
                }
            }
        }
        $data['total_price'] = $cart->total_price;

        $cart->update([
            'products' => json_encode($products),
            'total_price' => $cart->total_price
        ]);

        return response()->json($data, 200);

    }

    public function decreaseQuantity(Request $request)
    {
        // Miktar arttırım yapacağımız sepeti belirliyoruz
        $cart = Cart::where('customer_id', session('customer')['id'])->first();
        //Sepetteki ürünleri array yapıyoruz
        $products = json_decode($cart->products, true);
        //Ajaxtan gelen verileri derliyoruz
        $data['total_price'] = $request->total_price ;
        $data['product_id'] = $request->product_id ;
        $data['price'] = $request->price ;
        $data['quantity'] = $request->quantity ;

        for ($i=0; $i < count($products); $i++) {
            if($data['product_id'] == $products[$i]['product_id'])
            {
                if($data['quantity']  == 0) {
                    break;
                }
                else{
                    $products[$i]['quantity'] -= 1;
                    $data['quantity'] = $products[$i]['quantity'];
                    $cart->total_price -= $products[$i]['price'];
                }

            }
        }
        $data['total_price'] = $cart->total_price;
        $cart->update([
            'products' => json_encode($products),
            'total_price' => $cart->total_price
        ]);

        return response()->json($data, 200);
    }

    public function removeFromCart($id)
    {
        //Sepetteki aynı ürünlerin hepsini sepetten çıkar
        $data = Cart::where(['customer_id' => session('customer')['id']])->get();
        return response()->json($data, 200);

    }

    public function emptyCart($id)
    {
        Cart::destroy($id);
        return redirect('/')->with('emptyCart', 'Sepetiniz boşaltıldı.');
    }
}

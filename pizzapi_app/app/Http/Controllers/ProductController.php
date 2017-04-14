<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Order;
use App\Sides;
use Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;


use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Input;
class ProductController extends Controller
{

    public function getPizza()
    {
        $userId = Auth::id();
        $user_info = User::find($userId);

        $pizzas = Product::where('type', 'pizza')
            ->paginate();

        return view('shop.index', ['pizzas' => $pizzas, 'user_info' => $user_info]);
    }

    public function getSides()
    {
        $userId = Auth::id();
        $user_info = User::find($userId);

        $sides = Product::where('type', 'side')
            ->get();
        return view('shop.sides', ['sides' => $sides, 'user_info' => $user_info]);
    }

    public function getDrinks()
    {
        $userId = Auth::id();
        $user_info = User::find($userId);

        $drinks = Product::where('type', 'drink')
            ->get();
        return view('shop.drinks', ['drinks' => $drinks, 'user_info' => $user_info]);
    }

    public function getDesserts()
    {
        $userId = Auth::id();
        $user_info = User::find($userId);

        $desserts = Product::where('type', 'dessert')
            ->get();
        return view('shop.desserts', ['desserts' => $desserts, 'user_info' => $user_info]);
    }

    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }


    //Reduces cart item by one
    public function getincreaseByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increaseByOne($id);
        if (count($cart->items) > 0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    //Reduces cart item by one
    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getCart(){
        $userId = Auth::id();
        $user_info = User::find($userId);

        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'user_info' => $user_info]);
    }

    public function getCheckout() {

//      Get the users info to pre-fill the name and address
        $userId = Auth::id();
        $user_info = User::find($userId);


        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total, 'user_info' => $user_info]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_KehrkfQURXYx8aoGUQdn7thg');
        try{
            $this->validate($request, [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'phone_number' => 'present',
                'delivery_info' => 'present|max:255',
                'address' => 'required|max:255',
                'payment_name' => 'required|max:255',
                'card-number' => 'integer|digits:40',
                'card-expiry-month' => 'integer|digits:2',
                'card-expiry-year' => 'integer|digits:4',
                'card-cvc' => 'integer|digits:3',
            ]);

            $charge = Charge::create(
                array(
                    "amount" => $cart->totalPrice * 100,
                    "currency" => "gbp",
                    "source" => $request->input('stripeToken'), // obtained with Stripe.js
                    "description" => "Test Charge for Pizzapi"
                ));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->first_name = $request->input('first_name');
            $order->last_name = $request->input('last_name');
            $order->phone_number = $request->input('phone_number');
            $order->service = $request->input('service');
            $order->delivery_info = $request->input('delivery_info');
            $order->address = $request->input('address');
            $order->payment_name = $request->input('payment_name');
            $order->payment_id = $charge->id;


            Auth::user()->orders()->save($order);

            $userId = Auth::id();
            $user = User::findOrFail($userId);

            Mail::send('mail.email', ['user' => $user, 'order' => $order], function ($m) use ($user) {
                $m->from('mailer@pizzappi.uk', 'Pizzapi');

                $m->to($user->email, $user->first_name)->subject('Pizzapi order confirmation!');
            });

        } catch(\Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->route('user.profile')->with('success', 'Thank you for your order!');
    }
}

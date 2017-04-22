<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    //Sends the order table data to the staff dashboard where the order is not complete
    public function getIndex()   {
        $orders_open = Order::where('order_complete', 0)
            ->paginate(6);
        $orders_open->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        $orders_closed = Order::where('order_complete', 1)
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();
        $orders_closed->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('staff.dashboard', ['orders_open' => $orders_open, 'orders_closed' => $orders_closed]);
    }

    public function getCurrentProducts(){
        $products = Product::all();
        return view('staff.current-products', ['products' => $products]);
    }

    public function getMarkOrderComplete(Request $request) {
        $id = $request->input('orderid');
        $order = Order::find($id);
        $order-> order_complete = '1';
        $order->save();
        return redirect()->back();
    }

    public function getGenerateArticle()
    {
        return response('Article generated!', 200);
    }

    public function getManagerPage()
    {
        $users = User::all();
        return view('staff.manager', ['users' => $users]);
    }

    public function getPizzaioloPage()
    {
        return view('staff.pizzaiolo');
    }

    public function postManagerAssignRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if ($request['role_customer']) {
            $user->roles()->attach(Role::where('name', 'Customer')->first());
        }
        if ($request['role_pizzaiolo']) {
            $user->roles()->attach(Role::where('name', 'Pizzaiolo')->first());
        }
        if ($request['role_manager']) {
            $user->roles()->attach(Role::where('name', 'Manager')->first());
        }
        return redirect()->back();
    }
}

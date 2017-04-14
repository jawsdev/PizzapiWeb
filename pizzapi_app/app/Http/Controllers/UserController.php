<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Role;
use App\Order;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Hash;
use Validator;


class UserController extends Controller
{
    public function getSignup(){
        return view('user.signup');
    }

    public function postSignup(Request $request) {
        $this->validate($request, [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'address' => 'required|min:6',
            'phone_number' => 'required|min:8',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = new User([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();


        $user->roles()->attach(Role::where('name', 'Customer')->first());
        Auth::login($user);

        if (Session::has('oldUrl')){
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }

        return redirect()->route('user.profile');
    }

    public function getSignin(){
        return view('user.signin');
    }

    public function postSignin(Request $request) {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
        if (Auth::attempt(['email' => $request->input('email'), 'password' =>
        $request->input('password')])){
            if (Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->route('user.profile');
        }
        return redirect()->back();
    }

    public function getProfile(){

        $user_info = Auth::user();

        $userId = Auth::id();
        $count = Order::where('user_id','=', $userId)->count();


        $orders = Order::where('user_id', $userId)
            ->orderBy('id', 'desc')
            ->Paginate(2);
            $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);

            return $order;
        });
        return view('user.profile', ['orders' => $orders, 'user_info' => $user_info, 'count' => $count]);
    }

    public function postUpdateDetails(Request $request){
        $user_id = Auth::id();

        $user = User::find($user_id);
        $user -> first_name = $request->input('first_name');
        $user -> last_name = $request->input('last_name');
        $user -> address = $request->input('address');
        $user -> phone_number = $request->input('phone_number');
        $user -> email = $request->input('email');

        $user->save();
        Flash::message('Your account has been updated!');
        return redirect()->route('user.profile');
    }

    public function postUpdatePassword(Request $request){
        $this->validate($request, [
            'new_password' => 'required|min:2',
            'confirm_password' => 'required|min:2',
        ]);
        $user_id = Auth::id();

        $user = User::find($user_id);
        $new_password = bcrypt($request->input('new_password'));
        $confirm_password = bcrypt($request->input('confirm_password'));
        if ($new_password === $confirm_password){
            $user -> password = $new_password;
            $user->save();
            Flash::message('Password Changed');
            return redirect()->route('user.profile');
        }


    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('user.signin');
    }
}

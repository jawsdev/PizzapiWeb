<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller {


    public function getMain() {
        $userId = Auth::id();
        $user_info = User::find($userId);

        return view('pages.main', ['user_info' => $user_info]);
    }

    public function getContact() {
        $userId = Auth::id();
        $user_info = User::find($userId);

        return view('pages.contact', ['user_info' => $user_info]);
    }

    public function getMenu() {
        return view('pages.menu');
    }
    public function getAbout() {
        $userId = Auth::id();
        $user_info = User::find($userId);

        return view('pages.about', ['user_info' => $user_info]);
    }


    public function getStaff() {
        return view('staff.dashboard');
    }

    public function getToppingCreate() {
        return view('staff.topping.create');
    }

    public function getPizzaMenu() {
        return view('shop.pizza');
    }


}
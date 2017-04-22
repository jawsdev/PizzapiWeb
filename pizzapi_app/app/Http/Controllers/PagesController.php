<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller {

    public function getMain() {
        return view('pages.main');
    }
    public function getContact() {
        return view('pages.contact');
    }
    public function getMenu() {
        return view('pages.menu');
    }
    public function getAbout() {
        return view('pages.about');
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
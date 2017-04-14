<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function getError401() {
        return view('pages.401');
    }
}

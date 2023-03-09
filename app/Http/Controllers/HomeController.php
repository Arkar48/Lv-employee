<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Branch;

class HomeController extends Controller
{
    //
    public function index(){
        $branches=Branch::get();
        return view('home.index',['branches'=>$branches]);
    }
}

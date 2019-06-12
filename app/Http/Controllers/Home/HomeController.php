<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if($user->hasRole('admin')){
            return redirect()->route('dashboard.index');
        }

        return abord(404);
    }
}

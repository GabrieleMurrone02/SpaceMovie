<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Cinema;
use App\Models\Film;
use Image;

class DashboardController extends Controller
{
    public function homepage(){
        $data = Film::orderByDesc('Uscita')->get();
        
        return view('welcome', ['data' => $data]);
    }

    public function index(){
        if(Auth::user()->hasRole('user')){
            $data = Film::orderByDesc('Uscita')->get();
            $cinema = Cinema::all();
            
            return view('User.usrdash', ['data' => $data, 'cinema' => $cinema]);
        }elseif(Auth::user()->hasRole('admin')){
            return redirect('dashboard/film');
        }
    }
}

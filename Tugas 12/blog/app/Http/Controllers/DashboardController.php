<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books; 
use App\Models\Genres; 

class DashboardController extends Controller
{
    public function index () {
        $books = Books::all(); 
        $genres = Genres::all();
     
        
        return view('home', compact(['books', 'genres']));
    }
}

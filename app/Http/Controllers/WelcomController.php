<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WelcomController extends Controller {

    public function index() { 
        if (Auth::check()) {
            return redirect('/notes');
        }
        
        return view('welcom');  
        
    }
	
}
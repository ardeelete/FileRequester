<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;

use Illuminate\Http\RedirectResponse;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //
    public function index(Request $request)
    {
        $users = DB::select('select * from users', [1]);
        //return view('login', ['users' => $users]);
        
        if($request->session()->has('username'))
        {
            return redirect('/home');
            //return view('home');2r
        }
        else
        {
            return view('login');
            
        }
    }
    
    public function login(Request $request){
        
        
        $username = $request->input('username');
        $password = $request->input('password');
        $type = $request->input('type');
        $row = DB::table('users')
            ->where('username', $username)
            ->where('password', $password)
            ->where('type', $type)
            ->count();
            
         if($row == 1)
         {
            $request->session()->put('username', $username);    
            $request->session()->put('password', $password);
            $request->session()->put('type', $type);
            //$url = route('home');
             return redirect('/home');
            
         }
        else
        {
            return "invalid input";
        }
         
        
    }
    
    public function logout(Request $request)
    {
        $request->session()->forget('username', 'password', 'type');

        $request->session()->flush(); 
        return redirect('/');
        
        
    }
    public function home(){
        
        return view('home');
    }
}

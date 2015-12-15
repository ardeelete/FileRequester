<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;

use Illuminate\Http\RedirectResponse;
use \Dropbox as dbx;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Purl\Url;
use App\Classes\Dropbox;
class PagesController extends Controller
{
    //
    private $api_client;
	public function __construct(Dropbox $dropbox){
		$this->api_client = $dropbox->api();
	}
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
        return redirect('https://www.dropbox.com/1/oauth2/authorize');
        
        
    }
    public function home(){
        
        return view('home');
    }
    public function auth(){
        
        return view('auth');
    }
    public function connect(){
		$url = new Url('https://www.dropbox.com/1/oauth2/authorize');
		$url->query->setData(array(
			'response_type' => 'code',
			'client_id' => config('dropbox.APP_KEY'),
			'redirect_uri' => config('dropbox.REDIRECT_URI')
		));
		return redirect($url->getUrl());
    }
    public function postIndex(){
		$url = new Url('https://www.dropbox.com/1/oauth2/authorize');
		$url->query->setData(array(
			'response_type' => 'code',
			'client_id' => config('dropbox.APP_KEY'),
			'redirect_uri' => config('dropbox.REDIRECT_URI')
		));
		return redirect($url->getUrl());
    }
    public function login2(Request $request){
    	if($request->has('code')){
			$data = array(
				'code' => $request->input('code'),
				'grant_type' => 'authorization_code',
				'client_id' => config('dropbox.APP_KEY'),
				'client_secret' => config('dropbox.APP_SECRET'),
				'redirect_uri' => config('dropbox.REDIRECT_URI')
			);
			$response = $this->api_client->request(
				'POST', 
				'/1/oauth2/token', 
				array(
			    	'form_params' => $data
			));
			$response_body = json_decode($response->getBody(), true);
			$access_token = $response_body['access_token'];
			session(array('access_token' => $access_token));
			return redirect('dashboard');
    	}
    	return redirect('/');
    }
}

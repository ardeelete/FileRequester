<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
//use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\RedirectResponse;
use \Dropbox as dbx;
use DB;
use Schema;
//use App\Http\Schema\Schema;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Purl\Url;
use App\Classes\Dropbox;
use League\Flysystem\Dropbox\DropboxAdapter;
use League\Flysystem\Filesystem;
use Dropbox\Client;
class PagesController extends Controller
{
    //
    private $api_client;
    private $username;
    private $access_token;
	public function __construct(Dropbox $dropbox){
		$this->api_client = $dropbox->api();
	}
    public function index(Request $request)
    {
        $users = DB::select('select * from users', [1]);
        //return view('login', ['users' => $users]);
        
        if($request->session()->has('username'))
        {
            //return $this->home();
            return redirect('/home');
            //return 'error';
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
            $token = DB::table('users')
            ->where('username', $username)
            ->where('password', $password)
            ->where('token', '')
            ->count();
            if($token == 1){
             return redirect('/request');
            }
            else
            {
                return $this->connect();
            }
            
         }
        else
        {
            return redirect('/');
        }
         
        
    }
    
    public function logout(Request $request)
    {
        $request->session()->forget('username', 'password', 'type','_token', 'token');

        $request->session()->flush(); 
        return redirect('/');
        
        
    }
    public function home(Request $request){
        //return 'error';
        
        
        if ($request->session()->has('username'))
            {
                $value = $request->session()->get('type');
                if($value == 'Admin')
                {
                    return view('admin.admin');
                }
                elseif($value == 'Faculty')
                {
                    $count = DB::table('classes')
                        ->count();
                    $classname = DB::table('classes')
                        ->lists('class_name');
                    //    $students = DB::table('students')
                    //    ->lists('class_name');
                    return view('faculty.faculty', ['classnames'=>$classname]);
                    //return 'error';
                }
                else
                {
                    return 'error';
                }
                
            }
            
        else
        {
            return redirect('/');
        }
        
    }
    public function auth(){
        
        return view('auth');
    }
    public function requesttoken(Request $request)
    {
        $username = $request->session()->get('username');
        $password = $request->session()->get('password');
        $token = DB::table('users')
            ->where('username', $username)
            ->where('password', $password)
            ->where('token', '')
            ->count();
            if($token == 1){
		$url = new Url('https://www.dropbox.com/1/oauth2/authorize');
		
		$url->query->setData(array(
			'response_type' => 'code',
			'client_id' => 'dln6kugesxo1smk',
			'redirect_uri' => 'https://file-requester-ardeelete.c9users.io/login'
		));
		return redirect($url->getUrl());
            }
		else{
		    
		    return redirect('/');
		}
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
    
    
    public function connect(Request $request){
        
        $url = new Url('https://www.dropbox.com/1/oauth2/authorize');
		
		$url->query->setData(array(
			'response_type' => 'token',
			'client_id' => 'dln6kugesxo1smk',
			'redirect_uri' => 'https://file-requester-ardeelete.c9users.io/login'
		));
		return redirect($url->getUrl());
    }
    
    public function token(Request $request){
    	if($request->has('code')){
			$data = array(
				'code' => $request->input('code'),
				'grant_type' => 'authorization_code',
				'client_id' => 'dln6kugesxo1smk',
				'client_secret' => 'fsd52oajpnywijp',
				'redirect_uri' => 'https://file-requester-ardeelete.c9users.io/login'
			);
			$response = $this->api_client->request(
				'POST', 
				'/1/oauth2/token', 
				array(
			    	'form_params' => $data
			));
			$response_body = json_decode($response->getBody(), true);
			$access_token = $response_body['access_token'];
			$request->session()->put(array('access_token' => $access_token));
			//return redirect('l');
			$username = $request->session()->get('username');
			//return $access_token;
			$token = DB::table('users')
            ->where('username', $username)
            ->update(array('token' => $access_token));
			//$affected = DB::update('update users set token = ? where username = ?', ['"'.$access_token.'"','"'.$username.'"']);
			if($token==1){
			return 'token updated';
			}
			else{
			    
			    return 'no token updated';
			}
    	}
    	return redirect('/');
    }
    
    public function dashboard(){
        
        return 'good';
        
    }
    
    public function addfaculty(Request $request)
    {
        if($request->session()->get('type') == 'Admin')
        {
            return view('admincreatefaculty');
        }
        
    }
    
    
    public function addstudent(Request $request)
    {
        if($request->session()->get('type') == 'Admin')
        {
            return view('admin.createstudent');
        }
    }
    public function postAdd(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        DB::insert('insert into users (username, email, password, type) values (?, ?, ?, ?)', [$username, $email, $password, 'Faculty']);
        return redirect('/');
    }
    
    
    public function postaddstudent(Request $request, Filesystem $fs)
    {
        if($request->session()->get('type') == 'Admin')
        {
        $id_num = $request->input('id_num');
        $photo = $request->file('photo');
        $request->file('photo')->move('students/', $id_num.'.jpg');
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $gender = $request->input('gender');
        $lname = $request->input('lname');
        $course = $request->input('course');
        $yrLevel = $request->input('yrLevel');
        //$fs->put($id_num.'.jpg', $photo);
        if ($request->hasfile('photo')) {
            DB::insert('insert into students (id_num, photo, stud_fname, stud_lname, course, yrlevel, active, stud_gender) values (?, ?, ?, ?, ?, ?, ?, ?)', [$id_num, '/students/'.$id_num.'.jpg', $fname, $lname, $course, $yrLevel, false, $gender]);
        
            return redirect('/');
        }
        
        else{
            return 'error';
        }
        }
        
        
    }
    public function liststudent(Request $request)
    {
        
        $students = DB::select('select * from students');
        if($request->session()->get('type') == 'Admin')
        {
        return view('admin.liststudent', ['students' => $students]);
        }
        elseif($request->session()->get('type') == 'Faculty')
        {
            $classname = DB::table('classes')
                        ->lists('class_name');
            return view('faculty.liststudent', ['students' => $students, 'classnames'=>$classname]);
            
        }
            
            
        }
        public function createrequest(Request $request)
        {
            
            if($request->session()->get('type') == 'Faculty')
            {
                //$columns = Schema::getColumnListing('mime_types');
                $columns = DB::connection()->getSchemaBuilder()->getColumnListing("mime_types");
                $classname = DB::table('classes')
                        ->lists('class_name');
                return view('faculty.createrequest', ['columns'=> $columns, 'classnames'=>$classname]);
            }
            
        }
        
        public function postcreaterequest(Request $request)
        {
        $req_name = $request->input('req_name');
        $req_desc = $request->input('req_desc');
        $deadline = $request->input('deadline');
        $size_limit = $request->input('size_limit');
        $byte= $request->input('byte');
        if($byte == 'kb'){
            
            $size_limit = $size_limit * 1024;
        }
        elseif($byte == 'mb')
        {
            $size_limit = $size_limit * 1024 *1024;
        }
        $mime_type = $request->input('mime');
        
        $class_name = $request->input('class_name');
        $username = $request->session()->get('username');
        //$accessToken = 	'Z8PuqT2g6U0AAAAAAAAACVpHcg95JybQkwwVJ6-Qj3L0zoxAcPcXqDZG5RW7aynW';
        //$user = DB::table('users')->where('username', '=', $username)->get();
        //$users = DB::table('users')->where('votes', '=', 100)
       // $students = DB::select('select * from users where username = "'.$username.'"');
        $token = DB::table('users')->where('username', $username)->lists('token');
        //$accessToken = ozuk1EzTbfAAAAAAAAAAO8msCxB-ctDGw0O28cMA05NGe0_ma348UgW-0HdBUNyk;
        
        
        $accessToken = $token[0]; 
        //return $accessToken;
        //$accessToken = 'ozuk1EzTbfAAAAAAAAAAPXwlC1sc5yxV0JsonmziwqiN2WzQfVDqjZnyCLKVczIc';
        //return $accessToken;
        $appSecret = 'fsd52oajpnywijp';
        $client = new Client($accessToken, $appSecret);
        $adapter = new DropboxAdapter($client);
            
        $filesystem = new Filesystem($adapter);
        
        //$file = $filesystem->get('hello.txt');
        $filesystem->createDir('/'.$req_name);
        //$token->get('');
        
        
        DB::insert('insert into requests (req_name, req_desc, deadline, size_limit, class_name, dropbox_path ) values (?, ?, ?, ?, ?, ?)', [$req_name, $req_desc, $deadline, $size_limit, $class_name, '/'.$req_name]);
        $columns = DB::connection()->getSchemaBuilder()->getColumnListing("mime_types");
        
        $req_id = DB::table('requests')->where('req_name', $req_name)->lists('req_id');
        $id = $req_id[0];
        $count = 0;
        foreach($columns as $mimes){
            if($count==0)
            {
                DB::table('mime_types')->insert([
                    ['req_id'=>$id]
                ]);
                $count++;
            }
            else{
                if($mimes==$mime_type[$count-1]){
                DB::table('mime_types')->insert([
                        [$columns=>true]
                    ]);
                }
                $count++;
            }
            }
            
            return view('/');
        }
        public function createclass(Request $request)
        {
            if($request->session()->get('type') == 'Faculty')
            {$classname = DB::table('classes')
                        ->lists('class_name');
                return view('faculty.createclass', ['classnames'=>$classname]);
            }
        }
        public function postcreateclass(Request $request)
        {
            $class_name = $request->input('class_name');
            $class_desc = $request->input('class_desc');
            $teacher_name = $request->session()->get('username');
            DB::insert('insert into classes (class_name, class_desc, teacher_name) values (?, ?, ?)', [$class_name, $class_desc, $teacher_name]);
            DB::statement("CREATE TABLE ".$class_name."(
                req_id INT(5) NOT NULL,
                PRIMARY KEY ( req_id ))");
            return 'success';
        }
        
        public function addclassstudent($class_name, $id_num)
        {
            
                //DB::statement("ALTER TABLE ".$class_name." ADD ".$id_num." BOOLEAN DEFAULT FALSE");
                
                Schema::table($class_name, function($table)
                	{$id = DB::table('students')->lists('id_num');
                                    $table->boolean($name);
                	});
                	return 'success';
        }
        public function addclassstudents(Request $request)
        {
            $concat = '';
            $count = 1;
            $class_name = $request->input('class_name');
            
                    
                    Schema::table($class_name, function($table)
                	{$id = DB::table('students')->lists('id_num');
                        foreach($id as $name){
                                    //$concat = $concat."ADD ".$name." BOOLEAN DEFAULT FALSE";
                                    $table->boolean($name);
                                    //return $name;
                        }            
                	});
                
                //DB::statement("ALTER TABLE ".$class_name." ".$concat);
                return redirect('/');
        }

}

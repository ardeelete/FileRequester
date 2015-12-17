<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Contracts\Filesystem\Filesystem;
use League\Flysystem\Dropbox\DropboxAdapter;
use League\Flysystem\Filesystem;
use Dropbox\Client;

class HomeController extends Controller
{
    //
    public function index()
    {
        $accessToken = 	'Z8PuqT2g6U0AAAAAAAAACVpHcg95JybQkwwVJ6-Qj3L0zoxAcPcXqDZG5RW7aynW';
        $appSecret = 'fsd52oajpnywijp';
        $client = new Client($accessToken, $appSecret);
        $adapter = new DropboxAdapter($client);
            
        $filesystem = new Filesystem($adapter);
        
        //$file = $filesystem->get('hello.txt');
        $filesystem->createDir('/classrequests');
        //$token->get('');
        return 'success';
    }
}

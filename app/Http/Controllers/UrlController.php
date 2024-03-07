<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UrlController extends Controller
{
    public function addUrl(Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'originalurl' => 'required'
        ]);
        $incomingFields['title']= strip_tags($incomingFields['title']);
        $incomingFields['originalurl']= strip_tags($incomingFields['originalurl']);
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shortenedurl = "";
        for($i = 0; $i<6; $i++) {
            $shortenedurl .= $characters[rand(0, strlen($characters)-1)];
        }
        Url::create([
            'title'=> $incomingFields['title'],
            'originalurl'=> $incomingFields['originalurl'],
            'shortenedurl'=> $shortenedurl,
            'user_id'=> auth()->id()
        ]);
        return redirect('/');
    }
    public function displayUrl(){  
        if(auth()->check()){
            $urls = [];
            $urls = auth()->user()->userUrls()->get();
            $user = auth()->user()->name;
            return view('home', ['urls'=>$urls],['name'=>$user]);
        }
        return view('home');
    }
    public function redirect(Request $request){
        
        $parameters = $request->route()->parameters();
        $shortenedurl = $parameters['shortenedurl'];
        $record = Url::where('shortenedUrl', $shortenedurl)->first();
        if($record){
            return redirect($record->originalUrl);
        }
        else {
            return abort(404);
        }
    }
    public function deleteUrl(Url $url){
        if(auth()->id() === $url['user_id']){
            $url->delete();
        }
        return redirect('/');
    }
    public function displayEdit(Url $url){
        if(auth()->id() === $url['user_id']){
            return view('editUrl', ['url'=>$url]);
        }
        return redirect('/');
    }
    public function editUrl(Url $url, Request $request){
        if(auth()->id() === $url['user_id']){
            $incomingFields = $request->validate([
                'title' => 'required'
            ]);
            $incomingFields['title']= strip_tags($incomingFields['title']);
            $url->update($incomingFields);
        }
        return redirect('/');
    }
}

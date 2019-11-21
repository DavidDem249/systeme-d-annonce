<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function create(Request $request)
    {

    	$auteur_id = request('auteur_id');
    	$ad_id = request('ad_id');
    	//dd($auteur_id);

    	return View('messages.message', compact('auteur_id','ad_id'));
    }

    public function store(Request $request)
    {
    	//dd($request['content']);

    	$message = new Message;

    	$message->content = $request['content'];
    	$message->auteur_id = $request['auteur_id'];
    	$message->acheteur_id = $request['acheteur_id'];
    	$message->ad_id = $request['ad_id'];

    	$message->save();
    	return redirect()->route('welcome')->with('success','Votre message a bien été envoyé avec succès.');
     }
}

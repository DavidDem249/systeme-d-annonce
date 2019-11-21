<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdStore;
use App\Ad;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Intervention\Image\Facades\Image;
//use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    use RegistersUsers;

    public function index()
    {
        $annonce = DB::table('ads')->orderBy('created_at','DESC')->paginate(6);

        return View('annonces',compact('annonce'));
    }

    public function create()
    {
    	return View('create');
    }

    public function store(AdStore $request)
    {

    	$validated = $request->validated();

        if(!auth()->check())
        {

            $request->validate([

                "name" => ['required','unique:users'],
                "email" => ['required','unique:users'],
                "password" => ['required','confirmed'],
                "password_confirmation" => ['required'],
            ]);

            $user = User::create([

                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),

            ]);
            
            $this->guard()->login($user);
               
        }

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(400, 150);


        $image->save();
    	
    	$annonce = New Ad();
    	$annonce->title = $validated['title'];
    	$annonce->description = $validated['description'];
    	$annonce->localisation = $validated['localisation'];
    	$annonce->price = $validated['price'];
        $annonce->image = $imagePath;
        $annonce->user_id = auth()->user()->id;
    	$annonce->save();

    	return redirect()->route('welcome')->with('success','Votre annonce a bien été postée avec success.');
    }

    public function search(Request $request)
    {
        $words = $request->words;

        $ads = DB::table('ads')
            ->where('title', 'LIKE', "%$words%")
            ->orWhere('description', 'LIKE', "%$words%")
            ->orderBy('created_at','DESC')
            ->get(); 

        return response()->json(['success' => true, 'ads' => $ads]);
    }

    public function view($ad_id)
    {
        $annonce = Ad::find($ad_id);
        //dd($posts);
        return View('annonces.index', compact('annonce'));
    }
}

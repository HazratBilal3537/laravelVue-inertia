<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Inertia\Inertia;
class UserProfileController extends Controller
{
   public function index()  {

        $profiles = UserProfile::all();
        return Inertia::render('Home', [
            'users' => $profiles
        ]);
    }

    public function create(){
        return Inertia::render('createuser');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
             'about' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $photoPath = $request->file('photo')->store('photos', 'public');
        UserProfile::create([
            'name'=>$request->name,
            'about'=>$request->about,
            'photo'=>$request->photo,
        ]);
    }
}

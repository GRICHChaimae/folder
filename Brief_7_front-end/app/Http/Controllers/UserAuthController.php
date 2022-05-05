<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\support\Facades\hash;

use App\Models\User;

class UserAuthController extends Controller
{
    function login(){
        return view('log_in',[
            'log_in' => 'log_in'
        ]);
    }

    function register(){
        return view('sign_up',[
             'sign_up' => 'sign_up'
        ]);
    }

    function create(Request $request){
        $request->validate([
            'prenom'=>'required',
            'nom'=>'required',
            'email'=>'required|email|unique:users',
            'mot_de_passe'=>'required|min:5|max:12'
        ]);

        $user = new User;
        $user->prenom = $request->prenom;
        $user->nom = $request->nom;
        $user->email= $request->email;
        $user->mot_de_passe= Hash::make($request->mot_de_passe);
        $query = $user->save();

        if($query){
            return back()->with('success','You have been successfuly registered');
        }else{
            return back()->with('fail','something went wrong');
        }

    }

    function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'mot_de_passe'=>'required|min:5|max:12'
        ]);

        $user = User::where('email','=', $request->email)->first();
        if($user){
            if(hash::check($request->mot_de_passe, $user->mot_de_passe)){
                $request->session()->put('LoggedUser', $user->id);
                return redirect('offre');
            }else{
                return back()->with('fail','Invail password');
            }
        }else{
            return back()->with('fail','No account found for this email');
        }
    }

    function offre(){
        return view('offre',[
            'offre' => 'offre'
        ]);
    }
}

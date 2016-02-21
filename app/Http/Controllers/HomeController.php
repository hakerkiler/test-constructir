<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function register_form(){
        return view('register');
    }
    public function register(Request $data){

        $this->validate($data, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $data->email)->first();

        if(!is_object($user)){
            $user = new User();
            $user->email = $data->email;
            $user->password = bcrypt($data->password);
            $user->health = 200;
            $user->money = 20000;
            $user->save();
        }

        if(Auth::attempt($data->only('email', 'password'), true)){
            return redirect()->route('game.page');
        } else {
            return redirect()->back()->with('error_auth', 'Autentificare eronata');
        }
    }
    public function game_page(){
        return view('game');
    }
}

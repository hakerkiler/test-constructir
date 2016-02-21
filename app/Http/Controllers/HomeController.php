<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Auth;

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

        $password = $data->password;

        $user = User::where('email', $data->email)->where('password', $password)->first();

        if(!is_object($user)){
            $user = new User();
            $user->email = $data->email;
            $user->password = $password;
            $user->health = 200;
            $user->money = 20000;
            $user->builder_nr = 0;
            $user->save();
        }

        if(Auth::loginUsingId($user->id)){
            return redirect()->route('game.page');
        } else {
            return redirect()->back()->with('error_auth', 'Autentificare eronata');
        }
    }
    public function game_page(){
        return view('game');
    }

    public function update_user(Request $data){
        $input = $data->all();
        if(intval($input['build_nr']) > 0){
            $user = User::find(Auth::user()->id);

            $return = '';

            if($input['build_nr'] == 1){
                $user->health = $user->health - 20;
                $user->money = $user->money - 1000;
                $user->builder_nr = 1;
                $return = 'Modificare cu success';

            } elseif($input['build_nr'] == 2){
                $user->health = $user->health - 40;
                $user->money = $user->money - 2000;
                $user->builder_nr = 2;
                $return = 'Modificare cu success';

            } elseif($input['build_nr'] == 3){
                $user->health = $user->health - 60;
                $user->money = $user->money - 4000;
                $user->builder_nr = 3;
                $return = 'Modificare cu success';

            } elseif($input['build_nr'] == 4){
                $user->health = $user->health - 80;
                $user->money = $user->money - 6000;
                $user->builder_nr = 4;
                $return = 'Modificare cu success';

            } else {
                $return = 'Modificare eronata';
            }
            $user->save();
            return $return;
        }
    }
}

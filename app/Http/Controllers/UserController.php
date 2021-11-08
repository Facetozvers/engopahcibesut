<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function ganti_password(){
        return view('user.change_password');
    }

    public function store_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['string', 'min:8','same:new_password'],
        ],
        [
            'new_confirm_password.same' => 'Konfirmasi Password Tidak Cocok!',
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect('/')->with(['password_ok' => 'Password Berhasil Dibuah!']);
    }

    public function ubah_profil(){
        $profil = User::where('user_id','=',Auth::user()->user_id)->select('name','phone_number')->first();
        return view('user.ubah_profil', ['profil' => $profil]);
    }

    public function store_profil(Request $request){
        $user = User::find(Auth::id());
        if($request->phone_number == $user->phone_number){
            $request->validate([
                'name' => ['required','string', 'max:30'],
                'current_password' => ['required', new MatchOldPassword],
            ]);
        }
        else{
            $request->validate([
                'name' => ['required','string', 'max:30'],
                'phone_number' => ['required', 'string', 'max:15', 'unique:users'],
                'current_password' => ['required', new MatchOldPassword],
            ],
            [
                'phone_number.unique' => 'Nomor Handphone sudah digunakan!',
            ]);
        }

        $user->name = ucwords($request->name);
        $user->phone_number = $request->phone_number;

        $user->save();

        return redirect('/ubah-profil')->with(['success' => 'Profil Berhasil Diubah!']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit($id_user){
        $user=User::findOrFail($id_user);
        return view('user.edit',['user'=>$user]);
    }
    public function resetPasswordStore($id_user,Request $request){
        $user=User::findOrFail($id_user);
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            return redirect('/user/reset-pass/'.$id_user)
                ->withErrors($validator)
                ->withInput();
        }
        $user->update(['password'=> Hash::make($request->password)]);
        return redirect('/user/edit/'.$id_user);
    }
    public function  resetPassword($id_user){
        $user=User::findOrFail($id_user);
        return view('user.reset',['user'=>$user]);
    }
    public function store(Request $request,$id_user){
        $user=User::findOrFail($id_user);
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'name' => 'required|max:255',
            'surname'=>'nullable|max:255',
            'middle_name '=>'nullable|max:255',
            'phone'=>'nullable|numeric',
        ]);
        if ($validator->fails()) {
            return redirect('/user/edit/'.$id_user)
                ->withErrors($validator)
                ->withInput();
        }
        $user->update([
            'email'=>$request->email,
            'name'=>$request->name,
            'surname' => $request->surname,
            'middle_name' => $request->middle_name,
            'phone' => $request->phone
            ]);
        return redirect('/user/edit/'.$id_user);

    }
}

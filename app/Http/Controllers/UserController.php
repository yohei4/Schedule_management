<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequests;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @return View
     */
    
    public function showLogin() 
    {
        return view('login');
    }

    public function login(UsersRequest $request) 
    {

        dd($request->all());
        // $credentials = $request->only('email','password');

        // if(Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     return redirect('account')->with('login_success','ログイン成功しました！');
        // }

        // return back()->withErrors([
        //     'login_error' => 'メールアドレスかパスワードが間違っています。',
        // ]);
    }



    public function store(UsersRequest $request) {
        $inputs = $request->all();
        try {
            User::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        return redirect(route('account'));
    }
}
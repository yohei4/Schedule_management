<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * @return View
     */
    public function showLogin() 
    {
        return view('schedule_management.login.login');
    }

    public function login(LoginFormRequest $request) 
    {
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('home'))->with('login_success','ログイン成功しました！');
        }
        else {
            return back()->withErrors([
                'login_error' => 'メールアドレスかパスワードが間違っています。',
            ]);
        }
    }

    /**
     * ユーザーのアカウントを作成します。
     * @param App\Http\Requests\UsersRequest
     * @return redirect
     */
    public function store(UsersRequest $request) 
    {
        $inputs = $request->all();
        try {
            $this->create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        return redirect(route('showLogin'));
    }

    /**
     * 有効な登録後に新しいユーザーインスタンスを作成します。
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            '_token' => $data['_token'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequests;
use App\Models\User;

class UserController extends Controller
{
    public function store(UsersRequest $request) {
        $inputs = $request->all();
        try {
            User::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        return redirect(route('Schedule_management.account'));
    }
}
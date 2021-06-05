<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

  //スケジュールを登録する
    public function schedule_store(Request $request)
    {
      $inputs = $request->all();
      $inputs["user_id"] = Auth::user()->id;

      try {
           Schedule::create($inputs);
            \DB::commit();
            } catch(\Throwable $e) {
              dd($e);
              exit;
            \DB::rollback();
            abort(500);
          }
      return redirect(route('home'));
      
    }

    public function schedule()
    {
    //resoucesにarticlesディレクトリがあればその中身を開き
    //indexがつくファイルがあれば返す
    $schedules = Schedule::all();

    return view('schedule_management.home', ['schedules' => $schedules]); 
    }

}

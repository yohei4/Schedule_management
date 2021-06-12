<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Requests\ScheduleRequest;

use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

  //スケジュールを登録する
    public function schedule_store(Request $request)
    {
      $inputs = $request->all();
      $inputs["user_id"] = Auth::user()->id;
      // if ($inputs["checkbox"] = 1) {
      //   $inputs["checkbox"] = "checked";
      // } else {
      //   $inputs["checkbox"] = "";
      // }

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

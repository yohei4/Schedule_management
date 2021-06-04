<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{

  //スケジュールを登録する
    public function schedule_store(Request $request)
    {
      $inputs = $request->all();
      try {
           $this->create($inputs);
            \DB::commit();
            } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
          }
      return redirect(route('home'));
      
    }

    public function schedule()
    {
    //resoucesにarticlesディレクトリがあればその中身を開き
    //indexがつくファイルがあれば返す
    $schedulea = Schedule::all();

    return view('schedule_management.home', ['schedules' => $schedules]); 
    }

}

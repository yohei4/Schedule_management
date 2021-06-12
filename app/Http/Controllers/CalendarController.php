<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar\CalendarView;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function show(){

		$calendar = new CalendarView(time());
        $carbon = new Carbon();
        $year = $params['year'] ?? $carbon->format('Y');

		return view('schedule_management.calendar.home', [
			"calendar" => $calendar,
		]);
	}
}

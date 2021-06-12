<?php
namespace App\Calendar;

use Carbon\Carbon;

class CalendarMonth {

	protected $carbon;
	protected $index = 0;

	function __construct($date, $index = 0){
		$this->carbon = new Carbon($date);
		$this->index = $index;
	}

	function getClassName(){
		return "Month-" . $this->index;
	}

	/**
	 * @return CalendarWeekDay[]
	 */
	public function getweeks(){

		$weeks = [];

		//初日
		$firstDay = $this->carbon->copy()->firstOfMonth();
		//月末まで
		$lastDay = $this->carbon->copy()->lastOfMonth();
		//1週目

		$week = new CalendarWeek($firstDay->copy());
		$weeks[] = $week;


		//作業用の日
		$tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();

		//月末までループさせる
		while($tmpDay->lte($lastDay)){
			//週カレンダーViewを作成する
			$week = new CalendarWeek($tmpDay, count($weeks));
			$weeks[] = $week;
			
            //次の週=+7日する
			$tmpDay->addDay(7);
		}

		return $weeks;
	}

	public function format($string) {
		return $this->carbon->format($string);
	}
	
}
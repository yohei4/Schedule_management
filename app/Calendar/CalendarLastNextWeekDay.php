<?php
namespace App\Calendar;

/**
* 余白を出力するためのクラス
*/
class CalendarLastNextWeekDay extends CalendarWeekDay {
	
    function getClassName(){
		return "day-last-next__month";
	}

	/**
	 * @return 
	 */
	function render(){
		return '<p class="day">' . $this->carbon->format("j"). '</p>';
	}

}
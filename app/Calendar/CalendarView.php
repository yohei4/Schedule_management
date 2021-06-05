<?php 
namespace App\Calendar;

use App\Calendar\CalendarWeek;
use Carbon\Carbon;

class CalendarView {
    private $carbon;
    
    function __construct($data) {
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);
        $this->carbon = new Carbon($data);
    }

    /**
	 * 年
	 */
    public function getYear() {
        // dd($this->carbon);
        return $this->carbon->format('Y');

    }
    
    /**
	 * 年
	 */
    public function getMonth() {
        // dd($this->carbon);
        return $this->carbon->format('Y/m');
    }
    
    /**
	 * カレンダーを出力する
	 */
	function render(string $string) {
        if($string === "year") {
            $html = [];
            $months = $this->getmonths();
            foreach($months as $month) {
                $html[] = '<table id="'. $month->getClassName() . '" class="month-container">';
                $html[] = '<caption class="month">' . $month->format('n月') . '</caption>';
                $html[] = '<thead>';
                $html[] = ' <tr class="day-of-the-weeks">';
                $html[] = '<th>日</th>';
                $html[] = '<th>月</th>';
                $html[] = '<th>火</th>';
                $html[] = '<th>水</th>';
                $html[] = '<th>木</th>';
                $html[] = '<th>金</th>';
                $html[] = '<th>土</th>';
                $html[] = '</tr>';
                $html[] = '</thead>';
                $html[] = '<tbody>';
                $weeks = $month->getweeks();
                foreach($weeks as $week){
                    $html[] = '<tr class="weeks '.$week->getClassName().'">';
                    $days = $week->getDays();
                    // dd($days);
                    foreach($days as $day){
                        $html[] = '<td class=" '.$day->getClassName().'">';
                        $html[] = $day->render();
                        $html[] = '</td>';
                    }
                    $html[] = '</tr>';
                }
                $html[] = '</tbody>';
                $html[] = '</table>';
            }
            $html[] = '</div>';
            return implode("", $html);
        } elseif( $string === "month") {
                $html = [];
                $months = $this->getmonths();
                foreach($months as $month) {
                $html[] = '<table id="'. $month->getClassName() . '" class="month-table" cellSpacing=0>';
                $html[] = '<thead>';
                $html[] = '<tr class="day-of-the-weeks">';
                $html[] = '<th>日</th>';
                $html[] = '<th>月</th>';
                $html[] = '<th>火</th>';
                $html[] = '<th>水</th>';
                $html[] = '<th>木</th>';
                $html[] = '<th>金</th>';
                $html[] = '<th>土</th>';
                $html[] = '</tr>';
                $html[] = '</thead>';
                $html[] = '<tbody>';
                $weeks = $month->getweeks();
                foreach($weeks as $week){
                    $html[] = '<tr class="weeks '.$week->getClassName().'">';
                    $days = $week->getDays();
                    // dd($days);
                    foreach($days as $day){
                        $html[] = '<td class=" '.$day->getClassName().'">';
                        $html[] = $day->render();
                        $html[] = '</td>';
                    }
                    $html[] = '</tr>';
                }
                $html[] = '</tbody>';
                $html[] = '</table>';
            }
            $html[] = '</div>';
            return implode("", $html);
        }
	}

    protected function getYears(int $int) {
        $years = [];

    }

    protected function getMonths() {
        $months = [];

        //初月
        $firstDay = $this->carbon->copy()->firstOfYear();
        //年度末
        $lastDay = $this->carbon->copy()->lastOfYear();

        $month = new CalendarMonth($firstDay->copy(), 1);
        $months[] = $month;

        //作業用の日
		$tmpDay = $firstDay->copy()->addDay(31)->startOfMonth();
        //年末までループさせる
		while($tmpDay->lte($lastDay)){
			//年カレンダーViewを作成する
			$month = new CalendarMonth($tmpDay->firstOfMonth(), count($months));
			$months[] = $month;
			
            //次の週=+7日する
			$tmpDay->addDay(31);
		}

		return $months;
        return $tmpDay;
    }

    protected function getWeeks(){
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
}
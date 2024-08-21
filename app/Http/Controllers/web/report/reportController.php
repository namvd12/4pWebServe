<?php

namespace App\Http\Controllers\web\report;

use App\Http\Controllers\Controller;
use App\Models\deviceReport;
use Illuminate\Http\Request;
use DateTime;
class reportController extends Controller
{
    public function viewReportAllLine()
    {
        return view('report.reportAllLine');
    }
    /*********************All line ********************/
    public function viewReportCurrentByDay(Request $request)
    {
        if($request->get('timeFrom') != null && $request->get('timeTo') != null)
        {
            $timeForm = $request->get('timeFrom');
            $timeTo = $request->get('timeTo');

            $dateForm = Date("Y-m-d", strtotime($timeForm));
            $dateTo = Date("Y-m-d", strtotime($timeTo));
            $listReport = array();
 
            for($date = $dateForm; strtotime($date) <= strtotime($dateTo) ; $date = date('Y-m-d', strtotime($date. ' +1 days')))
            {
             
                $listReport[] = $this->searchReportByTime($date, $date);
            }
            return $listReport;
        }
        return "Error";
    }
    public function viewReportCurrentByWeek(Request $request)
    {
        if($request->get('week') != null)
        {
            $weekArray = explode(" ",$request->get('week'));
            $week = (int)$weekArray[1];
            $listReport = array();
            for($cntWeek = $week - 7; $cntWeek <= $week; $cntWeek++)
            {
                if($cntWeek > 0)
                {
                    $firstDayOfWeek = new DateTime();
                    $firstDayOfWeek->setISODate(Date("Y"), $cntWeek);

                    $lastDayOfWeek = new DateTime();
                    $lastDayOfWeek->setISODate(Date("Y"), $cntWeek);

                    $lastDayOfWeek = $lastDayOfWeek->modify('+6 days');  

                    $listReport[] = $this->searchReportByTime($firstDayOfWeek->format('Y-m-d'), $lastDayOfWeek->format('Y-m-d'), $cntWeek);
                }
            }
            return $listReport;
        }
        return "Error";
    }
    public function viewReportCurrentByMonth(Request $request)
    {
        if($request->get('month') != null)
        {
            $monthString = $request->get('month');
            
            $monthNumber = (int)getMonthNumber($monthString);
            $listReport = array();
            for($cntMonth = $monthNumber - 7; $cntMonth <= $monthNumber; $cntMonth++)
            {
                if($cntMonth > 0)
                {
                    $year = Date("Y");
                    $firstDayOfMonth = new DateTime("$year-$cntMonth-01");

                    $lastDayOfMonth = new DateTime("$year-$cntMonth-01");

                    $lastDayOfMonth = $lastDayOfMonth->modify('last day of this month');  

                    $listReport[] = $this->searchReportByTime($firstDayOfMonth->format('Y-m-d'), $lastDayOfMonth->format('Y-m-d'), null, $cntMonth);
                }
            }
            return $listReport;
        }
        return "Error";
    }

    /**********************Each line *********************/
    public function viewReportEachLineByDay(Request $request)
    {
        if($request->get('date') != null)
        {
            $time = $request->get('date');
            $dateSearch = Date("Y-m-d", strtotime($time));
            $listReport = array();
 
            for($cntline = 1; $cntline <= 8 ; $cntline++)
            {            
                $listReport[] = $this->searchReportByLine($cntline, $dateSearch, $dateSearch);
            }
            return $listReport;
        }
        return "Error";
    }
    public function viewReportEachLineByWeek(Request $request)
    {
        if($request->get('week') != null)
        {
            $weekArray = explode(" ",$request->get('week'));
            $week = (int)$weekArray[1];
            $listReport = array();
            for($cntline = 1; $cntline <= 8 ; $cntline++)
            {
                $firstDayOfWeek = new DateTime();
                $firstDayOfWeek->setISODate(Date("Y"), $week);

                $lastDayOfWeek = new DateTime();
                $lastDayOfWeek->setISODate(Date("Y"), $week);

                $lastDayOfWeek = $lastDayOfWeek->modify('+6 days');  

                $listReport[] = $this->searchReportByLine($cntline, $firstDayOfWeek->format('Y-m-d'), $lastDayOfWeek->format('Y-m-d'), $week);
            }
            return $listReport;
        }
        return "Error";
    }
    public function viewReportEachLineByMonth(Request $request)
    {
        if($request->get('month') != null)
        {
            $monthString = $request->get('month');
            
            $monthNumber = (int)getMonthNumber($monthString);
            $listReport = array();
            for($cntline = 1; $cntline <= 8 ; $cntline++)
            {
                $year = Date("Y");
                $firstDayOfMonth = new DateTime("$year-$monthNumber-01");

                $lastDayOfMonth = new DateTime("$year-$monthNumber-01");

                $lastDayOfMonth = $lastDayOfMonth->modify('last day of this month');  

                $listReport[] = $this->searchReportByLine($cntline, $firstDayOfMonth->format('Y-m-d'), $lastDayOfMonth->format('Y-m-d'), null, $monthNumber);
            }
            return $listReport;
        }
        return "Error";
    }

    /********************* MTTR ***************************/
    public function viewReportMTTRByDay(Request $request)
    {
        if($request->get('date') != null)
        {          
            $date = $request->get('date');
            $dateTo = Date("Y-m-d", strtotime($date));
            $dateFrom = Date("Y-m-d", strtotime($date.'- 7 days'));
            for($date = $dateFrom; strtotime($date) <= strtotime($dateTo) ; $date = date('Y-m-d', strtotime($date. ' +1 days')))
            {
                $listDay[] = $date;
                for($numLine = 0; $numLine <= 8; $numLine++)
                {                    
                    // search LTE
                    $data = $this->searchReportByLine($numLine, $date, $date);
                    if($numLine == 0)
                    {
                        $numLine_str = "lineLTE";
                    }
                    else
                    {
                        $numLine_str = "line$numLine";
                    }
                    if($data["count_NG"])
                    {
                        $$numLine_str[] = round(($data["time_NG"] / $data["count_NG"]), 2);
                    }
                    else
                    {
                        $$numLine_str[] = 0;
                    }
                }
                
            }
            //$listMTTR["lineLTE"] = $lineLTE;
            $listMTTR["line1"] = $line1;
            $listMTTR["line2"] = $line2;
            $listMTTR["line3"] = $line3;
            $listMTTR["line4"] = $line4;
            $listMTTR["line5"] = $line5;
            $listMTTR["line6"] = $line6;
            $listMTTR["line7"] = $line7;
            $listMTTR["line8"] = $line8;
    
            $data["listDay"]  = $listDay;
            $data["listMTTR"] = $listMTTR;
            return $data;
        }
    }
    public function viewReportMTTRByWeek(Request $request)
    {
        if($request->get('week') != null)
        {          
            $weekArray = explode(" ",$request->get('week'));
            $week = (int)$weekArray[1];
            for($cntWeek = $week - 7; $cntWeek <= $week; $cntWeek++)
            {
                if($cntWeek > 0)
                {
                    $listDay[] = "Week $cntWeek";
                    $firstDayOfWeek = new DateTime();
                    $firstDayOfWeek->setISODate(Date("Y"), $cntWeek);

                    $lastDayOfWeek = new DateTime();
                    $lastDayOfWeek->setISODate(Date("Y"), $cntWeek);

                    $lastDayOfWeek = $lastDayOfWeek->modify('+6 days');  
                    for($numLine = 0; $numLine <= 8; $numLine++)
                    {                    
                        // search LTE
                        $data = $this->searchReportByLine($numLine, $firstDayOfWeek->format('Y-m-d'),  $lastDayOfWeek->format('Y-m-d'));
                        if($numLine == 0)
                        {
                            $numLine_str = "lineLTE";
                        }
                        else
                        {
                            $numLine_str = "line$numLine";
                        }
                        if($data["count_NG"])
                        {
                            $$numLine_str[] = round(($data["time_NG"] / $data["count_NG"]), 2);
                        }
                        else
                        {
                            $$numLine_str[] = 0;
                        }
                    }
                }               
            }
            $listMTTR["lineLTE"] = $lineLTE;
            $listMTTR["line1"] = $line1;
            $listMTTR["line2"] = $line2;
            $listMTTR["line3"] = $line3;
            $listMTTR["line4"] = $line4;
            $listMTTR["line5"] = $line5;
            $listMTTR["line6"] = $line6;
            $listMTTR["line7"] = $line7;
            $listMTTR["line8"] = $line8;
    
            $data["listDay"]  = $listDay;
            $data["listMTTR"] = $listMTTR;
            return $data;
        }
    }
    public function viewReportMTTRByMonth(Request $request)
    {
        if($request->get('month') != null)
        {          
            $monthString = $request->get('month');           
            $monthNumber = (int)getMonthNumber($monthString);
            for($cntMonth = $monthNumber - 7; $cntMonth <= $monthNumber; $cntMonth++)
            {
                if($cntMonth > 0)
                {
                    $listDay[] = $cntMonth;
                    $year = Date("Y");
                    $firstDayOfMonth = new DateTime("$year-$cntMonth-01");

                    $lastDayOfMonth = new DateTime("$year-$cntMonth-01");

                    $lastDayOfMonth = $lastDayOfMonth->modify('last day of this month');  
                    for($numLine = 0; $numLine <= 8; $numLine++)
                    {                    
                        // search LTE
                        $data = $this->searchReportByLine($numLine, $firstDayOfMonth->format('Y-m-d'),  $lastDayOfMonth->format('Y-m-d'));
                        if($numLine == 0)
                        {
                            $numLine_str = "lineLTE";
                        }
                        else
                        {
                            $numLine_str = "line$numLine";
                        }
                        if($data["count_NG"])
                        {
                            $$numLine_str[] = round(($data["time_NG"] / $data["count_NG"]), 2);
                        }
                        else
                        {
                            $$numLine_str[] = 0;
                        }
                    }
                }               
            }
            $listMTTR["lineLTE"] = $lineLTE;
            $listMTTR["line1"] = $line1;
            $listMTTR["line2"] = $line2;
            $listMTTR["line3"] = $line3;
            $listMTTR["line4"] = $line4;
            $listMTTR["line5"] = $line5;
            $listMTTR["line6"] = $line6;
            $listMTTR["line7"] = $line7;
            $listMTTR["line8"] = $line8;
    
            $data["listDay"]  = $listDay;
            $data["listMTTR"] = $listMTTR;
            return $data;
        }
    }
    /**********************MTTF **************************/
    public function viewReportMTBFByDay(Request $request)
    {
        if($request->get('date') != null)
        {          
            $date = $request->get('date');
            $dateTo = Date("Y-m-d", strtotime($date));
            $dateFrom = Date("Y-m-d", strtotime($date.'- 7 days'));
            for($date = $dateFrom; strtotime($date) <= strtotime($dateTo) ; $date = date('Y-m-d', strtotime($date. ' +1 days')))
            {
                $listDay[] = $date;
                for($numLine = 0; $numLine <= 8; $numLine++)
                {                    
                    // search LTE
                    $data = $this->searchReportByLine($numLine, $date, $date);
                    if($numLine == 0)
                    {
                        $numLine_str = "lineLTE";
                    }
                    else
                    {
                        $numLine_str = "line$numLine";
                    }
                    if($data["count_NG"])
                    {
                        $noPlan = 100;
                        $mtbf = Abs((($noPlan - $data["time_NG"]) / 60) / $data["count_NG"]);
                        $$numLine_str[] = round($mtbf, 2);
                    }
                    else
                    {
                        $$numLine_str[] = 0;
                    }
                }
                
            }
            //$listMTTR["lineLTE"] = $lineLTE;
            $listMTBF["line1"] = $line1;
            $listMTBF["line2"] = $line2;
            $listMTBF["line3"] = $line3;
            $listMTBF["line4"] = $line4;
            $listMTBF["line5"] = $line5;
            $listMTBF["line6"] = $line6;
            $listMTBF["line7"] = $line7;
            $listMTBF["line8"] = $line8;
    
            $data["listDay"]  = $listDay;
            $data["listMTBF"] = $listMTBF;
            return $data;
        }
    }
    public function viewReportMTBFByWeek(Request $request)
    {
        if($request->get('week') != null)
        {          
            $weekArray = explode(" ",$request->get('week'));
            $week = (int)$weekArray[1];
            for($cntWeek = $week - 7; $cntWeek <= $week; $cntWeek++)
            {
                if($cntWeek > 0)
                {
                    $listDay[] = "Week $cntWeek";
                    $firstDayOfWeek = new DateTime();
                    $firstDayOfWeek->setISODate(Date("Y"), $cntWeek);

                    $lastDayOfWeek = new DateTime();
                    $lastDayOfWeek->setISODate(Date("Y"), $cntWeek);

                    $lastDayOfWeek = $lastDayOfWeek->modify('+6 days');  
                    for($numLine = 0; $numLine <= 8; $numLine++)
                    {                    
                        // search LTE
                        $data = $this->searchReportByLine($numLine, $firstDayOfWeek->format('Y-m-d'),  $lastDayOfWeek->format('Y-m-d'));
                        if($numLine == 0)
                        {
                            $numLine_str = "lineLTE";
                        }
                        else
                        {
                            $numLine_str = "line$numLine";
                        }
                        if($data["count_NG"])
                        {
                            $noPlan = 100;
                            $mtbf = Abs((($noPlan - $data["time_NG"]) / 60) / $data["count_NG"]);
                            $$numLine_str[] = round($mtbf, 2);
                        }
                        else
                        {
                            $$numLine_str[] = 0;
                        }
                    }
                }               
            }
            $listMTBF["lineLTE"] = $lineLTE;
            $listMTBF["line1"] = $line1;
            $listMTBF["line2"] = $line2;
            $listMTBF["line3"] = $line3;
            $listMTBF["line4"] = $line4;
            $listMTBF["line5"] = $line5;
            $listMTBF["line6"] = $line6;
            $listMTBF["line7"] = $line7;
            $listMTBF["line8"] = $line8;
    
            $data["listDay"]  = $listDay;
            $data["listMTBF"] = $listMTBF;
            return $data;
        }
    }
    public function viewReportMTBFByMonth(Request $request)
    {
        if($request->get('month') != null)
        {          
            $monthString = $request->get('month');           
            $monthNumber = (int)getMonthNumber($monthString);
            for($cntMonth = $monthNumber - 7; $cntMonth <= $monthNumber; $cntMonth++)
            {
                if($cntMonth > 0)
                {
                    $listDay[] = $cntMonth;
                    $year = Date("Y");
                    $firstDayOfMonth = new DateTime("$year-$cntMonth-01");

                    $lastDayOfMonth = new DateTime("$year-$cntMonth-01");

                    $lastDayOfMonth = $lastDayOfMonth->modify('last day of this month');  
                    for($numLine = 0; $numLine <= 8; $numLine++)
                    {                    
                        // search LTE
                        $data = $this->searchReportByLine($numLine, $firstDayOfMonth->format('Y-m-d'),  $lastDayOfMonth->format('Y-m-d'));
                        if($numLine == 0)
                        {
                            $numLine_str = "lineLTE";
                        }
                        else
                        {
                            $numLine_str = "line$numLine";
                        }
                        if($data["count_NG"])
                        {
                            $noPlan = 100;
                            $mtbf = Abs((($noPlan - $data["time_NG"]) / 60) / $data["count_NG"]);
                            $$numLine_str[] = round($mtbf, 2);
                        }
                        else
                        {
                            $$numLine_str[] = 0;
                        }
                    }
                }               
            }
            $listMTBF["lineLTE"] = $lineLTE;
            $listMTBF["line1"] = $line1;
            $listMTBF["line2"] = $line2;
            $listMTBF["line3"] = $line3;
            $listMTBF["line4"] = $line4;
            $listMTBF["line5"] = $line5;
            $listMTBF["line6"] = $line6;
            $listMTBF["line7"] = $line7;
            $listMTBF["line8"] = $line8;
    
            $data["listDay"]  = $listDay;
            $data["listMTBF"] = $listMTBF;
            return $data;
        }
    }
    /*************************************************** */
    public function searchReportByTime($timeForm, $timeTo, $numberWeek = null, $numberMonth = null)
    {
        // get all status NG and OK form time
        $listDataNG = deviceReport::listHistoryReportSearch(null, $timeForm,  $timeTo);

        $data['timeForm'] = $timeForm;
        $data['timeTo'] = $timeTo;
        if($numberWeek != null)
        {
            $data['week'] = "Week $numberWeek";
        }
        if($numberMonth != null)
        {
            $data['month'] = "$numberMonth";
        }
        // caculate number NG
        if($listDataNG == null)
        {
            $data['count_NG'] = 0;
            $data['time_NG'] = 0;
        }
        else
        {
            $data['count_NG'] = count($listDataNG);           
            // caculate time NG
            $data['time_NG'] = 0;
            if($data['count_NG'] >= 0)
            {
                foreach($listDataNG as $DataNG)
                {
                    if($DataNG["statusOK"] != "")
                    {
                        $timeOK = str_replace('/','-', $DataNG['timeOK']);
                        $timeNG = str_replace('/','-', $DataNG['time']);
        
                        $timeOK = new DateTime("$timeOK");
                        $timeNG = new DateTime("$timeNG");
                        $interval = $timeOK->diff($timeNG);
                        $minutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
                        $data['time_NG'] += $minutes;
                    }
                }
            }
        }
        return $data;
    }
    public function searchReportByLine($line , $timeFrom, $timeTo, $numberWeek = null, $numberMonth = null)
    {
        // get all status NG and OK form time
        $listDataNG = deviceReport::listHistoryReportSearch(null, $timeFrom,  $timeTo, $line);

        $data['timeFrom'] = $timeFrom;
        $data['timeTo'] = $timeTo;
        $data['week'] = $numberWeek;
        $data['month'] = $numberMonth;
        $data['line'] = "Line $line";
        // caculate number NG
        if($listDataNG == null)
        {
            $data['count_NG'] = 0;
            $data['time_NG'] = 0;
        }
        else
        {
            $data['count_NG'] = count($listDataNG);           
            // caculate time NG
            $data['time_NG'] = 0;
            if($data['count_NG'] >= 0)
            {
                foreach($listDataNG as $DataNG)
                {
                    if($DataNG["statusOK"] != "")
                    {
                        $timeOK = str_replace('/','-', $DataNG['timeOK']);
                        $timeNG = str_replace('/','-', $DataNG['time']);
        
                        $timeOK = new DateTime("$timeOK");
                        $timeNG = new DateTime("$timeNG");
                        $interval = $timeOK->diff($timeNG);
                        $minutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
                        $data['time_NG'] += $minutes;
                    }
                }
            }
        }
        return $data;
    }
    public function searchMttrByTime($time)
    {
        $listDay = ["Day1","Day2","Day3"];
        $lineLTE = [1,2,3];
        $line1 = [1,2,3];
        $line2 = [1,2,3];
        $line3 = [1,2,3];
        $line4 = [1,2,3];
        $line5 = [1,2,3];
        $line6 = [1,2,3];
        $line7 = [1,2,3];
        $line8 = [1,2,3];
        

    }
}

function getMonthNumber($monthName) {
    $date = DateTime::createFromFormat('F', $monthName);
    return $date ? $date->format('n') : false;  // 'n' trả về số tháng không có số 0 đứng trước
}
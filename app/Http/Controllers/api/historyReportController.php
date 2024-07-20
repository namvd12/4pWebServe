<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tula_table6;
class historyReportController extends Controller
{
    public function infor(Request $request)
    {
        $request = json_decode($request->getContent(), TRUE);
        if(isset($request['tulaKey']))
        {
            $tula_key = $request['tulaKey'];
            if(isset($request['tulaData']) && $request['tulaData'] = 'all')
            {
                // show list history one device
                return $this->showAllHistoryOneDevice($tula_key);
            } 
            else if($request['tulaKey'] == "allReport" && isset($request['timeFrom']) && isset($request['timeTo']))
            {
                // show list history report all device
                $timeForm = $request['timeFrom'];
                $timeTo = $request['timeTo'];
                return $this->showHistoryReportAllDevice($timeForm, $timeTo);        
            }
        }
        else
        {
            return $this->responseError();
        }
    }
    
    protected function showAllHistoryOneDevice($tula_key)
    {
        $dataTable = new tula_table6();
        $listHistory = $dataTable->listHistory($tula_key);
        $response = array();
        $numberDevice = 0;
        if($listHistory != null)
        {
            foreach($listHistory as $history)
            {
                $numberDevice++;
                foreach($history as $key=>$value)
                {   
                    if($key == 'tula_Key')
                    {
                        $key = 'tulaKey';
                        $response[$key.$numberDevice] = $value;
                    }
                    else
                    {
                        $response[$key.'_'.$numberDevice] = $value;
                    }
                }
            }
            $response["total"]    = $numberDevice;
            $response["status"]    = 1;          // 1: Successful
            $response["message"]   = "Successful";

        }
		else
		{
			$response["status"] = 1;
			$response["message"] = "NO DATA";
		}
        return json_encode($response);
    }

    protected function showHistoryReportAllDevice($timeForm, $timeTo)
    {
        $dataTable = new tula_table6();
        $listHistory = $dataTable->listHistoryAllDevice($timeForm,  $timeTo);
        $response = array();
        $numberDevice = 0;
        if($listHistory != null)
        {            
            foreach($listHistory as $history)
            {
                $numberDevice++;
                foreach($history as $key=>$value)
                {   
                    if($key == 'tula_Key')
                    {
                        $key = 'tulaKey';
                        $response[$key.$numberDevice] = $value;
                    }
                    else
                    {
                        $response[$key.'_'.$numberDevice] = $value;
                    }
                }
            }

            $response["total"]    = $numberDevice;
            $response["status"]    = 1;          // 1: Successful
            $response["message"]   = "Successful";

        }
		else
		{
			$response["status"] = 1;
			$response["message"] = "NO DATA";
		}
        return json_encode($response);
    }
    
   

    protected function responseError()
    {
        $response["status"] = 0;
        $response["message"] = "Missing mandatory parameters";
        return json_encode($response);
    }
}
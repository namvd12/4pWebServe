<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\deviceStatus;

class historyController extends Controller
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
                return $this->showAllHistory($tula_key);
            }
            else if(isset($request['text0']) || isset($request['text1']) || isset($request['text2']) || isset($request['text3']) || isset($request['text4']) || isset($request['text5'])|| isset($request['text6'])
                 || isset($request['image1']) || isset($request['image2']) || isset($request['image3']) || isset($request['image4']) || isset($request['image5'])|| isset($request['image6']) 
                 || isset($request['device']) || isset($request['status']))
            {
                return $this->updateDataHistory($tula_key, $request);
            }
            else
            {
                // show detail history one device
                return $this->showHistory($tula_key);          
            }
        }
        else
        {
            return $this->responseError();
        }
    }
    
    protected function showAllHistory($tula_key)
    {
        $dataTable = new deviceStatus();
        $listHistory = $dataTable->listHistory($tula_key);
        $response = array();
        $numberDevice = 0;
       
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
        if($numberDevice != 0){
			$response["total"]    = $numberDevice;
            $response["status"]    = 1;          // 1: Successful
            $response["message"]   = "Successful";
		}	
		else
		{
			$response["status"] = 0;
			$response["message"] = "No MC Error";
			$response["total"]    = 0;
		}
        return json_encode($response);
    }

    protected function showHistory($tula_key)
    {
        $dataTable = new deviceStatus();
        $History = $dataTable->history($tula_key);
        $response = array();
       
        if($History){
            $History['tulaKey'] = $History['tula_Key'];
            $response["status"]    = 1;          // 1: Successful
            $response["message"]   = "Successful";
            $response+=$History;
        }
        else
        {
            $response["message"] = "Invalid HistoryID";
            $response["total"]    = 0;
        }
        return json_encode($response);
    }
    
    protected function updateDataHistory($tula_key, $request)
    {
        $dataTable = new deviceStatus();
        $text['text6'] = array_key_exists('text0',$request)? $request['text0'] : "";
        $text['text10'] = array_key_exists('text1',$request)? $request['text1'] : "";
        $text['text12'] = array_key_exists('text2',$request)? $request['text2'] : "";
        $text['text14'] = array_key_exists('text3',$request)? $request['text3'] : "";
        $text['text16'] = array_key_exists('text4',$request)? $request['text4'] : "";
        $text['text18'] = array_key_exists('text5',$request)? $request['text5'] : "";
        $text['text20'] = array_key_exists('text6',$request)? $request['text6'] : "";

        $image['image9'] = array_key_exists('image1',$request)? $request['image1'] : "";
        $image['image11'] = array_key_exists('image2',$request)? $request['image2'] : "";
        $image['image13'] = array_key_exists('image3',$request)? $request['image3'] : "";
        $image['image15'] = array_key_exists('image4',$request)? $request['image4'] : "";
        $image['image17'] = array_key_exists('image5',$request)? $request['image5'] : "";
        $image['image19'] = array_key_exists('image6',$request)? $request['image6'] : "";

        $device = array_key_exists('device',$request)? $request['device'] : "";
        $status = array_key_exists('status',$request)? $request['status'] : "";

        // store image
        for($i = 9; $i<=19; $i = $i+2)
        {
            // write file image1
            $cur_dir = getcwd().'\..\storage\app\public';
            $folder = '/dataHistory/';
            if($image['image'.$i] != "")
            {
                $image['imageDir'.$i] = implode("",array($cur_dir, $folder, $tula_key,'_', time(),'image'.$i,'.txt'));
                $myfile = fopen($image['imageDir'.$i], "w+") or die("Unable to open file!");
                fwrite($myfile, $image['image'.$i]);
                fclose($myfile);
            }
        }
        
        // update text and dirImage to db
        $status = $dataTable->writeDataHistory($tula_key, $text, $image, $device, $status);
        if($status)
        {
            $response["status"]    = 1;          // 1: Successful
            $response["message"]   = "Successful";
        }
        else
        {
            $response["status"] = 0;
			$response["message"] = "Invalid MC";
        }
        return json_encode($response);
    }

    protected function responseError()
    {
        $response["status"] = 2;
        $response["message"] = "Missing mandatory parameters";
        return json_encode($response);
    }

}
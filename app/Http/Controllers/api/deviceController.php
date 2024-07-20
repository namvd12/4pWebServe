<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\tula_table1;
class deviceController extends Controller
{
    public function infor(Request $request)
    {      
        //$request=$request->all();
        $request = json_decode($request->getContent(), TRUE);
        if(isset($request['tulaKey']))
        {
            $dataTulaKey = $request['tulaKey'];
            if($dataTulaKey == "allError")
            {
                // handle send device NG infor
                return $this->showAllError();
            }
            else if ($dataTulaKey == "all")
            {
                 // handle send device i
                 return $this->showAllDevice();
            }
            else
            {
                if(isset($request['tulaData1']))
                {
                    // handle send device image 
                    $dataImage = $request['tulaData1'];
                    return $this->receiveDeviceImage($dataTulaKey, $dataImage);
                }
                else
                {
                    // show one device                   
                    return $this->showOneDevice($dataTulaKey);
                }
            }
        }
        else
        {
            return $this->responseError();
        }
    }
    
    protected function showAllError()
    {
        $dataTable = new tula_table1();
        $listDeviceNG = $dataTable->deviceNG(false);
        $response = array();
        $numberDevice = 0;
       
        foreach($listDeviceNG as $deviceNG)
        {       
            $numberDevice++;
            foreach($deviceNG as $key=>$value)
            {
                if($key == 'tula_Key')
                {
                    $key = 'tulaKey';
                }
                $response[$key.'_'.$numberDevice] = $value;
            }
        }
        if($numberDevice != 0){
            
			$response["status"]    = 1;          // 1: Successful
            $response["message"]   = "Successful";
			$response["total"]    = $numberDevice;
		}	
		else
		{
			$response["status"] = 1;
			$response["message"] = "No MC Error";
			$response["total"]    = 0;
		}
        return json_encode($response);
    }

    protected function showAllDevice()
    {
        $dataTable = new tula_table1();
        $listDeviceNG = $dataTable->deviceAll(false);
        $response = array();
        $numberDevice = 0;
       
        foreach($listDeviceNG as $deviceNG)
        {
            $numberDevice++;
            foreach($deviceNG as $key=>$value)
            {   
                if($key == 'tula_Key')
                {
                    $key = 'tulaKey';
                }
                $response[$key.'_'.$numberDevice] = $value;
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

    protected function showOneDevice($tula_key_or_code)
    {
        $dataTable = new tula_table1();
        $device = $dataTable->findOneDevice($tula_key_or_code,false);

        // read data 
        $content = "";
        $fileImage = $device[0]['tula7'];
        if(file_exists($device[0]['tula7']))
        {
            $myfile = fopen("$fileImage", "r") or die("Unable to open file!");
            if(filesize("$fileImage") > 0){
                $content = fread($myfile, filesize("$fileImage"));
                $device[0]['tula7'] = $content;
                fclose($myfile);
            }
        }
        $response["status"] = 1;
		$response["message"] = "Successful";
        $response+=$device[0];
        return json_encode($response);
    }
    protected function responseError()
    {
        $response["status"] = 0;
        $response["message"] = "Missing mandatory parameters";
        return json_encode($response);
    }

    protected function receiveDeviceImage($tulaKey, $dataImage){

        // write file
        $time = date("Y-m-d H:i:s");
        $cur_dir = getcwd().'\..\storage\app\public';

        $image_dir = implode("",array($cur_dir,'/dataMachine/',$tulaKey,'.txt'));

        $myfile = fopen($image_dir, "w") or die("Unable to open file!");

        fwrite($myfile, $dataImage);
        fclose($myfile);

        $dataTable = new tula_table1();
        $dataTable->updateImage($tulaKey, $image_dir);
        
        $response["status"]   = 1;          // 1: Successful
		$response["message"]  = "Successful";
        return json_encode($response);
    }
}
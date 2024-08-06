<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\convertDb;
use App\Models\device;


class deviceStatus extends Model
{
    use HasFactory;
    protected $table = 'tula_table2';
    public $timestamps = false;
    protected $with_scale = 300;
    protected $heigh_scale = 300;
    
    public function listHistory($WhereData, $convert = true)
    {
        // search tula_key from $WhereData
        $datas = device::where('tula_Key', intval($WhereData))
                                 ->orwhere('tula1', "$WhereData")->get();

        $datas = convertDb::convertDataBase($datas, convertDb::$mapTable1, false);
        
        $tula_key = $datas[0]['tula_Key'];

        // search list data form tula_key

        $datas = deviceStatus::where('tula21',$tula_key)
                            ->orwhere('tula1',$tula_key)
                            ->where(function($query){
                                $query->where('tula8','OK')
                                    ->orwhere('tula8','NG')
                                    ->orwhere('tula8','DIS');})
                            ->orderBy('tula_Key','DESC')
                            ->limit(100)->get();
        $listHistory = convertDb::convertDataBase($datas, convertDb::$mapTable2, false);      
        
        foreach($listHistory as $key=>$History)
        {
            // check image
            $isImage = "false";
            if(file_exists($History["tula9"]) || file_exists($History["tula11"]) || file_exists($History["tula13"]) || file_exists($History["tula15"])  ||  file_exists($History["tula17"]) ||  file_exists($History["tula19"]))
            {
                $isImage = "true";
            }
            $listHistory[$key]['tula9'] = $isImage;
            // search sub device information
            $dataInfor = device::select('tula1','tula3','tula4')->where('tula_Key',$History['tula1'])->get([]);       
            $subDeviceInfor = convertDb::convertDataBase($dataInfor, convertDb::$mapTable1, false); 
            $listHistory[$key]['tula10'] = $subDeviceInfor[0]['tula1'];
            $listHistory[$key]['tula11'] = $subDeviceInfor[0]['tula3'];
            $listHistory[$key]['tula12'] = $subDeviceInfor[0]['tula4'];
        }
        return $listHistory;
    }

    public function history($whereData)
    {
        // search data history from history key
        $datas = deviceStatus::where('tula_Key',$whereData)->get();
        $history = convertDb::convertDataBase($datas, convertDb::$mapTable2, false); 
        if(!$history)
        {
            return null;
        }
        $history = $history[0];

        //read raw 5 image from col tula9, tula11, tula13, tula15, tula17, tula19       
        for($i = 9; $i<=19 ; $i = $i+2)
        {
            $dirImage = $history['tula'.$i];
            if(file_exists($dirImage))
            {
                $myfile = fopen("$dirImage", "r") or die("Unable to open file!");
                if(filesize("$dirImage") > 0){
                    $imageData = fread($myfile, filesize("$dirImage"));
                    fclose($myfile);
                    
                    $history['tula'.$i] = $this->resizeImage($imageData);
                }
            }
            else
            {
                $history['tula'.$i] = "";
            }
        }
        //print_r($history);
        // handle show list subdevice
        $listSub = '';
        //search subdevice active
        $datas = device::where('tula_Key', $history['tula21'])->get();
        if(count($datas))
        {
            $deviceSubActive = convertDb::convertDataBase($datas, convertDb::$mapTable1, false); 

            $deviceSubActiveCode = $deviceSubActive[0]['tula1'];
            $listSub  .= $deviceSubActiveCode;
        }

        // search main subdevice
        $datas = device::where('tula_Key', $history['tula1'])->get();
        $deviceMain = convertDb::convertDataBase($datas, convertDb::$mapTable1, false); 
        $deviceMainCode = $deviceMain[0]['tula1'];
        if(!str_contains($listSub,$deviceMainCode))
        {
            if($listSub != '')
            {
                $listSub .= ',';
            }
            $listSub  .= $deviceMainCode;
        }
        
        // search list subdevice
        $datas = device::select('tula1')->where('tula1', 'like','%'.$deviceMain[0]['tula1'].'.%')->get();
        $listdeviceSub = convertDb::convertDataBase($datas, convertDb::$mapTable1, false); 
        foreach($listdeviceSub as $deviceSub)
        {
            if(!str_contains($listSub,$deviceSub['tula1']))
            {                
                $listSub .= ',';
                $listSub .= $deviceSub['tula1'];
            }
        }
        $history['tula21'] = $listSub;
        return $history;
    }

    public function writeDataHistory($tula_key, $text, $image, $Subdevice, $userID)
    {
        $dataUpdate = array();

        /* text */
        for($i = 6; $i <=20 ;$i = $i+2)
        {            
            if($text['text'.$i] !='')
            {
                $dataUpdate['tula'.$i] = $text['text'.$i];
            }
            if($i == 6)
            {
                $i = $i+2;
            }
        }

        /* image */
        for($i = 9; $i <=19 ; $i = $i+2)
        {            
            if($image['image'.$i] != '')
            {
                $dataUpdate['tula'.$i] = $image['imageDir'.$i];
            }
        }

        /* device */
        $datas = device::select('tula_Key')->where('tula1',$Subdevice)->get();
        $deviceSub = convertDb::convertDataBase($datas, convertDb::$mapTable1, false); 
        if(!count($deviceSub))
        {
            return false;
        }
        $dataUpdate['tula21'] = $deviceSub[0]['tula_Key'];

        /* UserID*/
        $dataUpdate['tula22'] = $userID;
        /* update data */
        deviceStatus::where('tula_Key',$tula_key)->update($dataUpdate);

        return true;
    }
    
    protected function resizeImage($imageDataEncodebase64)
    {
        $WIDTH                  = 300; // The size of your new image
        $HEIGHT                 = 300;  // The size of your new image
        $imageDataDecode =  base64_decode($imageDataEncodebase64);
        $image = imagecreatefromstring($imageDataDecode);
        $org_w = imagesx($image);
        $org_h = imagesy($image);

        $image_little = imagecreatetruecolor($WIDTH, $HEIGHT);
        // $org_w and org_h depends of your image, in your case, i guess 800 and 600
        imagecopyresampled($image_little, $image, 0, 0, 0, 0, $WIDTH, $HEIGHT, $org_w, $org_h);
        
        // start buffering
        ob_start();
        imagepng($image_little);
        $contents =  ob_get_contents();
        ob_end_clean();       
        $theme_image_enc_little = base64_encode($contents);
        return  $theme_image_enc_little;
    }
}
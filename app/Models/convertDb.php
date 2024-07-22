<?php
namespace App\Models;

class convertDb{

    public static $mapTable1 = [
        'tula_Key' => 'deviceID', 
        'tula1' => 'deviceCode', 
        'tula2' => 'deviceName', 
        'tula3' => 'deviceLine', 
        'tula4' => 'deviceLane', 
        'tula5' => 'status', 
        'tula6' => 'time', 
        'tula7' => 'pictureDevice', 
        'tula8' => 'note', 
        'tula9' => 'manager', 
        'tula10' => 'model', 
        'tula11' => 'serial', 
        'tula12' => 'topBot', 
    ];
    public static $mapTable2 = [
        'tula_Key' => 'historyID', 
        'tula1' => 'deviceKey', 
        'tula2' => 'deviceName', 
        'tula3' => 'deviceLine', 
        'tula4' => 'deviceLane', 
        'tula5' => 'noTrouble', 
        'tula6' => 'troubleName', 
        'tula7' => 'time', 
        'tula8' => 'status', 
        'tula9' => 'picture1', 
        'tula10' => 'note1', 
        'tula11' => 'picture2', 
        'tula12' => 'note2', 
        'tula13' => 'picture3', 
        'tula14' => 'note3', 
        'tula15' => 'picture4', 
        'tula16' => 'note4', 
        'tula17' => 'picture5', 
        'tula18' => 'note5', 
        'tula19' => 'picture6', 
        'tula20' => 'note6', 
        'tula21' => 'subID', 
    ];

    public static $mapTable6 = [
        'tula_Key' => 'historyID', 
        'tula1' => 'deviceID', 
        'tula2' => 'historyID', 
        'tula3' => 'Line', 
        'tula4' => 'Lane', 
        'tula5' => 'time', 
        'tula6' => 'status', 
    ];

    public static $mapTable8 = [
        'tula_Key' => 'userID', 
        'tula1' => 'userCode', 
        'tula2' => 'level', 
        'tula3' => 'userName', 
        'tula4' => 'passWordHash', 
        'tula5' => 'fullName', 
        'tula6' => 'phoneNumber',
        'tula7' => 'email',
        'tula8' => 'avatar',
    ];

    public static $mapTable9 = [
        'tula_Key' => 'sessionID', 
        'tula1' => 'userID', 
        'tula2' => 'seriesID', 
        'tula3' => 'token', 
        'tula4' => 'timeExpires', 
    ];
    public static function  convertDataBase($Datas, $mapTable, $isConvert = true)
    {      
        $device = array();
        foreach($Datas as $data)
        {
            $newData = array();

            foreach($data->getoriginal() as $key=>$value)
            {
               if($isConvert)
               {
                    if(isset($mapTable["$key"]))
                    {
                        @$newData+=array($mapTable["$key"]=>$value);               
                    }
               }
               else
               {
                    @$newData+=array($key=>$value);  
               }
            }           
            $device[] = $newData;
        }
        return $device;
    }
}
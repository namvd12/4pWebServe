<?php
namespace App\Models;

class convertDb{
    
    // tula_table1,   // Device infor
    public static $mapTable1 = [
        'tula_Key' => 'deviceID', 
        'tula1' => 'deviceCode', 
        'tula2' => 'deviceName', 
        'tula3' => 'line', 
        'tula4' => 'lane', 
        'tula5' => 'status', 
        'tula6' => 'time', 
        'tula7' => 'pictureDevice', 
        'tula8' => 'note', 
        'tula9' => 'manager', 
        'tula10' => 'model', 
        'tula11' => 'serial', 
        'tula12' => 'topBot', 
    ];

    // tula_table2,   // Status device
    public static $mapTable2 = [
        'tula_Key' => 'historyID', 
        'tula1' => 'deviceKey', 
        'tula2' => 'deviceName', 
        'tula3' => 'line', 
        'tula4' => 'lane', 
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
    // tula_table3,   // Client table


    // tula_table4,   // Machine plan
    public static $mapTable4 = [
        'tula_Key' => 'maintenanceID', 
        'tula1' => 'deviceID', 
        'tula2' => 'cycles', 
        'tula3' => 'timeLates', 
        'tula4' => 'timeMaintenace', 
        'tula5' => 'timeRemaining', 
        'tula6' => 'item',
        'tula7' => 'status',
        'tula8' => 'note'
    ];

    // tula_table5,   // Sparepart plan
    public static $mapTable5 = [
        'tula_Key' => 'sparePartID', 
        'tula1' => 'deviceID', 
        'tula2' => 'spareCode', 
        'tula3' => 'spareName', 
        'tula4' => 'timeMaintenace', 
        'tula5' => 'timeRemaining', 
        'tula6' => 'numberItem',
        'tula7' => 'cycles',
        'tula8' => 'timeRemaining',
    ];
    
    // tula_table6,   // Status report
    public static $mapTable6 = [
        'tula_Key' => 'historyID', 
        'tula1' => 'deviceID', 
        'tula2' => 'historyID', 
        'tula3' => 'Line', 
        'tula4' => 'Lane', 
        'tula5' => 'time', 
        'tula6' => 'status', 
    ];

    // tula_table7,   // Setting system
    
    // tula_table8,   // User data
    public static $mapTable8 = [
        'tula_Key' => 'userKey', 
        'tula1'    => 'userID', 
        'tula2'    => 'position', 
        'tula3'    => 'userName', 
        'tula4'    => 'passWordHash', 
        'tula5'    => 'fullName', 
        'tula6'    => 'phone',
        'tula7'    => 'email',
        'tula8'    => 'avatar',
        'tula9'    => 'groupID',
        'tula10'   => 'topic'
    ];
    
    // tula_table9,   // Authen request 
    public static $mapTable9 = [
        'tula_Key' => 'sessionID', 
        'tula1' => 'userID', 
        'tula2' => 'seriesID', 
        'tula3' => 'token', 
        'tula4' => 'timeExpires', 
    ];
    
    // tula_table10,  // Group
    public static $mapTable10 = [
        'tula_Key' => 'groupID', 
        'tula1' => 'nameGroup', 
        'tula2' => 'decription', 
    ];

    // tula_table11,  // Permission 
    public static $mapTable11 = [
        'tula_Key' => 'permissionID', 
        'tula1' => 'NamePermission', 
        'tula2' => 'decription', 
    ];

    // tula_table12,  // Group_permission
    public static $mapTable12 = [
        'tula_Key' => 'GroupPermissionID', 
        'tula1' => 'groupID', 
        'tula2' => 'permissionID', 
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
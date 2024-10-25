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
        'tula13' => 'category', 
        'tula14' => 'mode', 
    ];

    // tula_table2,   // Status device
    public static $mapTable2 = [
        'tula_Key' => 'historyID', 
        'tula1'  => 'deviceKey', 
        'tula2'  => 'deviceName', 
        'tula3'  => 'line', 
        'tula4'  => 'lane', 
        'tula5'  => 'noTrouble', 
        'tula6'  => 'troubleName', 
        'tula7'  => 'time', 
        'tula8'  => 'status', 
        'tula9'  => 'issue_picture', 
        'tula10' => 'issue', 
        'tula11' => 'checking_picture1', 
        'tula12' => 'checking1', 
        'tula13' => 'checking_picture2', 
        'tula14' => 'checking2', 
        'tula15' => 'action_picture1', 
        'tula16' => 'action1', 
        'tula17' => 'action_picture2', 
        'tula18' => 'action2', 
        'tula19' => 'result_picture', 
        'tula20' => 'result', 
        'tula21' => 'subID', 
        'tula22' => 'userID',
        'tula23' => 'mode'
    ];
    // tula_table3,   // Client table
    public static $mapTable3 = [
        'tula_Key' => 'clientID', 
        'tula1' => 'deviceID', 
        'tula2' => 'deviceName', 
        'tula3' => 'clientAddr', 
        'tula4' => 'port', 
        'tula5' => 'status', 
        'tula6' => 'location_x',
        'tula7' => 'location_y',
        'tula8' => 'region'
    ];

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
        'tula1'    => 'deviceID', 
        'tula2'    => 'spareCode', 
        'tula3'    => 'spareName', 
        'tula4'    => 'serialNumber', 
        'tula5'    => 'timeMaintenace', 
        'tula6'    => 'numberItem',
        'tula7'    => 'cycles',
        'tula8'    => 'timeRemaining',
    ];
    
    // tula_table6,   // Status report
    public static $mapTable6 = [
        'tula_Key' => 'reportID', 
        'tula1' => 'deviceID', 
        'tula2' => 'historyID', 
        'tula3' => 'Line', 
        'tula4' => 'Lane', 
        'tula5' => 'time', 
        'tula6' => 'status', 
        'tula7' => 'modeSystem', 
    ];

    // tula_table7,   // Setting system
    public static $mapTable7 = [
        'tula_Key' => 'userKey', 
        'tula1'    => 'configNum', 
        'tula2'    => 'timeReportNG', 
        'tula3'    => 'folderSaveReport', 
        'tula4'    => 'lineWorking',
        'tula5'    => 'modeSystem',
    ];

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

    // tula_table13, // Categories
    public static $mapTable13 = [
        'tula_Key' => 'catID', 
        'tula1' => 'name', 
        'tula2' => 'action', 
        'tula3' => 'status', 
        'tula4' => 'description', 
    ];
    
    // tula_table14, // Categories
    public static $mapTable14 = [
        'tula_Key' => 'callID', 
        'tula1' => 'machineCode', 
        'tula2' => 'line', 
        'tula3' => 'lane', 
        'tula4' => 'position', 
        'tula5' => 'slot', 
        'tula6' => 'urgent', 
        'tula7' => 'status', 
        'tula8' => 'time', 
        'tula9' => 'userCall',
        'tula10' => 'note',
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
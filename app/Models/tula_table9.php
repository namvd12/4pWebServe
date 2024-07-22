<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tula_table9 extends Model
{
    use HasFactory;

    protected $table = 'tula_table9';
    public $timestamps = false;
    protected $guarded = [];  

    public static function updateNewToken($userID, $seriesID, $token)
    {
        date_default_timezone_set("Asia/Bangkok");
        $timeExpires = date_create('+10 minute')->format('Y-m-d H:i'); 

        $hashPass = password_hash($token, PASSWORD_DEFAULT);

        if(tula_table9::where('tula1',$userID)->count() == 0)
        {
            // create new
            $newRow = array("tula1"=>$userID,"tula2"=>$seriesID, "tula3"=>$hashPass,"tula4"=>$timeExpires );
            tula_table9::create($newRow);
        }
        else
        {   // update
            tula_table9::where('tula1',$userID)->update(["tula2"=>$seriesID, "tula3"=>$hashPass,"tula4"=>$timeExpires]);
        }
    }

    public static function verifyAuth($seriesID, $token)
    {
        /*search token where seriesID */
        $datas = tula_table9::select('tula3', 'tula4')->where('tula2',$seriesID)->get();
        $sessionInfor = convertDb::convertDataBase($datas, convertDb::$mapTable9, true); 
        if(count(($sessionInfor)) !=1)
        {
            return false;
        }
        $sessionInfor = $sessionInfor[0];
        /*compare time token  */
        date_default_timezone_set("Asia/Bangkok");
        $timeExpires = strtotime($sessionInfor['timeExpires']);
        $timeNow = strtotime(date("Y-m-d H:i"));
        if($timeExpires < $timeNow )
        {
            return false;
        }
        
        $tokenBin = hex2bin($token);
        /*verify token */
        $status = password_verify($tokenBin,$sessionInfor['token']);
        if($status)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
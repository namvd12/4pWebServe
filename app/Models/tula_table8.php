<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\convertDb;
class tula_table8 extends Model
{
    use HasFactory;
    protected $table = 'tula_table8';
    public $timestamps = false;
    
    public static function login($user ,$password)
    {
        $datas = tula_table8::where('tula3',$user)
                            ->orwhere('tula7',$user)
                            ->get();
        
        $userInfor = convertDb::convertDataBase($datas, convertDb::$mapTable8, true); 
        if(!count($userInfor))
        {
            return null;
        }
        $userInfor = $userInfor[0];
        $passWordHash = $userInfor['passWordHash'];
        $dirAvartar = $userInfor['avatar'];
        /*Validate password */
        if(password_verify($password, $passWordHash))
        {
            	/*read data avatar */
				$dataAvatar = "";
				if(file_exists("$dirAvartar"))
				{
					$myFile = fopen($dirAvartar, "r") or die("Unable to open file!");
					if(filesize($dirAvartar) > 0){
						$dataAvatar = fread($myFile, filesize($dirAvartar));
						fclose($myFile);
                        $userInfor['avatar'] = $dataAvatar;
					}
				}
                else
                {
                    $userInfor['avatar'] = "";
                }  
                $userInfor['passWordHash'] = "";
                return $userInfor;
        }
        else
        {
            return null;
        }
    }

    public static function edit($userName, $passwordNew, $oldPassword, $fullName, $phone, $email, $AvatarData)
    {
        $dataUpdate = array();
        if($fullName != '')
        {
            $dataUpdate['tula5'] = $fullName;
        }
        if($phone != '')
        {
            $dataUpdate['tula6'] = $phone;
        }
        if($email != '')
        {
            $dataUpdate['tula7'] = $email;
        }
        if($AvatarData != '')
        {
            // write file avatar
            $cur_dir = getcwd().'\..\storage\app\public';

            $avatar_dir = implode("",array($cur_dir,'/dataAvatar/',$userName,'.txt'));

            $myFile = fopen($avatar_dir, "w+") or die("Unable to open file!");
            fwrite($myFile, $AvatarData);
            fclose($myFile);
            
            $dataUpdate['tula8'] = $avatar_dir;
        }

        if($passwordNew != '' && $oldPassword != '')
        {
            // check old password
            $dataUser = tula_table8::login($userName, $oldPassword);
            if($dataUser == null)
            {
                return false;
            }
            $passwordHash = password_hash($passwordNew, PASSWORD_DEFAULT);
            $dataUpdate['tula4'] = $passwordHash;
        }
        tula_table8::where('tula3',$userName)->update( $dataUpdate);
      
        return true;
    }

    public static function findUserInfor($userOrEmail)
    {
        // search email on table 8: user
        $datas = tula_table8::where('tula3',$userOrEmail)
                    ->orwhere('tula7',$userOrEmail)
                    ->limit(1)
                    ->get();

        $userInfor = convertDb::convertDataBase($datas, convertDb::$mapTable8, true); 
        if(!count($userInfor))
        {
            return null;
        }
        $userInfor = $userInfor[0];
        
        return $userInfor;
    }

    public static function updateNewPassword($seriesID, $newPassword)
    {
        /*check user and userID is exits */
        $datas = tula_table9::select('tula1')->where('tula2',$seriesID)->get();
        $userID = convertDb::convertDataBase($datas, convertDb::$mapTable9, true); 
        if (count($datas) != 1) {
            return false;
        }
        /*check user and userID is exits */
        $datas = tula_table8::where('tula_key',$userID[0]['userID'])->get();
        $userInfor = convertDb::convertDataBase($datas, convertDb::$mapTable8, true); 
        if (count($userInfor) !=1) {
            return false;
        }
        $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        tula_table8::where('tula_key', $userInfor[0]["userID"])->update(['tula4' => $hashPassword]);
        return true;
    }
}
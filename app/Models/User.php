<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\convertDb;
use App\Models\Group_permission;
use App\Models\Permission;
class user extends Model
{
    use HasFactory;
    protected $table = 'tula_table8';
    public $timestamps = false;
    
    public static function login($user ,$password)
    {
        $datas = user::where('tula3',$user)
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

                /*get permisionID on groupID */
                $datas = Group_permission::select('tula2')->where('tula1',$userInfor['groupID'])->get();
                $listPermissionID = convertDb::convertDataBase($datas, convertDb::$mapTable12, true);
                $datas = Permission::select('tula1')->where(function($query) use($listPermissionID){
                    foreach($listPermissionID as $key=>$value)
                    {
                        $query->orwhere('tula_Key', $value);
                    }
                })->get();
                $listPermissionName = convertDb::convertDataBase($datas, convertDb::$mapTable11, true); 
                
                $permission= [];
                foreach($listPermissionName as $PermissionName)
                {
                   $permission[]= $PermissionName["NamePermission"];
                }
                $userInfor["permission"] = implode(", ", $permission);
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
            $dataUser = user::login($userName, $oldPassword);
            if($dataUser == null)
            {
                return false;
            }
            $passwordHash = password_hash($passwordNew, PASSWORD_DEFAULT);
            $dataUpdate['tula4'] = $passwordHash;
        }
        user::where('tula3',$userName)->update( $dataUpdate);
      
        return true;
    }

    public static function findUserInfor($userOrEmail)
    {
        // search email on table 8: user
        $datas = user::where('tula3',$userOrEmail)
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
        $datas = Authen::select('tula1')->where('tula2',$seriesID)->get();
        $userID = convertDb::convertDataBase($datas, convertDb::$mapTable9, true); 

        if (count($datas) != 1) {
            return false;
        }
        /*check user and userID is exits */
        $datas = user::where('tula1',$userID[0]['userID'])->get();
        $userInfor = convertDb::convertDataBase($datas, convertDb::$mapTable8, true); 
        if (count($userInfor) !=1) {
            return false;
        }
        $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        user::where('tula_key', $userInfor[0]["userKey"])->update(['tula4' => $hashPassword]);
        return true;
    }

    public static function findListEmail($position = [])
    {
        $datas = user::whereIn('tula2',$position)->get();
        $listEmail = convertDb::convertDataBase($datas, convertDb::$mapTable8, true); 
        if(!count($listEmail))
        {
            return null;
        }
        return $listEmail;
    }

    public static function getUserinforByID($ID)
    {
        $datas = user::where('tula1',$ID)->get();
        $userInfor = convertDb::convertDataBase($datas, convertDb::$mapTable8, true); 
        if(!count($userInfor))
        {
            return null;
        }
        return $userInfor;
    }

    public static function getUserinforByGroup($group)
    {
        $datas = user::where('tula2',$group)->get();
        $userInfor = convertDb::convertDataBase($datas, convertDb::$mapTable8, true); 
        return $userInfor;
    }
}
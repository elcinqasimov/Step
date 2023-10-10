<?php
///////////////////////////////////////
//                                   //
// Kriminalistik Tədqiqatlar İdarəsi //
//        mühəndis-proqramçı		 //
//          Elçin Qasımov		     //
//									 //
///////////////////////////////////////

///////////////////////////////////////
//        DEFINE Security            //
///////////////////////////////////////
 defined('SECURITY') or die('Error');
///////////////////////////////////////

class User {

	var $rand_key;

///////////////////////////////////////
//           Audentificaton          //
///////////////////////////////////////
		public function Audentificaton($username, $password){
		global $db;
		$say = $db->sorgu("SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'")->say();
		if($say >0){
			return true;
			$_SESSION["username"] = $username;
		}else{
			return false;
		}
		}
///////////////////////////////////////



		public static function Siyahi($status){
		global $db;
		global $admin;
		if($status == "*"){
			$siyahi = $db->sorgu("SELECT users.id as id,users.username as username, users.fullname as fullname, users.ipaddress as ipaddress, users.password as password, users.online as online FROM users inner join orqanlar orqan on orqan.id = users.orqanid WHERE users.id != 0 ORDER by users.online DESC;")->massiv_siyahi();
		}else{
			$siyahi = $db->sorgu("SELECT * FROM users WHERE group ='".$status."'  AND users.id != 0")->massiv_siyahi();
		}
			return $siyahi;
		}

		public static function Right($right){
		global $db;
		global $group;
			$say = $db->sorgu("SELECT * FROM `group` WHERE id ='".$group."' AND {$right} = '1'")->say();
			if($say > 0){
				return true;
			}else{
				return false;
			}
		}


///////////////////////////////////////
//              Info                 //
///////////////////////////////////////
	public static function Info($id,$massiv){
		global $db;
		$siyahi = $db->sorgu("SELECT * FROM users WHERE id = '".$id."'")->massiv_siyahi();
    if($siyahi){
      $return = 	$siyahi[0][$massiv];
    }else{
      $return = "";
    }
      return $return;
		}

    public static function OrqanInfo($id,$massiv){
		global $db;
		$siyahi = $db->sorgu("SELECT * FROM orqanlar WHERE id = '".$id."'")->massiv_siyahi();
    if($siyahi){
      $return = 	$siyahi[0][$massiv];
    }else{
      $return = "";
    }
      return $return;
		}

	public static function GroupInfo($id,$massiv){
			global $db;
			$siyahi = $db->sorgu("SELECT * FROM `group` WHERE id = '".$id."'")->massiv_siyahi();
		if($siyahi){
		  $return = 	$siyahi[0][$massiv];
		}else{
		  $return = "";
		}
		  return $return;
			}
///////////////////////////////////////

		function Login()
		    {
		        if(empty($_POST['username']))
		        {
		            return "Xanaları doldurun!";
		        }

		        if(empty($_POST['password']))
		        {
		            return "Xanaları doldurun!";
		        }

		        $username = trim($_POST['username']);
		        $password = trim($_POST['password']);

		        if(!$this->CheckLoginInDB($username,$password))
		        {
		            return false;
		        }

		        $_SESSION[$this->GetLoginSessionVar()] = $username;

		        return true;
		    }

	    function CheckLogin()
			    {


			         $sessionvar = $this->GetLoginSessionVar();

			         if(empty($_SESSION[$sessionvar]))
			         {
			            return false;
			         }
			         return true;
			    }

	    function LogOut()
    {


        $sessionvar = $this->GetLoginSessionVar();

        $_SESSION[$sessionvar]=NULL;

        unset($_SESSION[$sessionvar]);
    }

        function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }

        function GetLoginSessionVar()
    {
		echo $this->rand_key;
        $retvar = md5($this->rand_key);
        $retvar = 'usr_'.substr($retvar,0,10);
        return $retvar;
    }

    function CheckLoginInDB($username,$password)
    {

        $username = $this->SanitizeForSQL($username);
        $password = $this->SanitizeForSQL($password);
        $pwdmd5 = md5($password);
        global $db;
		$say = $db->sorgu("SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'")->say();

        if($say <= 0)
        {
            return false;
        }
        else
        {
        	$siyahi = $db->sorgu("SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'")->massiv_siyahi();
        	$_SESSION['fullname']  	= $siyahi[0]["fullname"];
        	$_SESSION['userid'] 	= $siyahi[0]["id"];
        }
        return true;
    }
        function SanitizeForSQL($str)
    {
        if( function_exists( "mysql_real_escape_string" ) )
        {
              $ret_str = mysql_real_escape_string( $str );
        }
        else
        {
              $ret_str = addslashes( $str );
        }
        return $ret_str;
    }

  }

?>

<?php
	class Model_Users{

		function __construct(){

		}

        function register($login, $password, $confirm_password){

			$result = ['status' => 'ok', 'login' => '', 'password' => '', 'confirm' => ''];

			if($password != $confirm_password){
				$result['status'] = 'not ok';
				$result['confirm'] = 'password mismatch';
			}

			if(!Model_Users::checkLength($login, 3, 20)){
				$result['status'] = 'not ok';
				$result['login'] = 'incorrect length';
			}

			if(!Model_Users::checkLength($password, 8, 20)){
				$result['status'] = 'not ok';
				$result['password'] = 'incorrect length';
			}

			if($result['status'] == 'ok'){
				$solt = uniqid();
				$password .= $solt;
				$password = crypt($password);
				$id = Core::$db->insert('users', array('login', 'password', 'solt', 'status'), array("'$login'", "'$password'", "'$solt'", "'1'"));
				if($id != 'error'){
					$jwt = Model_Users::generateJWT($id, 1);
					setcookie('JWT', $jwt);
				}
				else{
					$result['status'] = 'not ok';
					$result['password'] = 'A user with the same name already exist';
				}
			}

			return $result;
        }

        function login($login, $password){

			$result = ['status' => 'ok', 'login' => '', 'password' => '', 'confirm' => ''];

			$user = Core::$db->select('users', array("login = '$login'"));

			if(isset($user)){
				if(Model_Users::hash_equals($user[0]['password'], crypt($password.$user[0]['solt'], $user[0]['password']))){
					$jwt = Model_Users::generateJWT($user[0]['id'], 1);
					setcookie('JWT', $jwt);
				}
				else{
					$result['status'] = 'not ok';
					$result['password'] = 'Wrong password';
				}
			}
			else{
				$result['status'] = 'not ok';
				$result['login'] = 'User with this name does not exist';
			}
			
			return $result;
        }

		private static function checkLength($value = "", $min, $max) {
			$result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
			return !$result;
		}

		private static function generateJWT($id, $status) {
			$header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
			$payload = json_encode(['id' => $id, 'status' => $status]);

			$base64UrlHeader = base64_encode($header);
			$base64UrlPayload = base64_encode($payload);

			$signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, Core::$jwt_key, true);
			$base64UrlSignature = base64_encode($signature);

			return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
		}

		private static function hash_equals($str1, $str2)
	    {
	        if(strlen($str1) != strlen($str2))
	        {
	            return false;
	        }
	        else
	        {
	            $res = $str1 ^ $str2;
	            $ret = 0;
	            for($i = strlen($res) - 1; $i >= 0; $i--)
	            {
	                $ret |= ord($res[$i]);
	            }
	            return !$ret;
	        }
	    }
	}
?>

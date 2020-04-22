<?php
	class Controller_auth
	{
		function login(){
			$result = null;
            if(Core::$query->getInput('method') == 'login'){
				$model = Models::load('users');
				$result = $model->login(Core::$query->getInput('login'), Core::$query->getInput('password'));

				if($result['status'] == 'ok'){
					header("Location:".'/blog');
					exit();
				}
			}
			Views::show('authForm', array(
				'method' => 'login',
				'result' => $result,
				'values' => array('login' => Core::$query->getInput('login'), 'password' => Core::$query->getInput('password'))));
		}

        function register(){
			$result = null;
            if(Core::$query->getInput('method') == 'register'){
				$model = Models::load('users');

				$result = $model->register(Core::$query->getInput('login'), Core::$query->post('password'), Core::$query->getInput('confirm_password'));

				if($result['status'] == 'ok'){
					header("Location:".'/blog');
					exit();
				}
            }
			Views::show('authForm', array(
				'method' => 'register',
				'result' => $result,
				'values' => array('login' => Core::$query->getInput('login'), 'password' => Core::$query->getInput('password'))));
        }
	}
?>

<?php
	class Controller_auth
	{
		function login(){
            if(Core::$query->getMethod() == 'GET'){
    			Views::show('authForm', array('method' => 'login'));
            }
            else{
				$model = Models::load('users');
				$result = $model->login(Core::$query->post('login'), Core::$query->post('password'));

				if($result == 'ok')
					header("Location:".'/blog');
				else
					Views::show('authForm', array('method' => 'login', 'result' => $result, 'values' => array('login' => Core::$query->post('login'), 'password' => Core::$query->post('password'))));
            }
		}

        function register(){
            if(Core::$query->getMethod() == 'GET'){
    			Views::show('authForm', array('method' => 'register'));
            }
            else{
				$model = Models::load('users');

				$result = $model->register(Core::$query->post('login'), Core::$query->post('password'), Core::$query->post('confirm_password'));

				if($result['status'] == 'ok')
					header("Location: ".'/blog');
				else
					Views::show('authForm', array('method' => 'register', 'result' => $result, 'values' => array('login' => Core::$query->post('login'), 'password' => Core::$query->post('password'))));
            }
        }
	}
?>

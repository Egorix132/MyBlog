<?php
    Core::$user = (object)['status' => 0]; //unlogined
    if(isset($_COOKIE['JWT'])){
        $jwt = explode('.', $_COOKIE['JWT']);

        if(base64_encode(hash_hmac('sha256', $jwt[0].".".$jwt[1], Core::$jwt_key, true)) == $jwt[2]){
            Core::$user = json_decode(base64_decode($jwt[1]));
        }
    }
 ?>

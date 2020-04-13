<?php
    class Query{
        private $get;
        private $post;
        private $method;

        function __construct($get, $post, $method){
            $this->get = $get;
            $this->post = $post;
            $this->method = $method;
        }

        function get($name){
            if(isset($this->get[$name])) return $this->get[$name];
            else return null;
        }

        function post($name){
            if(isset($this->post[$name])) return $this->post[$name];
            else return null;
        }

        function getInput($name){
            if(isset($this->post[$name])) return $this->post[$name];
            if(isset($this->get[$name])) return $this->get[$name];
        }

        function getMethod(){
            return $this->method;
        }
    }
 ?>

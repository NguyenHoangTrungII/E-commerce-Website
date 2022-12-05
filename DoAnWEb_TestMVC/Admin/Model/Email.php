<?php
    class  Email{
        private static $email;


        // function __construct()
        // {
        //     $email =0;
        // }

        public static function set($email_sts){
            self::$email = $email_sts;
        }

        public static function get(){
            return self::$email;
        }

    }
?>
<?php
    class Phone{
        private static  $Phone;

        // function __construct()
        // {
        //     $Phone =0;
        // }

        public static function   set($Phone_sts){
            self::$Phone = $Phone_sts;
        }

        public static function  get(){
            return self::$Phone;
        }

    }
?>
<?php
    function connection(){
        try{
            $a = "mysql:host=localhost; dbname=unimedia_kamis_helpdesk";
            $key = new PDO($a,"root","");
            return $key;
        }catch(PDOExcption $e){

        }
    }
?>
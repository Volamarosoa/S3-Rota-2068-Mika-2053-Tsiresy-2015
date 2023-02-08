<?php 
    if ( ! function_exists('checkLogin')) {
        function checkLogin($mail, $pswd){
            if(valid_email($mail) && $pswd!=""){
                return true;
            }
            return false;
        }
    } 

    if ( ! function_exists('checkCompte')) {
        function checkCompte($tab){
            if($tab['count'] != 0){
                return true;
            }
            return false;
        }
    } 

    if ( ! function_exists('compteExist')) {
        function compteExist($id){
            if($id != 0){
                return true;
            }
            return false;
        }
    } 

    if ( ! function_exists('memePswd')) {
        function memePswd($psw1, $psw2){
            if($psw1 == $psw2){
                return true;
            }
            return false;
        }
    } 

?>
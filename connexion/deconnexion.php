<?php

function deconnexion(){
    session_start();
    session_destroy();
}
        
?>
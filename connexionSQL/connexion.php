<?php

function connectPostgress(){
        $user='root';
        $pass='';
        $dsn='mysql:host=localhost;dbname=agenceimmobiliere';
        $dbh=null;

        try {
        	$dbh = new PDO($dsn, $user, $pass);
        } catch (PDOException $e) {
        	print "Erreur ! : " . $e->getMessage();
        	die();
        }
        return $dbh;
}

?>
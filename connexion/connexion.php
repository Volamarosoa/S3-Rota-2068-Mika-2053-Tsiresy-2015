<?php
function connectPostgress(){
    $user='postgres';
    $pass='fanatenana';
    $dsn='pgsql:host=localhost;port=5432;dbname=agenceimmobiliere';
    $dbh=null;

    try {
        $dbh = new PDO($dsn, $user, $pass);
    } catch (PDOException $e) {
        print "Erreur ! : " . $e->getMessage();
        die();
    }
    return $dbh;
}
$bdd = connectPostgress();
        
?>
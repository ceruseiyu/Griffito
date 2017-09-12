<?php
    $dbserver = getenv('IP');
    $dbuser = getenv('C9_USER');
    $dbpass = '';
    $dbname = 'c9';
    $dbport = 3306;
    
    $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname, $dbport);
    if($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
?>
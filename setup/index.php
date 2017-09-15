<?php
require('../resource/password.php');

if (!file_exists('lock.txt')) {   
    require('../resource/setupform.php');
    if(isset($_POST['submit'])) {
        if(empty($_POST['password'])) {
            
        } else {
            require('../resource/db.php');
            
            $password = $_POST['password'];
            $password = stripslashes($password);
            $password = $db->escape_string($password);
            $salt = getSalt();
            $password = hashPass($password, $salt);
            /*$password = hash('sha256', $password);
            $password .= $salt;
            $password = hash('sha256', $password);*/
            
            $createTable = "CREATE TABLE Users(username VARCHAR(50) NOT NULL, password VARCHAR(64) NOT NULL, salt VARCHAR(8) NOT NULL, PRIMARY KEY(username));";
            $insertAdmin = "INSERT INTO Users VALUES('admin', '".$password."', '".$salt."');";
            
            if(mysqli_query($db, $createTable)){
                echo 'Database creation succeeded <br>';
                if(mysqli_query($db, $insertAdmin)){
                    echo 'Admin inserted';
                    $lockfile = fopen("lock.txt", "w");
                    fwrite($lockfile, 'lock');
                    fclose($lockfile);
                } else {
                    echo 'Failed to insert admin';
                }
            } else {
                echo 'Database Creation Failed';
            }
        }
    }
} else {
    echo 'Lock file detected, cannot set up';
}
?>
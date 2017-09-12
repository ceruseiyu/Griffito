<?php
if (!file_exists('lock.txt')) {   
    $lockfile = fopen("lock.txt", "w");
    fwrite($lockfile, 'lock');
    fclose($lockfile);
    require('../resource/db.php');
    $setupsql = 'CREATE TABLE Users(username VARCHAR(50) NOT NULL, password VARCHAR(64) NOT NULL, salt VARCHAR(8) NOT NULL, PRIMARY KEY(username));';
    $details = '';
    if(mysqli_query($db, $setupsql)){
        echo 'Database creation succeeded';
    } else {
        echo 'Command failed';
    }
} else {
    echo 'Lock file detected, cannot set up';
}
?>
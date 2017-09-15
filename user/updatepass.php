<?php
    require('../resource/password.php');
    $error_msg = "";
    
    if(isset($_POST['submit'])) {
        if(empty($_POST['oldpass'])) {
            
        } else {
            require('../resource/db.php');
            
            $passcheck = $_POST['oldpass'];
            $passcheck = stripslashes($passcheck);
            $passcheck = $db->escape_string($passcheck);
            
            $passwordsql = "SELECT salt, password FROM Users WHERE username='admin';";
            
            if($passdata = mysqli_query($db, $passwordsql)) {
                $passrow = $passdata->fetch_assoc();
                $passcheck = hashPass($passcheck, $passrow['salt']);
                if($passcheck === $passrow['password']) {
                    if($matchdata->num_rows == 1) {
                        if(!empty($_POST[''])) {
                            $newpass = $_POST['newpass'];
                            $newsalt = getSalt();
                            $newpass = hashPass($newpass, $salt);
                            $updatesql = "UPDATE Users SET password ='".$newpass."', salt='".$newsalt."' WHERE username='admin';";
                            if(mysqli_query($db, $updatesql)) {
                                header('Location: index.php');
                                die();
                            } else {
                                $error_msg = "Insertion failed";
                            }
                        }
                    } else {
                        $error_msg = "Incorrect password";
                    }
                } else {
                    $error_msg = "Query Failed";
                }
            } else {
                $error_msg = "Query failed";
            }
        }
    }
    echo $error_msg;
?>
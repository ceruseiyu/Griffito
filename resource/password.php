<?php
    function getSalt() {
        return bin2hex(openssl_random_pseudo_bytes(4));
    }
    
    function hashPass($password, $salt) {
        $hash = hash('sha256', $password);
        $hash .= $salt;
        $hash = hash('sha256', $password);
        return $hash;
    }
?>
<?php

function getHashedPass($password, $salt)
{
    $saltedPass = $password . $salt;
    return hash('sha256', $saltedPass);
}

?>

<?php
//deals with hashed pasword
function getHashedPass($password, $salt)
{
    $saltedPass = $password . $salt;
    return hash('sha256', $saltedPass);
}

?>

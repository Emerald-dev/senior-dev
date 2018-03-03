<?php
//returns the hashed value of a the password given the $password and $salt
function getHashedPass($password, $salt)
{
    $saltedPass = $password . $salt;
    return hash('sha256', $saltedPass);
}

?>

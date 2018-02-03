<?php

require_once('dbessential.php');

$user = $_POST['user'];
$getSaltedPass = "select password,salt from users where username = '$user'";
$result = performActionOnDB($getSaltedPass);

$userInfo = $result->fetch_assoc();
$userStoredPassHash = $userInfo['password'];
$userStoredSalt = $userInfo['salt'];

$enteredPassword = $_POST['pass'];
$saltedPass = $enteredPassword . $userStoredSalt;


$passhash = hash('sha256', $saltedPass);
if(strtolower($passhash) == strtolower($userStoredPassHash))
{
	setcookie("username", $user, time() + 1500, "/");
    header('Location: ' . "../../admin/cmsForm.php", true, 302);
    exit();
}
else
{
    header('Location: ' . "../../admin/login.php?success=failed", true, 302);
    exit();
}

?>

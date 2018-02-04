<?php

echo("<form action='../assets/php/auth_login.php' method='post'>");
echo("<input type='text' name='user' value=''> Username </br>");
echo("<input type='password' name='pass' value=''> password </br>");
echo("<input type='submit' value='submit'>");
$loginFailed = $_GET['success'] == 'failed';
if($loginFailed){
    echo('<div class="error">Your user name or password is incorrect. Please contact the site Administrator if you need to reset your password.</div>');
}

?>

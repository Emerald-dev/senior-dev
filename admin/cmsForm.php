<?php
// This is a query builder for the DB. anything the user might want to do, this should build
// the right db query to do it.
// NOTE: this is the flow of the file, it doesn't actually work yet. missing all human interaction code

require_once("../assets/php/auth_login_helper.php");
require_once("../assets/php/dbessential.php");
require_once("../assets/php/dbfetchInfo.php");
require_once("../assets/php/dbAPI.php");

$currentUser = $_COOKIE['username'];
echo($currentUser);
echo("</br>");
// redirect the user to login if they are not logged in
if($currentUser == "")
{
		 header('Location: ' . "login.php");
}

echo("<a href='../assets/php/logout.php'>click here to log out</a>");

echo("<form action='./decision.php' method='post'>");
echo("Select the item you would like to change: </br>");    
// allow them to edit users if they have permission to 

//$currentUser = "test";
$userData = getUser($currentUser);
if ($userData->num_rows > 0) {
    while($row = $userData->fetch_assoc()) {
        if($row["createPrivilege"] == 1){
            echo("<input type='radio' name='object' value='users' required> Users </br>");
        }
    }
}
echo("<input type='radio' name='object' value='content' required> Page Content </br>");
echo("<input type='radio' name='object' value='pins' required> Map Pins </br>");
echo("<br/>");
echo("<br/>");
echo("Select the action you would like to take: </br>");
echo("<input type='radio' name='action' value='create' required> Create </br>");
echo("<input type='radio' name='action' value='update' required> Update </br>");
echo("<input type='radio' name='action' value='delete' required> Delete </br>");
echo("<input type='submit' value='submit'>");
echo("</form>");
?>


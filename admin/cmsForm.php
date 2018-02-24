<?php
include 'header.php';
// This is a query builder for the DB. anything the user might want to do, this should build
// the right db query to do it.
// NOTE: this is the flow of the file, it doesn't actually work yet. missing all human interaction code

require_once("../assets/php/auth_login_helper.php");
require_once("../assets/php/dbessential.php");
require_once("../assets/php/dbfetchInfo.php");
require_once("../assets/php/dbAPI.php");

$currentUser = $_COOKIE['username'];
echo("</br>");

echo("<form action='./decision.php' method='post'>");
// select if u want to change a user, pin, or page
echo("<h3>Select the item you would like to change:</h3>");    
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
echo("<h3>Select the action you would like to take: </h3>");
// select if you want to perform a create, update, or delete
echo("<input type='radio' name='action' value='create' required> Create </br>");
echo("<input type='radio' name='action' value='update' required> Update </br>");
echo("<input type='radio' name='action' value='delete' required> Delete </br>");
echo("<br/>");
echo("<input type='submit' value='submit'>");
echo("</form>");
include 'footer.php';
?>


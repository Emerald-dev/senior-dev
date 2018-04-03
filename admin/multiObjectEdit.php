<?php
include 'header.php';
// requires
require_once("../assets/php/auth_login_helper.php");
require_once("../assets/php/dbessential.php");
require_once("../assets/php/dbfetchInfo.php");
require_once("../assets/php/dbAPI.php");
echo('<script src="../assets/js/contentEdit.js"></script>');
// start
$action = $_POST['action'];
$object = $_POST['object'];
$updatingPage = $_POST['updatingPage'];
$namefield = $_POST['namefield'];
echo("<input type='radio' name='action' value='$action' checked hidden>");
echo("<input type='radio' name='object' value='$object' checked hidden>");
echo("<input type='radio' name='updatingPage' value='$updatingPage' checked hidden>");
echo("<input type='radio' name='namefield' value='$namefield' checked hidden>");
$getContent = 'select id,dataType,text from content where page ="' . $updatingPage . '"';
$pageSections = performActionOnDB($getContent);

$submitAction = "";
$readonly = '';
// determine which action we want to take
if($action == "create")
{
    $submitAction  = "./multiObjectCreate.php";
    $readonly = 'readonly';
}
if($action == "update")
{
    $submitAction = "./multiObjectUpdate.php";
    
}
else if($action == "delete")
{
    $submitAction = "./multiObjectDelete.php";
}

$dataTypeList = array('Large_Title', 'Medium_Title', 'Small_Title', 'Link', 'Image', 'Paragraph');

// precursor to insert new content if creation is chosen before the current first peice of content
if($action == "create")
{
    echo("<form action='$submitAction' method='post' onsubmit='return validateForm(event)'>");
    echo("<input type='text' name='action' value='$action' hidden>");
    echo("<input type='text' name='object' value='$object' hidden>");
    echo("<input type='text' name='updatingPage' value='$updatingPage' hidden>");
    echo("<input type='text' name='namefield' value='$namefield' hidden>");
    echo("<input type='text' name='id_field' value='0' hidden>");
    echo("<select name='dataType' required>");
    foreach($dataTypeList as $dtype)
    {
        echo("<option value='$dtype'>$dtype</option>");
    }
    echo("</select><br />");
    echo("<textarea name='text_field' required></textarea><br />");
    echo("<input type='submit' value='Insert Here'></form>");
    echo("</br></br></br>");
}
// end

while($row = $pageSections->fetch_assoc())
{
    echo("<form action='$submitAction' method='post' onsubmit='return validateForm(event)'>");
    echo("<input type='text' name='action' value='$action' hidden>");
    echo("<input type='text' name='object' value='$object' hidden>");
    echo("<input type='text' name='updatingPage' value='$updatingPage' hidden>");
    echo("<input type='text' name='namefield' value='$namefield' hidden>");
    echo("<input type='text' name='id_field' value='{$row['id']}' hidden>");
    if($action == "create")
    {
        // if create show what is already there
        echo("<h3>{$row['dataType']}</h3>");
    }
    else
    {
        // if edit or delete, show what we can perform an action on
        echo("<select name='dataType' required>");
        foreach($dataTypeList as $dtype)
        {
            if($dtype == $row['dataType'])
            {
                echo("<option value='$dtype' selected>$dtype</option>");
            }
            else
            {
                echo("<option value='$dtype'>$dtype</option>");
            }
        }
        echo("</select>");
    }
    echo("</br><input type='text' name='text_field' value='{$row['text']}' $readonly required></br>");
    if($action == "create")
    {
        // show text box options to add more content
        echo("</br></br>");
        echo("<select name='dataType' required>");
        foreach($dataTypeList as $dtype)
        {
            echo("<option value='$dtype'>$dtype</option>");
        }
        echo("</select>");
		echo("<br /><textarea name='text_field' required></textarea><br />");
    }
    if($action == "create")
    {
        // put insert button to add content
        echo("<input type='submit' value='Insert Here'>");
    }
    else
    {
        // put edit or delete button for content
        echo("<input type='submit' value='$action'>");
    }
    echo("</form>");
    echo("</br></br>");
}
// cancel button
echo("<div class='button'><a href='./cmsForm.php'>Cancel</a></div>");
include 'footer.php';
?>

<?php
// requires
require_once("../assets/php/auth_login_helper.php");
require_once("../assets/php/dbessential.php");
require_once("../assets/php/dbfetchInfo.php");
require_once("../assets/php/dbAPI.php");
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

// precursor
if($action == "create")
{
    echo("<form action='$submitAction' method='post'>");
    echo("<input type='text' name='action' value='$action' hidden>");
    echo("<input type='text' name='object' value='$object' hidden>");
    echo("<input type='text' name='updatingPage' value='$updatingPage' hidden>");
    echo("<input type='text' name='namefield' value='$namefield' hidden>");
    echo("<input type='text' name='id_field' value='0' hidden>");
    echo("</br></br>");
    echo("<select name='dataType' required>");
    foreach($dataTypeList as $dtype)
    {
        echo("<option value='$dtype'>$dtype</option>");
    }
    echo("</select>");
    if($row['dataType'] == "Link" || $row['dataType'] == "Image")
    {
        echo("<input type='url' name='text_field' value=''></br>");
    }
    else
    {
        echo("<input type='text' name='text_field' value=''></br>");
    }
    echo("<input type='submit' value='insert here'>");
    echo("</br></br></br>");
}
// end

while($row = $pageSections->fetch_assoc())
{
    echo("<form action='$submitAction' method='post'>");
    echo("<input type='text' name='action' value='$action' hidden>");
    echo("<input type='text' name='object' value='$object' hidden>");
    echo("<input type='text' name='updatingPage' value='$updatingPage' hidden>");
    echo("<input type='text' name='namefield' value='$namefield' hidden>");
    echo("<input type='text' name='id_field' value='{$row['id']}' hidden>");

    if($action == "create")
    {
        echo("{$row['dataType']}");
    }
    else
    {
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

    if($row['dataType'] == "Link" || $row['dataType'] == "Image")
    {
        echo("<input type='url' name='text_field' value='{$row['text']}' $readonly></br>");
    }
    else
    {
        echo("<input type='text' name='text_field' value='{$row['text']}' $readonly></br>");
    }
    if($action == "create")
    {
        echo("</br></br>");
        echo("<select name='dataType' required>");
        foreach($dataTypeList as $dtype)
        {
            echo("<option value='$dtype'>$dtype</option>");
        }
        echo("</select>");

        if($row['dataType'] == "Link" || $row['dataType'] == "Image")
        {
            echo("<input type='url' name='text_field' value=''></br>");
        }
        else
        {
            echo("<input type='text' name='text_field' value=''></br>");
        }

    }
    if($action == "create")
    {
        echo("<input type='submit' value='insert here'>");
    }
    else
    {
        echo("<input type='submit' value='$action'>");
    }
    echo("</form>");
    echo("</br></br>");
}
echo("<a href='./cmsForm.php'>Done</a>");
?>

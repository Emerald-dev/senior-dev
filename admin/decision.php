<?php

// Based on the choices made on cmsForm.php, this file decides which next page to take you to. 
// it redirects to that page on load via the JS script at the bottom by submitting the form with the apropriate data

$object = $_POST['object'];
$action = $_POST['action'];
if($object == "content")
{
    echo("<form action='./multiObjectSelect.php' method='post'>");
    echo("<input type='text' name='action' value='$action' readonly  hidden></br>");
    echo("<input type='text' name='object' value='$object' readonly hidden></br>");
    echo("<input type='submit' value='Click here to continue'  hidden>");
    echo("</form>");
}
else
{
    if($action == "create")
    {
        echo("<form action='./singleObjectCreate.php' method='post' hidden>");
    }
    else if($action == "update")
    {
        echo("<form action='./singleObjectSelect.php' method='post'  hidden>");
    }
    else // delete
    {
        echo("<form action='./singleObjectDelete.php' method='post'  hidden>");
    }
    echo("<input type='text' name='action' value='$action' readonly  hidden></br>");
    echo("<input type='text' name='object' value='$object' readonly  hidden ></br>");
    echo("<input type='submit' value='Click here to continue'  hidden>");
    echo("</form>");
}
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    window.document.forms[0].submit();
  });
</script>

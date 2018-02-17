<?php
$object = $_POST['object'];
$action = $_POST['action'];
if($object == "content")
{
    echo("<form action='./multiObjectSelect.php' method='post'>");
    echo("<p>This is the menu to:</p>");
    echo("<input type='text' name='action' value='$action' readonly></br>");
    echo("<input type='text' name='object' value='$object' readonly></br>");
    echo("<input type='submit' value='Click here to continue'>");
    echo("</form>");
}
else
{
    if($action == "create")
    {
        echo("<form action='./singleObjectCreate.php' method='post'>");
    }
    else if($action == "update")
    {
        echo("<form action='./singleObjectSelect.php' method='post'>");
    }
    else // delete
    {
        echo("<form action='./singleObjectDelete.php' method='post'>");
    }
    echo("<p>This is the menu to:</p>");
    echo("<input type='text' name='action' value='$action' readonly></br>");
    echo("<input type='text' name='object' value='$object' readonly></br>");
    echo("<input type='submit' value='Click here to continue'>");
    echo("</form>");
}
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    window.document.forms[0].submit();
  });
</script>

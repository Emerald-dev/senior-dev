<?php

include("dbparams.php");

$sql = "SELECT * FROM content WHERE DataType = 'Image'";
 
 $result = mysql_query($sql);

    echo "<table>";
while ($row = mysql_fetch_assoc($result))
{
      $url =$row['Text'];
        
    echo "<tr>";
    echo "<td>"; ?> <img src="<?php echo $url; ?>"
    height=250 width=250  > <?php echo  "</td>";
    
    echo "</td>";
    echo "</tr>";
     "</table>";
  }

  
 ?>

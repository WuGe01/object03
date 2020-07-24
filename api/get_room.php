<?php
for ($i=0; $i < 20; $i++) { 
    echo "<div class='null'>";
    echo floor($i/5)+1;
    echo "排";
    echo $i%5+1;
    echo "<input type='checkbox' value='".$i."' name='num'  class='checkbox' onchange='chkTicket(this)'>";
    echo "號";
    echo "</div>";
}

?>

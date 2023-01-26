<?php

$start_date = $_POST['s_date'];
$end_date = $_POST['e_date'];

$day_count =  0;

while(0==0){
    $day_count++;
    echo "<div>";
    $From_date=date('Y-m-d',strtotime($From_date.'+1 days'));
    echo "</div>";

    if($day_count==10){
        break; 
    }

}

?>

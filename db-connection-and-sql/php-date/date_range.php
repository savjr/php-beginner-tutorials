    <?php

    if(isset($_POST['submit']))
                {
                    $fday = $_POST['date1'];
                    $lday = $_POST['date2'];
                    
                 if($fday<$lday){

                    $start    = (new DateTime($fday))->modify('first day of this month');
                    $end      = (new DateTime($lday))->modify('first day of next month');
                    $interval = DateInterval::createFromDateString('1 month');
                    $period   = new DatePeriod($start, $interval, $end);
                    
                    foreach ($period as $dt) {
                        echo $dt->format("Y-M-D");
                        echo "<br> First day of the month: ". date('Y-m-01', strtotime($dt->format("Y-m-d")));
                        echo "<br> Last day of the month: ". date('Y-m-t', strtotime($dt->format("Y-m-d")));
                        echo "<br>";
                        echo "<br>";
                        
                    }


                }else{


                
                $start    = (new DateTime($lday))->modify('first day of this month');
                $end      = (new DateTime($fday))->modify('first day of next month');
                $interval = DateInterval::createFromDateString('1 month');
                $period   = new DatePeriod($start, $interval, $end);
                
                foreach ($period as $dt) {
                    echo $dt->format("Y-M-D");
                    echo "<br> First day of the month: ". date('Y-m-01', strtotime($dt->format("Y-m-d")));
                    echo "<br> Last day of the month: ". date('Y-m-t', strtotime($dt->format("Y-m-d")));
                    echo "<br>";
                    echo "<br>";
                }
            
         }
  }

?>

<br>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>date calcutation</title>
</head>
<body>
    




<form action="" method="post">

Enter starting date <br>
<input type="date" name="date1" id="date1" placeholder="Enter date 1"><br><br>

Enter ending date<br>
<input type="date" name="date2" id="date2" placeholder="Enter date 2"><br><br>

<button type="submit" name="submit">submit</button>



</form>

</body>
</html>
<!DOCTYPE html>
<html>
    <head></head>
    <?php
function getDates($fyear, $lyear, $fmonth, $lmonth,$fday,$lday)
{
    $month = [];    //array for store months

    for ($x = $fyear;$x <= $lyear;$x++ )    //loop to assign years to array
    {
        if ($x == $fyear && $x == $lyear)   //check whether the year of selected dates are same
        {
            for ($y = $fmonth;$y <= $lmonth;$y++ )    //loop through months.In here first and last month has removed as selected dates in same year
            {
                $months = cal_days_in_month(CAL_GREGORIAN, $y, $x);     //function to get number of days in each month relavant to the each year
                $month[] = $months;     //assign days count to month array

                for ($z = 1;$z <= $months;$z++)       //loop for print number of days in each month
                {
                    if ($z == 1 || $z == $months )    //condition to print only first and last date of each month
                    {    
                        if(!(($z<=$fday && $y==$fmonth) || ($z>=$lday && $y==$lmonth))) //to prevent printing first and last date of selected dates
                        {
                            echo $x . "-";      //print year
                            echo $y . "-";      //print month
                            echo $z . "<br><br>";   //print day 
                        }
                               
                    }
                }
            }
        }
        elseif ($x == $lyear)     //check whether the year queals to second date year
        { 
            for ($y = 1;$y <= $lmonth;$y++ )  //loop through all months except selected month of the second date
            {
                $months = cal_days_in_month(CAL_GREGORIAN, $y, $x);
                $month[] = $months;

                for ($z = 1;$z <= $months;$z++)
                {
                    if ($z == 1 || $z == $months)
                    {
                        if(!($z>=$lday && $y==$lmonth)) //to prevent printing 
                        {
                            echo $x . "-";
                            echo $y . "-";
                            echo "$z<br><br>";
                        } 
                    }
                }
            }
        }
        elseif ($x == $fyear)   //check whether the year queals to first date year
        {  
            for ($y = $fmonth;$y <= 12;$y++ )     //loop through all months of the first year except selected month of the first date
            {
                $months = cal_days_in_month(CAL_GREGORIAN, $y, $x);
                $month[] = $months;

                for ($z = 1;$z <= $months;$z++)
                {
                    if ($z == 1 || $z == $months)
                    {
                        if(!($z<=$fday && $y==$fmonth))
                        {
                            echo $x . "-";
                            echo $y . "-";
                            echo "$z<br><br>";
                        }
                       
                    }
                }
            }
        }
        if ($x < $lyear && $x > $fyear)      //check whether the years between selected dates
        {  
            for ($y = 1;$y <= 12;$y++)       //loops through all months(12) of each year
            {
                $months = cal_days_in_month(CAL_GREGORIAN, $y, $x);
                $month[] = $months;

                for ($z = 1;$z <= $months;$z++)
                {
                    if ($z == 1 || $z == $months)
                    {
                        echo $x . "-";
                        echo $y . "-";
                        echo "$z<br><br>";
                    }
                }
            }
        }
    }
    return 0;
}

if (isset($_POST["submit"]))
{
    $fdate = $_POST["firstDate"];
    $ldate = $_POST["lastDate"];

    $fyear = substr($fdate, 0, 4);      //get the year of  selected first date
    $fmonth = substr($fdate, 5, 2);     //get the month of selected first date
    $fday=substr($fdate,8,2);
   
    $lyear = substr($ldate, 0, 4);      //get the year of selected last date
    $lmonth = substr($ldate, 5, 2);     //get the month of selected last date
    $lday=substr($ldate,8,2);
    getDates($fyear, $lyear, $fmonth, $lmonth,$fday,$lday);     //call to function
    //echo "<pre>".print_r($x,true)."<pre>";   
}
?>
   
    <body>
        <form action="" method="POST">
            <input type="date" name="firstDate" <?php if (isset($_POST["firstDate"])){ ?> value="<?php echo $fdate;} ?>" ><br><br>
            <input type="date" name="lastDate" <?php if (isset($_POST["lastDate"])){ ?> value="<?php echo $ldate;} ?>" ><br><br>
            <input type="submit" name="submit" value="Show Dates">
        </form>
    </body>
</html>

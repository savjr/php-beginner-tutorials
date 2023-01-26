<!-- this snippet returns all the dates between two given dates -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">

        <input type="date" name="s_date"><br/>
        <br>
        <input type="date" name="e_date"><br/>
        <br>
        <input type="submit" name="sumbit">

    </form>

    <?php
    $fdate=$edate="";
    $fdate=$_GET['s_date'];
    $edate=$_GET['e_date'];

    function createDateRangeArray($fdate, $edate) {
        // Modified by JJ Geewax
        
        $range = array();
        
        if (is_string($start) === true) $start = strtotime($start);
        if (is_string($end) === true ) $end = strtotime($end);
        
        if ($start > $end) return createDateRangeArray($end, $start);
        
        do {
        $range[] = date('Y-m-d', $start);
        $start = strtotime("+ 1 day", $start);
        }
        while($start < $end);
        
        return $range;
        } 

        createDateRangeArray($fdate, $edate);

    ?>

</body>
</html>
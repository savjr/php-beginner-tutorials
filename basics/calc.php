
<!-- This is a simple calculator using php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>

    <style>
        th, td,tr {
            font-size: 15px;
        }

        table, th, td {
        border: 1px solid black;
        }

        /* input {
          padding: 12px 20px;
          margin: 8px 0;
          box-sizing: border-box;
        } */

        th{
            color: blue;
        }



    </style>

</head>

<?php

// if(isset($_POST['plus'or'minus'or'div'or'mul'])){
    
// }

if(isset($_POST['plus'])){

   

    $num1 = $_POST['n1'];
    $num2 = $_POST['n2'];
    $ans = $num1 + $num2;

}
else if(isset($_POST['minus'])){

   

    $num1 = $_POST['n1'];
    $num2 = $_POST['n2'];
    $ans = $num1 - $num2;

}
else if(isset($_POST['div'])){

    

    $num1 = $_POST['n1'];
    $num2 = $_POST['n2'];
    if($num2==0){
        $ans = "Cannot Divide By Zero";
    }else{
     $ans = $num1 / $num2;
    }
    

}
else if(isset($_POST['mul'])){

    

    $num1 = $_POST['n1'];
    $num2 = $_POST['n2'];
    $ans = $num1 * $num2;

}





?>

<body>
<h1>Calculator</h1>
    <form action="" method="post" name="calForm" id="calForm">

        <table >
            <tr>
                <th>Number 1</th>
                    <td>:</td>
                <td>
                    <input type="number" name="n1" id="n1" placeholder="Number 1" 
                    
                    <?php
                        if(isset($_POST['n1']))
                        {
                            ?>
                            value="<?php echo ($num1); ?>"
                        <?php
                        }
                        ?>

                    />
                        
                        
                       
                </td>
            </tr>
            <tr>
                <th>Number 2</th>
                <td>:</td>
                <td><input type="number" name="n2" id="n2" placeholder="Number 2"
                <?php
                        if(isset($_POST['n2']))
                        {
                            ?>
                            value="<?php echo ($num2); ?>"
                        <?php
                        }
                ?>
                ></td>
            </tr>
            <tr>
                
                <th colspan=3>
                            <input type="submit" name="plus" id="plus" value="+"/>
                            <input type="submit" name="minus" id="minus" value="-"/>
                            <input type="submit" name="div" id="div" value="/"/>
                            <input type="submit" name="mul" id="mul" value="*"/>
                       
                    </th>
            </tr>
            <tr>
                <th>Answer</th>
                <td>:</td>
                <td><input type="text" name="ans" id="ans" placeholder="Answer" value="<?php echo $ans;?>" disabled></td>
            </tr>
        </table>

    </form>
    
</body>
</html>
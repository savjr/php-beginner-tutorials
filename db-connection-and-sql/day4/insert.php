


<?php

require_once("Database.php");
$db = new DBOperations();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
//string replace function EXTRAS
// $test = "Happy New Year";
// echo ($test."");

if(isset($_POST['save_but'])){

    //$prov=$_POST['pro_name'];
    $prov= $db->check_input( $_POST['pro_name']);
    $qry = "INSERT INTO province (p_name) VALUES ('$prov')";
    $db-> Exe_Qry($qry);

}

if(isset($_POST['save_dis_but']))
    {
        $spro_id=$_POST['pro_sel'];
        if ($pro_id == 0){
            echo ("<script> alert ('please select a province!');</script>");
        }
        else {
            $newName=$db->check_input($_POST['dis_name']);

            $qry ="INSERT INTO districts (p_id,d_name) VALUES ('$pro_id','$newName')"
            ;

            $db->Exe_Qry($qry);
        }
    

}






?>


<body>

<form action="" method="post" name="province_form" id="province_form">

<table border=1 width=200>
        <caption>Insert date into provinces</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <tr>
            <th>New</th>
            <th><input type="text" name="pro_name" >
             <!-- <?php
                        if(isset($_POST['pro_name']))
                        {
                            ?>
                            value="<?php echo ($prov); ?>"
                        <?php
                        }
                        ?> -->
            
                <input type="submit" name="save_but" value="submit">
            </th>
        </tr>
        <?php

            require_once("Database.php");
            $db = new DBOperations();
            $province  = $db->Exe_Qry("SELECT * FROM `province`;");

       while($row = $db -> Next_Record($province)){
        ?>   
         <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['p_name']); ?></td>
        </tr>
     
      <?php  
       }
       ?>
    </table>
    </form>

    <h1>District</h1>

    <!-- this component does not work -->

    <form action="" method="post" name="province_form" id="province_form">

<table border=1 width=200>
        <caption>Insert data into District</caption>
        <tr>
            <th>ID</th>
            <th>Province Name</th>
            <th>District Name</th>
        </tr>
        <tr>
            <td>New</td>
            
            <td>
                <select name="pro_sel" id="pro_sel">
                    <option value="0">--Select Province--</option>
                        <?php
                        require_once("Database.php");
                        $db = new DBOperations();
                        

                        $q= "SELECT * FROM province";
                        $provinces = $db-> Exec_Qry($q);
                        while($row = $db -> Next_Record($provinces)){
                            ?>   
                             
                             <option value="<?php echo($row['id']); ?>"><?php echo ($row['p_name'])?>
                            
                            </option>
                         <?php
                        }
                        ?>
                         
                </select>
                    
            </td>
            <td>
                <input type="sumbit" name="save_dis_but" value="save">
                
            </td>

        </tr>
        
    </table>


</form>   
    
</body>
</html>
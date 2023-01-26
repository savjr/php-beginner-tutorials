<!DOCTYPE html>
<html lang="en">
<?php
// database connection
require_once("Database.php");
$db = new DBOperations();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

// require_once("Database.php");
// $db = new DBOperations();
// display  keep value  
    if(isset($_POST['save_dis_but']))
    {
        $pro_id=$_POST['pro_sel'];
        if ($pro_id == 0){
            echo ("<script> alert ('please select a province!');</script>");
        }
        else {
            $newName=$db->check_input($_POST['dis_name']);

            $qry ="INSERT INTO district (p_id,d_name) VALUES ('$pro_id','$newName')"
            ;

            $db->Exe_Qry($qry);
        }
    

}
    ?>
<body>
<form action="" method="post">
    <table width ="200" border="1">
    <caption>districts</caption>
        <tr>
            <th>ID</th>
            <th>p_name</th>
            <th>d_name</th>
        </tr>
        <tr>
            <th>New</th>
             <th scope ="col">
                <select name="pro_sel" id="pro_sel">
                <option value ="0">~~select province~~</option>
                <?php

                $provinces =$db->Exe_Qry ("select * from province;");
                while ($row=$db->Next_Record ($provinces)){
                    ?>
                    <option value="<?php echo ($row['id']);?>"><?php echo ($row['p_name']);?>
                    </option>

                    <?php
                }
                ?>
                </select>
             </th>
             <th scope="col"><input type="text" name="dis_name" id="dis_name"/>
             <input type="submit" name="save_dis_but" id="save_dis_but">
            </th>  
         
        </tr>
    
    <table>
</body>
</html>
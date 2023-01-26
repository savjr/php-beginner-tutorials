


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

if (isset($_POST['P_Edit_But']))
    {
        $editID = $db->check_input($_POST['P_edit_id']);
        $newName = $db->check_input($_POST['P_edit_name']);
        $qry = "UPDATE provinces SET P_name='$newName' WHERE id = $editID;";
        $db->Exe_Qry($qry);
        
    }
    
    if (isset($_POST['P_Del_But']))
    {
        $editID = $db->check_input($_POST['P_edit_id']);
        $qry = "DELETE FROM provinces WHERE id = $editID;";
        $db->Exe_Qry($qry);
    }






?>


<body>



<table border=1 width=200>
        <caption>Insert date into provinces</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <tr>
            <th>New</th>
            <form action="" method="post" name="province_form" id="province_form">
            <th>

                <input type="text" name="pro_name" >

                <input type="submit" name="save_but" value="submit">
            </th>
            </form>

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

       


        
</body>
</html>

<!-- SDLASDKLASDNALSKDN -->

<form action="" method="post" name="pro_edit_form<?php echo($row['id']);?>" id="pro_edit_form<?php echo($row['id']);?>">
      
      <td>
          <input readonly type="text" value="<?php echo($row['id']);?>" name="P_edit_id" id="P_edit_id" />
      </td>
            
      <td>
          <input type="text" value="<?php echo($row['P_name']);?>" name="P_edit_name" id="P_edit_name" />
          <input type="submit" value="Edit" name="P_Edit_But" id="P_Edit_But" />
          <input type="submit" value="Delete" name="P_Del_But" id="P_Del_But" /> 
      </td>
            
            
        </form>

<!DOCTYPE html>
<html>
<h2>While</h2>
<head></head>
<?php
require_once("Database.php");
    $db=new DBOperations();

$testword = "Happy New Year";
echo ($testword."<br>");

$testword=str_replace("New","Old",$testword);
echo($testword."<br>");

    ?>
<body>
    <!--before load the form, we must get the value of the input field.So keep php part in betweeen head and body  -->
<!-- exit() gahuwot line ekakata pahalin, e line ekatae enakan witharai wadinne,
input field wla ' gahanna ba error eno.ekata input ekata ` ghanna puluwan. natnm-->

    <?php
if (isset($_POST['P_Edit_But']))
{
    $editID = $db->check_input($_POST['P_edit_id']);
    $newName = $db->check_input($_POST['P_edit_name']);
    $qry = "UPDATE district SET P_name='$newName' WHERE id = $editID;";
    $db->Exe_Qry($qry);
    
}

if (isset($_POST['P_Del_But']))
{
    $editID = $db->check_input($_POST['P_edit_id']);
    $qry = "DELETE FROM province WHERE id = $editID;";
    $db->Exe_Qry($qry);
}





if(isset($_POST['save_btn']))
{
    //$name = $_POST['pro_name'];  //get data from input fields with some problems like quatation,spaces,slashes.
    $name=$db->check_input($_POST['pro_name']);  //check_input() function called from database.php file.In here check above line problems

   $db->Exe_Qry("INSERT INTO province(p_name) values('$name')");
    
    // $qry="INSERT INTO province(p_name) values('$name')";
    // echo($qry);     //result --->  INSERT INTO province(p_name) values('yy')   .Exit function eka gahuwata passse mehema pennanwa.me comment karala thiyenne uda line ekama kotas walata kadala.meka wadagath.
    // exit();      
    // $db->Exe_Qry($qry); 

}
else
{
    $name="";
}
    ?>
<form action="" method="POST" name="province_form" id="province_form">
<table width="200" border="1" style="background-color: lightcyan;">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Province Name</th>
    </tr>
    <tr>
        <th scope="col">New</th>
        <th scope="col"><input type="text" name="pro_name" id="pro_name"  value="<?php echo $name;?>" /><input type="submit" name="save_btn" id="save_btn"></th>
    </tr>
    </thead>
    <tbody>
    <?php

  

    $province=$db->Exe_Qry("Select * from province;");

    while($row = $db->Next_Record($province))
    {
        ?>
        <tr>
        
        <!-- meke form ekak athule dala tyna nisa row ekn ekta aduragena update kanne eka nisa row ekn ekata update krddi awlk wenne na     -->
        <form action="" onSubmit="return confirmEdiDel();"method="post" name="pro_edit_form<?php echo($row['id']);?>" id="pro_edit_form<?php echo($row['id']);?>">
      
      <td>
          <input readonly type="text" value="<?php echo($row['id']);?>" name="P_edit_id" id="P_edit_id" />
      </td>
            
      <td>
          <input type="text" value="<?php echo($row['p_name']);?>" name="P_edit_name" id="P_edit_name" />
          <input type="submit" value="Edit" name="P_Edit_But" id="P_Edit_But" />
          <input type="submit" value="Delete" name="P_Del_But" id="P_Del_But" /> 
      </td>
            
            
    </form>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>



</form>



<script>
    function confirmEdiDel()
    {
        var conf = prompt("Type \"Y\" to Proceed", "N");
        if (conf == "Y" || conf == "y"){
            return true;
        }
        else {
            return false;
        }
    }
</script>
</body>
</html>
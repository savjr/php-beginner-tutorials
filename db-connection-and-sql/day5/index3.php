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
if(isset($_POST['save_btn']))
{
    //$name = $_POST['pro_name'];  //get data from input fields with some problems like quatation,spaces,slashes.
    $name=$db->check_input($_POST['pro_name']);  //check_input() function called from database.php file.In here check above line problems

   $db->Exe_Qry("INSERT INTO province(p_name) values('$name')");
    
    // $qry="INSERT INTO provinces(p_name) values('$name')";
    // echo($qry);     //result --->  INSERT INTO provinces(p_name) values('yy')   .Exit function eka gahuwata passse mehema pennanwa.me comment karala thiyenne uda line ekama kotas walata kadala.meka wadagath.
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

  

    $provinces=$db->Exe_Qry("Select * from province;");

    while($row = $db->Next_Record($provinces))
    {
        ?>
        <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['p_name']); ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>



</form>

<h2>Foreach</h2>

<table width="200" border="1" style="background-color: lightgreen;">
    <thead>
    <tr>
        <th>Id</th>
        <th>Province Name</th>
    </tr>
    </thead>
    <tbody>
<?php

    foreach($provinces as $province)
    {
        ?>
        <tr>
            <td><?php echo($province['id']); ?></td>
            <td><?php echo($province['p_name']); ?></td>
        </tr>
        <?php
    }

?>
 
</tbody>
</table>


<h2>Show district table data</h2>
<?php
if(isset($_POST['dist_save']))
{
    $pro_id=$_POST['pro_sel'];

    if($pro_id==0) //if user do not select a province from dropdown then it can be check by using a default select value within 0 value.If user do not selected it means, default value keep as it is.
    {
        echo "<script>alert('Please select a province.')</script>";
    }
    else

        $dist=$db->check_input($_POST['dist_name']); //dropdown wage ewata me input_check function  danna epa.
        $db->Exe_Qry("INSERT INTO districts(p_id,d_name) values('$pro_id','$dist')");
  
}
?>


<form action="" method="POST">
<table width="200" border="1" style="background-color: lightblue;">
    <thead>
    <tr>
        <th>Id</th>
        <th>District Name</th>
    </tr>
    <tr>
        <th>New</th>
        <th>
        <select name="pro_sel" id="pro_sel">
            <option value="0">``Select Province``</option>
            <?php

            $provinces=$db->Exe_Qry("SELECT * FROM province");
            while($row = $db->Next_Record($provinces))
            {
                ?>
                <option value="<?php echo($row['id']) ?>"><?php echo($row['p_name']) ?></option>
                <?php
            }
           
            ?>  
        </select>    
        <input type="text" name="dist_name" value=""><input type="submit" name="dist_save" value="Submit"></th>
    </tr>
    </thead>
    <tbody>
<?php

    $districts=$db->Exe_Qry("Select * from district;");
    foreach($districts as $district)
    {
        ?>
        <tr>
            <td><?php echo($district['id']); ?></td>
            <td><?php echo($district['d_name']); ?></td>
        </tr>
        <?php
    }
?> 
</tbody>
</table>
</form>




<h2>Merge data</h2>


<table width="200" border="1" style="background-color: lightpink;">
    <thead>
    <tr>
        <th>Id</th>
        <th>District Name</th>
        <th>Province Name</th>
    </tr>
    </thead>
    <tbody>
<?php

    $districts=$db->Exe_Qry("SELECT d.id,d.d_name,p.p_name from district as d, province as p where d.p_id=p.id;");
    foreach($districts as $district)
    {
        ?>
        <tr>
            <td><?php echo($district['id']); ?></td>
            <td><?php echo($district['d_name']); ?></td>
            <td><?php echo($district['p_name']); ?></td>
        </tr>
        <?php
    }
?> 
</tbody>
</table>

<h2>Join Query</h2>

<h2>Inner Join/Join(Common)</h2>


<table width="200" border="1" style="background-color: lightpink;">
    <thead>
    <tr>
        <th>Id</th>
        <th>District Name</th>
        <th>Province Name</th>
    </tr>
    </thead>
    <tbody>
<?php

    $districts=$db->Exe_Qry("SELECT district.id,district.d_name,province.p_name from district inner join province on district.p_id=province.id;");
   //where d.d_name NOT LIKE 'G%';");

   //where d.p_id IN (1,2);");

      //where d.p_id IN (SELECT id from provinces where acive=1);");
      // IN keyword accept one or multiple rows from query.But equal is accept only one row

      //where d.p_id IN (SELECT id from provinces where between 1 and 3);");

    foreach($districts as $district)
    {
        ?>
        <tr>
            <td><?php echo($district['id']); ?></td>
            <td><?php echo($district['d_name']); ?></td>
            <td><?php echo($district['p_name']); ?></td>
        </tr>
        <?php
    }
?> 
</tbody>
</table>

<h2>INNER JOIN</h2>


<table width="200" border="1" style="background-color: lightpink;">
    <thead>
    <tr>
        <th>Id</th>
        <th>District Name</th>
        <th>Province Name</th>
    </tr>
    </thead>
    <tbody>
<?php

    $districts=$db->Exe_Qry("SELECT district.id,district.d_name,province.p_name from district inner join province on district.p_id=province.id;");
    foreach($districts as $district)
    {
        ?>
        <tr>
            <td><?php echo($district['id']); ?></td>
            <td><?php echo($district['d_name']); ?></td>
            <td><?php echo($district['p_name']); ?></td>
        </tr>
        <?php
    }
?> 
</tbody>
</table>
</body>
</html>
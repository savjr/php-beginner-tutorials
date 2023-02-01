<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border=1 width=200>
        <caption>While loop</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
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

        
       
    <table border=1 width=200>
       <caption>For Each</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <?php

       require_once("Database.php");
       $db = new DBOperations();
       $province  = $db->Exe_Qry("SELECT * FROM `province`;");
       foreach($province as $row){
           ?>
         <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['p_name']); ?></td>
        </tr>
     
      <?php  
       }
       ?>
    </table>

    <!-- DIstrict table -->

    <table border=1 width=200>
        <caption> District Table</caption>
        <tr>
            <th>ID</th>
            <th>Province ID</th>
            <th>Name</th>
        </tr>
        <?php

       require_once("Database.php");
       $db = new DBOperations();
       $province  = $db->Exe_Qry("SELECT d.id,p.p_name,d.d_name from district AS d, province AS p where d.p_id = p.id;");
       while($row = $db -> Next_Record($province)){
           ?>
         <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['p_name']); ?></td>
            <td><?php echo($row['d_name']); ?></td>
        </tr>
     
      <?php  
       }
       ?>
    </table>   

    <!-- Join SQL table -->

    <table border=1 width=200>
        <caption> District Table using JOIN </caption>
        <tr>
            <th>ID</th>
            <th>Province ID</th>
            <th>Name</th>
        </tr>
        <?php

       require_once("Database.php");
       $db = new DBOperations();
       $province  = $db->Exe_Qry("
        SELECT d.id,p.p_name,d.d_name 
        from province AS p
        left join district AS d on d.p_id=p.id;");
       while($row = $db -> Next_Record($province)){
           ?>
         <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['p_name']); ?></td>
            <td><?php echo($row['d_name']); ?></td>
        </tr>
     
      <?php  
       }
       ?>
    </table>

      <!-- Privinces starts from G Join SQL table -->

      <table border=1 width=200>
        <caption> provinces starts from K </caption>
        <tr>
            <th>ID</th>
            <th>Province ID</th>
            <th>Name</th>
        </tr>
        <?php

       require_once("Database.php");
       $db = new DBOperations();
       $province  = $db->Exe_Qry("
        SELECT d.id,p.p_name,d.d_name 
        from province AS p
        left join district AS d on d.p_id=p.id
        where d.d_name LIKE 'K%';");
       while($row = $db -> Next_Record($province)){
           ?>
         <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['p_name']); ?></td>
            <td><?php echo($row['d_name']); ?></td>
        </tr>
     
      <?php  
       }
       ?>
    </table>



    <table border=1 width=200>
        <caption> provinces </caption>
        <tr>
            <th>ID</th>
            <th>Province ID</th>
            <th>Name</th>
        </tr>
        <?php

       require_once("Database.php");
       $db = new DBOperations();
       $province  = $db->Exe_Qry("
        SELECT d.id,p.p_name,d.d_name 
        from province AS p
        left join district AS d on d.p_id=p.id
        where d.p_id IN (1,2);");
       while($row = $db -> Next_Record($province)){
           ?>
         <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['p_name']); ?></td>
            <td><?php echo($row['d_name']); ?></td>
        </tr>
     
      <?php  
       }
       ?>
    </table>


    <!-- Querry inside Querry -->

    <table border=1 width=200>
        <caption> Querry inside a Querry </caption>
        <tr>
            <th>ID</th>
            <th>Province ID</th>
            <th>Name</th>
        </tr>
        <?php

       require_once("Database.php");
       $db = new DBOperations();
       $province  = $db->Exe_Qry("
        SELECT d.id,p.p_name,d.d_name 
        from province AS p
        left join district AS d on d.p_id=p.id
        where d.p_id IN (select id from province where active=1);");
       while($row = $db -> Next_Record($province)){
           ?>
         <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['p_name']); ?></td>
            <td><?php echo($row['d_name']); ?></td>
        </tr>
     
      <?php  
       }
       ?>
    </table>

    <!-- Slect from range -->

    <table border=1 width=200>
        <caption> Selecting between a range </caption>
        <tr>
            <th>ID</th>
            <th>Province ID</th>
            <th>Name</th>
        </tr>
        <?php

       require_once("Database.php");
       $db = new DBOperations();
       $province  = $db->Exe_Qry("
        SELECT d.id,p.p_name,d.d_name 
        from province AS p
        left join district AS d on d.p_id=p.id
        where p.id IN (select id from province where id between 1 and 3);");
        // where d.p_id IN (select id from province where id between 1 and 3);");
       while($row = $db -> Next_Record($province)){
           ?>
         <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['p_name']); ?></td>
            <td><?php echo($row['d_name']); ?></td>
        </tr>
     
      <?php  
       }
       ?>
    </table>

</body>
</html>


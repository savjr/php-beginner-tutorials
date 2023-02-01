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
</body>
</html>
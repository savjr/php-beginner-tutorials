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
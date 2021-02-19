<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .dip{width:600px;border: 1px solid black;margin: 0 auto;}
    .dip tr th,td{border: 1px solid black;padding:10px; text-align:center}
    
    </style>
</head>
<body>
    
    <?php
        include "config.php";
        include "database.php";
    ?>
    <?php
         $db = new Database();
         $query = "SELECT * FROM practic";
         $read = $db->select($query);

    ?>

    <?php
        if(isset($_GET['smg'])){
            echo "<span style = 'color: green'>".$_GET['smg']."</span>";
        }
    ?>

    <table class="dip" method="post">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Skill</th>
            <th>Action</th>
        </tr>
    <?php if($read){?>
    <?php while($row = $read->fetch_assoc()){?>
        <tr>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['skill']?></td>
            <td><a href="update.php?id=<?php echo urlencode($row['id']);?>">Edit</a></td>
        </tr>
    <?php } ?>
    <?php }else{?> 
        <span>Data is not available!!</span>
    <?php }?>       
    </table>

    <a href="create.php">Create</a>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .dip{margin: 0 auto}
    
    </style>
</head>
<body>
    
    <?php
        include "config.php";
        include "database.php";
    ?>
    <?php
        $id = $_GET['id'];
         $db = new Database();
         $query = "SELECT * FROM practic WHERE id = $id";
         $getData = $db->select($query)->fetch_assoc();



        if(isset($_POST['submit'])){
            $name = mysqli_real_escape_string($db->link, $_POST['name']);
            $email = mysqli_real_escape_string($db->link, $_POST['email']);
            $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
            if($name == ''|| $email == '' || $skill == ''){
                $error = "Failed! file must not be empty.";
            }else{
                $query = "UPDATE practic SET name='$name', email='$email', skill='$skill' WHERE id = $id";
                $update = $db->update($query);
            }
        }
    ?>

    <?php
       if(isset($_POST['delete'])){
           $query = "DELETE FROM practic WHERE id =$id";
           $deleteData = $db->delete($query);
       }
    ?>

    <?php
        if(isset($error)){
            echo "<span style = 'color:red'>".$error."</span>";
        }
    ?>

<form action="update.php?id=<?php echo $id ;?>" method="post">
    <table >
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $getData['name'] ;?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" value="<?php echo $getData['email'] ;?>"></td>
        </tr> 
        <tr>
            <td>Skill</td>
            <td><input type="text" name="skill" value="<?php echo $getData['skill'] ;?>"></td>
        </tr> 
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Update">
                <input type="reset" value="Cancel">
                <input type="submit" name="delete" value="Delete">
            </td>
        </tr>      
    </table>
</form>
    <a href="index.php">Go Back</a>
</body>
</html>
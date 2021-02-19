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
         $db = new Database();
        if(isset($_POST['submit'])){
            $name = mysqli_real_escape_string($db->link, $_POST['name']);
            $email = mysqli_real_escape_string($db->link, $_POST['email']);
            $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
            if($name == ''|| $email == '' || $skill == ''){
                $error = "Failed! file must not be empty.";
            }else{
                $query = "INSERT INTO practic(name, email, skill) values('$name','$email','$skill')";
                $create = $db->insert($query);
            }
        }
    ?>

    <?php
        if(isset($error)){
            echo "<span style = 'color:red'>".$error."</span>";
        }
    ?>

<form action="" method="post">
    <table >
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" placeholder="Input your name"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" placeholder="Input email adress"></td>
        </tr> 
        <tr>
            <td>Skill</td>
            <td><input type="text" name="skill" placeholder="Input your skill"></td>
        </tr> 
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Submit">
                <input type="reset" value="Cancel">
            </td>
        </tr>      
    </table>
</form>
    <a href="index.php">Go Back</a>
</body>
</html>
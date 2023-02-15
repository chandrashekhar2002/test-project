<?php
    $conn=mysqli_connect("localhost", "root", "", "users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counting Page</title>
    <style>
        body {
            background-color: #fff;
            height: 24vh;
        }

        form {
            background-color: #15172b;
            border-radius: 20px;
            box-sizing: border-box;
            height: 230px;
            padding: 20px;
            width: 320px;
            color: #fff;
        }

        .input {
            background-color: #303245;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            font-size: 18px;
            height: 100%;
            outline: 0;
            padding: 4px 20px 0;
            width: 100%;
            padding-left: 5px;
        }

        .submit {
            background-color: #08d;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            cursor: pointer;
            font-size: 18px;
            height: 50px;
            margin-top: 38px;
            text-align: center;
            width: 100%;
        }

        input[type="number"] {
                padding: 5px 6px;
                margin-left:15px; 
        }

        input[type="text"] {
                padding: 5px 6px;
                margin-left:3px; 
        }

        .submit:active {
        background-color: #06b;
        }

        table, th, td {
            border: 1px solid;
            padding: 5px;
        }
     

        .container
        {
            display:block;
         
        }
    
    </style>
</head>
<body>
    <form method="post">
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter your name">
        <br><br>
        <label>Age</label>
        <input type="number" name="age" placeholder="Enter your Age">
        <br><br>
        <input type="submit" name="submit" value="Submit" class="submit">
</form>

<div class="container">
<h3> User List</h3>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Char. Count</th>
        <th>Word Count</th>
</tr>
<?php
    $i=1;
    $sql="SELECT * from info";
    $run=mysqli_query($conn,$sql);
    if($run->num_rows>0)
    {
        while($row=$run->fetch_assoc()){
            $id=$row['u_id'];

    ?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['u_name'] ?></td>
        <td><?php echo $row['u_age'] ?></td>
        <td><?php echo $row['count_char'] ?></td>
        <td><?php echo $row['count_word'] ?><td>
    </tr>
    <?php }} ?>

</table>
</div>
</body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $age=$_POST['age'];
        $word=str_word_count($name);
        $char=strlen($name)-$word+1;
        
        $sql="INSERT INTO info VALUES(null,'$name','$age','$char','$word')";
        if(mysqli_query($conn,$sql))
        {
            echo'<script> alert("User registered Successfully");</script>';
            header('Location:index.php');
        }
        else
        {
            echo mysqli_error($conn);

        }
        
    }

?>

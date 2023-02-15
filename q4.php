<?php
    $conn=mysqli_connect("localhost", "root", "", "sale");
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
            background-color: red;
            height: 24vh;
        }

        tr,td,th{
             border-collapse: separate;
             text-indent: initial;
             border-spacing: 0px;
             padding: 4px 10px;
             border:2px solid;
        }

        form {
            background-color: #15172b;
            border-radius: 20px;
            box-sizing: border-box;
            height: 290px;
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
                margin-left:3px; 
                margin-top:5px;
                width:80%;
        }

        input[type="text"] {
                padding: 5px 6px;
                margin-left:3px; 
                margin-top:5px;
                width:80%;
        }

        .submit:active {
        background-color: #06b;
        }
  

        .container
        {
            display:block;
         
        }
    
    </style>
</head>
<body>
    <form method="post">
        <label>Sale Day</label><br>
        <input type="text" name="name" placeholder="Enter the day">
        <br><br>
        <label>Total Sale Amount</label><br>
        <input type="number" name="amount" placeholder="Enter the total sale amount">
        <br><br>
        <input type="submit" name="submit" value="Submit" class="submit">
</form>

<div class="container">
<h2> Sale Details</h2>
<table>
    <tr>
        <th>Sno.</th>
        <th>Date</th>
        <th>Total Sale Amount</th>
    </tr>
<?php
    $i=1;
    $sql="SELECT * from info";
    $run=mysqli_query($conn,$sql);
    if($run->num_rows>0)
    {
        while($row=$run->fetch_assoc()){
            $id=$row['id'];

    ?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['date']?></td>
        <td><?php echo $row['total_sale'] ?></td>
    </tr>
    <?php }} ?>

</table>
</div>
</body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        $i=$id-1;
        $name=$_POST['name'];
        $amt=$_POST['amount'];
        $date=date("Y-m-d h:i:sa");
        $sql="INSERT INTO info VALUES(null,'$date','$amt')";
        if(mysqli_query($conn,$sql))
        {
            echo'<script> alert("Days Updated Successfully");</script>';
            header('Location:q4.php');
        }
        else
        {
            echo mysqli_error($conn);

        }
        
    }

?>

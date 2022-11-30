<?php
ob_start();
include "connection.php";
if(isset($_POST['submit']))
{
    $client = $_POST['client'];
    header("Location: add.php?client=".$client);
}
else if(isset($_POST['update'])){
    $client = $_POST['client'];
    header("Location: update.php?client=".$client);
}
else if(isset($_POST['addt']))
{
    $tablename = $_POST['addta'];
     $sql = "CREATE TABLE `$tablename`(`id` INT NOT NULL AUTO_INCREMENT , `date` VARCHAR(100) NULL DEFAULT NULL , `fcat` VARCHAR(100) NULL DEFAULT NULL , `client` VARCHAR(100) NULL DEFAULT NULL , `campaign` VARCHAR(100) NULL DEFAULT NULL , `dim` VARCHAR(100) NULL DEFAULT NULL ,`animation` longtext NULL DEFAULT NULL , `click` VARCHAR(500) NULL DEFAULT NULL , `impression` VARCHAR(500) NULL DEFAULT NULL , PRIMARY KEY (`id`),`Select Assets` VARCHAR(100) NULL DEFAULT NULL)";
     if ($conn->query($sql) === TRUE) {
      echo "Table created successfully";
    } else {
      echo "Error creating table: " .$conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
</head>  
<style>
    body{
        font-family: 'Times New Roman', Times, serif;
        user-select: none;
        margin-left:1%;
    }
    .table1,th,td{
       width: auto; 
       border: 1px solid black;
       padding: 10px;
       text-align: center;
       border-collapse: collapse; 
    }
    .table2{
        /* border: none; */
        
    }
    input{
        outline: none;
        border: 0px;
        text-align: center;
        background-color: white;
    }
    select,option{
        width:10%;
        text-align:center;
        height:4%;
        border:1px solid gray;
        border-radius:10px;
        font-size:18px;
        -webkit-appearance:none;
        outline:none;  

    }
</style>    
<body>
    <h2>Add/Update Data</h2>
    <form id="formId" method="post" >

    <select name="client">
        <option value ="">Select Client</option>
            <?php
                $sql = "show tables";
                $result = mysqli_query($conn, $sql);
                while($table = mysqli_fetch_array($result))
                { 
                echo '<option value ='.($table[0]).'>'.($table[0]).'</option>';
                }
            ?>
        </select> 

        <button name="submit" type="submit" style="border:1px solid black;font-size:15px;">Add Data</button>
        <button name="update" type="submit" style="border:1px solid black;font-size:15px;">Update</button><br><br><br>
        <input name="addta" type="text" placeholder="Enter Table Name" style="border:1px solid black;font-size:15px;"><br><br>  
        <button name="addt" type="submit" style="border:1px solid black;font-size:15px;">Add table</button><br><br>   
    </form> 
</body>
</html> 

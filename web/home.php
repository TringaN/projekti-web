<!DOCTYPE html>

<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Home page</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <h1 id="main_title">CRUD APPLICATION IN PHP</h1>
    <div class="container">
        <?php include("header.php"); ?>
        <?php include("dbconn.php"); ?>
        <h2>ALL STUDENTS</h2>
    <table class = "table table-hover table-bordered table-striped">
        <thead>
            <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <!-- 
            $query = "select * from 'users'";
            
            $result = mysqli_query($connection , $query);

            if(!$result){
                die("query Failed" .mysqli_error());
            }
            else{
                while($row = mysqli_fetch_assoc($result)){
                    <h4>Hello</h4>
                    
                }
            }
         -->
            <tr>
                <td><?php echo $row['id']; ?> </td>
                <td><?php echo $row['Emri']; ?></td>
                <td><?php echo $row['Mbiemri']; ?> </td>
                <td><?php echo $row ['Email']; ?></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Rohit</td>
                <td>Singh</td>
                <td>26</td>
            </tr>
        </tbody>
    </table>
<?php include("footer.php"); ?>
    

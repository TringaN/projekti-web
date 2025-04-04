<?php
$firstName = $_POST['firstName'];
$password = $_POST['hide'];

$conn = new mysqli('localhost' , 'root','' , 'projekti');
if($conn){
    echo "Connected";
}else{
   echo "Failed";
}
$username=$_POST['username'];
$password=$_POST['password'];

$data = "INSERT INTO login VALUES('', '$username','$password')";
$check = mysqli_query($conn,$data);
if($check){
    echo "Data sended";
}
else{
    echo "Data not send";
    
}
?>
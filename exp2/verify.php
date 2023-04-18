<?php
session_start();
$servername="localhost";
$username="chandana";
$password="root";
$dbname="data";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if (!$conn){
die("connection failed".mysqli_connect.error());
}
else{
$un=$_POST["uname"];
$eid=$_POST["eid"];
$sql="SELECT * from formdata where NAME ='$un' and EMAIL='$eid'";
$res=mysqli_query($conn,$sql);
if (mysqli_num_rows($res)>=1)
{
$_SESSION["username"]=$_POST["uname"];
$_SESSION["email"]=$_POST["eid"];
header("location:new.php");
}
else{
header("location:login.php");
}
}
mysqli_close($conn);
?>
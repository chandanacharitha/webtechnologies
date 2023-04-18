
<!DOCTYPE HTML>
<html>
    <head>
        <style>
            body{
                background-image:url("https://tse1.mm.bing.net/th?id=OIP.6kd9ryR7zIEHe5_gIdD2pgHaHa&pid=Api&P=0");
                background-repeat:no-repeat;
                background-size:1000px 800px;
            }
            .one{
                padding:200px;
            }
           
        </style>
    </head>

<div class="one"><center>
    <body>
<form method="post" enctype="multipart/form-data" >
<center><input type="hidden" value="1000000" name="MAX_FILE_SIZE">
<input type="file" name="uploadedfile"><br><br>
<input type="submit" id="submit" value="Upload" name="submit" style="margin-top:10px;height:35px;width:75px;border='1'">
</center></form>
<?php
session_start();
if(isset($_POST['submit'])){
$target_dir="image/";
$target_path=$target_dir.basename($_FILES['uploadedfile']['name']);
if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path)){
$conn=mysqli_connect("localhost","chandana","root","data");
if (!$conn){
echo "couldn't connect";
}
else{
    echo "<br>";
echo "<h3>POSTED SUCCESSFULLY</h3>";
$name=$_SESSION["username"];
$sql="INSERT INTO upload values('$name','$target_path')";
if (mysqli_query($conn,$sql)==TRUE){
echo "<br><br>";
}
else{
echo "Error:";
}

mysqli_close($conn);
}
}
else{
    echo"<br>";
    echo "<h3><b>no file is selected</b></h3>";
}

}
?>
</body>
</center></div>

</html>





 
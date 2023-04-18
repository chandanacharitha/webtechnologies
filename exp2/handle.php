<!DOCTYPE HTML>  

<html>
<head>
<style>
body{
background-image:url("https://tse4.mm.bing.net/th?id=OIP.LUKkyFJZ8laqcTnHEkSxqgHaEK&pid=Api&P=0");
background-repeat:no-repeat;
background-size:200px 200px;
margin-top:5px;
font-size:25px;
}
button{
    background-color:lightblue;
}
button:hover{
background-color:beige;
}
td:hover{
    background-color:coral;
}
</style>
</head>
<body>  
<center>
<?php
$servername="localhost";
$username='chandana';
$password='root';
$dbname='data';
$conn=mysqli_connect($servername,$username,$password,$dbname);
if (!$conn){
die("connection failed".mysqli_connect.error());
}
$name=mysqli_real_escape_string($conn,$_POST["name"]);
$email=mysqli_real_escape_string($conn,$_POST["email"]);
$gender=mysqli_real_escape_string($conn,$_POST["gender"]);
$phone=mysqli_real_escape_string($conn,$_POST["phone"]);
$sql="INSERT INTO formdata VALUES('$name','$email','$phone','$gender')";
if (mysqli_query($conn,$sql)){
echo "<h3>your details</h3>";
}
else{
echo "error".mysqli_error($conn);
}
mysqli_close($conn);
?>

  <?php


        $nameErr = $emailErr = $genderErr =$phoneErr="";

        $name = $email = $gender = $phone = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {

            $nameErr = "Please enter a valid name";

        } else {

            $name = test_input($_POST["name"]);
            
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {

            $nameErr = "Only letters and white space allowed";

            }

        }

        if (empty($_POST["email"])) {

            $emailErr = "valid Email address";

        } else {

            $email = test_input($_POST["email"]);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $emailErr = "The email address is incorrect";

            }

        }  


        if (empty($_POST["phone"])) {

            $phoneErr = "This can't be empty ";

        } else {

            $phone = test_input($_POST["phone"]);

        }        

        if (empty($_POST["gender"])) {

            $genderErr = "Please select a gender";

        } else {

            $gender = test_input($_POST["gender"]);

        }

        }

        function test_input($x) {

        $x = trim($x);

        $x = stripslashes($x);

        $x = htmlspecialchars($x);

        return $x;

        }

    ?>


      <table border="1";>
	<tr>
		<th>COLUMN NAME</th>
		<th>YOUR DETAILS</th>
	</tr>
	<tr>
	<td>YOUR NAME:</td>
	<td><?php echo $name;?></td>
	</tr>
	
	<tr>
	<td>YOUR EMAIL:</td>
	<td><?php echo $email;?></td>
	</tr>

	<tr>
	<td>YOUR PHONE:</td>
	<td><?php echo $phone;?></td>
	</tr>

	<tr>
	<td>GENDER:</td>
	<td><?php echo $gender;?></td>
	</tr>
<br><br>
<br><br>
</table>
<br><br>
<button onclick="history.go(-1)">BACK</button><br><br>
<form action="login.php" method="post" target="ll">
    <input type="submit" value="login">
    </form>
    </center>
</body>

</html>
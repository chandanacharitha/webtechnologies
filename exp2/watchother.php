
<style>
body{
    background-color:#ddadaf;
    font-weight:bold;
    padding: 5px;
}
textarea{
    height:25px;
}
button{
    width:15%;
}
</style>
<div class="t">
<?php
session_start();
$pat="";
$n="";
$con = mysqli_connect("localhost","chandana","root","data");
$id=$_SESSION['username'];
$qr="select path from upload where name not in ('$id');";
$res=mysqli_query($con,$qr);

if(mysqli_num_rows($res)>=1)
{

while($row=mysqli_fetch_assoc($res))
{
    echo '<div style="float:left;width:40%;height:65%;border:2px solid black;margin-right:20px;margin-left:20px;margin-bottom:15px;">';
$pat=$row['path'];
$we="select name as c from upload where path in ('$pat');";
$z=mysqli_query($con,$we);
while($row=mysqli_fetch_assoc($z)){
$name=$row['c'];
echo $row['c'].' posted';
break;
}
echo "<div align='center' style='background-color:#ddadaf'><img  src='$pat' style='height:150; width:150; align:center;border:3px solid royalblue'></img>";
echo '<form method="post" >';
echo  '<input type="hidden" name="path" value="'.$pat.'"><br>';
echo '<button type="submit" name="like_d" style="background-color:pink;color:red">like</button>&nbsp';
echo '<span class="likes">'.count_likes($pat).'</span><br>';
echo '</form><br>';
//veiw all comments
echo 'COMMENTS<br><br>';
$rt="select name,comment from comments where path='$pat';";
$resu=mysqli_query($con,$rt);
if(mysqli_num_rows($resu)>=1)
{
while($row=mysqli_fetch_assoc($resu))
{
echo "<strong>".($row['name'])."</strong>".'  commented  '.($row['comment']).'<br><br>';
}

}

echo '<form method="post" >';
echo  '<input type="hidden" name="path" value="'.$pat.'">';
echo  "<input type='textarea' name='comment' placeholder='enter your comment'><br><br>";
echo  '<button type="submit" name="comments" style="background-color:lightblue" >post</button>';
echo '</form>';
echo '</div>';
echo'</div>';
}

}
echo "</html>";
//likes
if (isset($_POST['like_d'])){
$pid=$_POST['path'];

$qy=mysqli_query($con,"select * from like_s where name='$id' and path='$pid';");
if(mysqli_num_rows($qy)==0){
mysqli_query($con,"insert into like_s values('$id','$pid');");
}
}


//comments 
if(isset($_POST['comments'])){
global $con;
$pid=$_POST['path'];
$com=$_POST['comment'];
if($com!=""){
$qu="insert into comments values ('$id','$pid','$com');";
mysqli_query($con,$qu);
}
}

//counting likes
function count_likes($hj){
global $con;
$res=mysqli_query($con,"select count(*) as nums from like_s where path='$hj';");

while($data=mysqli_fetch_assoc($res)){
return $data['nums'];
}
}

mysqli_close($con);

?>
</div>

<?php
$con = mysqli_connect("localhost","chandana","root","data");
$q="select path,count(*) as high from like_s group by path order by high  desc limit 4;";
$res=mysqli_query($con,$q);

echo "<center>";
if(mysqli_num_rows($res)>=1)
{
while($row=mysqli_fetch_assoc($res))
{
    echo '<div style="float:left;width:40%;height:45%;border:1px solid black;margin-right:20px;margin-left:20px;margin-bottom:15px;">';
$pat=$row['path'];
$we="select name as c from upload where path in ('$pat');";
$z=mysqli_query($con,$we);
while($row=mysqli_fetch_assoc($z)){
echo '<p style="font-size:20px;color:#155363" align="center"> '.$row['c'].' posted</p>';
break;
}
echo "<div align='center' style='background-color:#ffcba4'><img  src='$pat' height='150'  width='150' border='3px solid black'><br>";
echo '<form method="post" >';
echo  '<input type="hidden" name="path" value="'.$pat.'">';
echo '<button type="submit" name="like_but" style="background-color:pink;color:red">like</button>&nbsp';
echo '<span class="likes">'.count_likes($pat).'</span>';
echo "</div>";
echo 'COMMENTS<br>';

$rt="select name,comment from comments where path='$pat';";
$resu=mysqli_query($con,$rt);
if(mysqli_num_rows($resu)>=1)
{
while($row=mysqli_fetch_assoc($resu))
{
echo "<strong>".($row['name'])."</strong>".'  commented  '.($row['comment']).'<br>';
}

}
echo '</div>';
}
}
function count_likes($hj){
global $con;
$res=mysqli_query($con,"select count(*) as num from like_s where path='$hj';");

while($data=mysqli_fetch_assoc($res)){

return $data['num'];
}
}
echo "</center>";
mysqli_close($con);

?>
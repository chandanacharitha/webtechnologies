<?php
session_start();
?>
<html>
<head>
<style>
    .sidebar{
        position:fixed;
        left:0;
        width:220px;
        height:100%;
    }
    .sidebar header{
        font-size:22px;
        color:#8b4513;
        text-align:center;
        line-height:70px;
        user-select:none;

    }
    .sidebar ul a{
        
        height:100%;
        width:50%;
        line-height:65px;
        font-weight:bold;
        font-size:20px;
        color:#8b4513;
        padding-left:40px;
        box-sizing:border-box;
        border-top:1px solid rgba(255,255,255,.1);
        border-bottom:1px solid brown;
        transition:.4s;
    }
  
    .il{
        width:50px;
        height:50px;
    }

.container {
  background-color:#FFCCFF;
  width: 100%;
  height: 100vh;
}

.toppane {
  width: 100%;
  height: 100px;
  background-color:#9999FF;
}

.leftpane {
  width: 30%;
  height: 100vh;
  background-color:lightblue;
}
#receiver{
width: 100%;
height: 100vh;
  
}

.middlepane {
  width: 90%;
  height: 100%;
}

.rightpane {
  padding:50px;
  width: 10%;
  height: 100vh;
  background-color:#99CCCC;
}

body {
  border:2px solid black;
}

.d-flex {
  display: flex;
}
#h1{
  align:center;
}

</style>
<head>
<body>
<div class="container">
  <div class="toppane">
<img src="https://tse1.mm.bing.net/th?id=OIP.-NlF9-lDk4zCh-JTA4JaiAHaHa&pid=Api&P=0" class="il"></img>
    <?php
   echo "<h2 align='center' id='h1'>WELCOME TO FACEBOOK   </h2>".$_SESSION['username'];
   echo $_SESSION['username'];
    ?>
  </div>
  <div class="d-flex">
    <div class="leftpane">
    <div class="sidebar">
        <header style="font-weight:bold">MENU</header>
        <ul type="square">
            <li><a href="main.php" target='receiver'>HOME</a></li>
            <li><a href="face.php" target='receiver'>UPLOAD</a></li>
            <li><a href="myphotos.php" target='receiver'>MY PHOTOS</a></li>
            <li><a href="watchother.php" target='receiver'>ALL POSTS</a></li>
         </ul>  
</div>
    </div>
    <div class="middlepane">
    <iframe name="receiver" id="receiver" src="main.php" target="_self"></iframe>
    <p>FACEBOOK CONNECTS YOU TO THE WORLD</p>
    </div>
    <div class="rightpane">
        <ol>
            <li><a href="logout.php">LOGOUT</a></li>
    </ol>
    </div>
  </div>
</div>
</body>
</html>
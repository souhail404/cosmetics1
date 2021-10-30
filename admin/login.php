<?php include('..\config\constants.php') ?>
<html>
   <head>
       <title>login</title>
       <link rel="stylesheet" href="../css/admin.css">
   </head>
   <body>
       <div class="login-page">
           

           
           <h1>login</h1>
           
            <form class="loging-form" action="" method="POST">
            <?php 
            if(isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login'])) {
                echo $_SESSION['no-login'];
                unset($_SESSION['no-login']);
            }
            ?> 
               <label for="username">Username</label>
               <input type="text" name="username" id="username">
               <label for="password">Password</label>
               <input type="password" name="password" id="password">
               <input type="submit" value="Login" name="submit" id="submit">
            </form>
           <p>created by <a href="souhal404.github.io/github/souhail4">souhail</a> </p>
       </div>
   </body>
</html>
<?php
  if(isset($_POST['submit']))
  {
    $username= $_POST['username'];
    $password= md5($_POST['password']);
     
    $sql= "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'";
    $res=mysqli_query($conn, $sql);
    $count=mysqli_num_rows($res);
    if($count==1)
    {
        $_SESSION['login']="<div class='scc-message'>login seccessfully</div>";
        $_SESSION['login-check']=$username;
        header("location:".SITEURL.'admin/');
    }
    else{
        $_SESSION['login']="<div class='fail-message'>login failed</div>";
        header("location:".SITEURL.'admin/login.php');
    }
  }
?>
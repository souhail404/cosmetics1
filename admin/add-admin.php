<?php include('partials/header.php')  ?>
   <!-- main start -->
   <div class="main-container">
        <h1>Add Admin</h1>
        
            <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?> 
        
        

        <form action="" method="POST">
            <table>
                <tr>
                    <td>Full Name : </td>
                    <td> <input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>Username : </td>
                    <td> <input type="text" name="username" placeholder="Enter your username"></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td> <input type="password"  name="password" placeholder="Enter your password"></td>
                </tr>

                <tr> 
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="add">
                        <a href="manager-admin.php" class="cancel">Cancel</a>
                    </td>
                </tr>
            </table>
        </form>
        
   </div>
   <!-- main end -->

   <?php
   
     if(isset($_POST['submit']))
     {
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        
        $sql="INSERT INTO tb_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
        ";

        

        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        if($res ==true){
            $_SESSION['add']="<div class='scc-message'>Admin added seccessfully</div>";
            header("location:".SITEURL.'admin/manager-admin.php');
        }
        else{
            $_SESSION['add']="<div class='fail-message'>Failed to add admin</div>";
            header("location:".SITEURL.'admin/add-admin.php');
        }
     }
   ?>
<?php include('partials/footer.php')  ?>
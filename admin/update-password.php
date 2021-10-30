<?php include('partials/header.php')  ?>
   <!-- main start -->
   <div class="main-container">
        <h1>Change Password</h1>
        <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?> 
            <?php 
            
            $id = isset($_GET['id']) ? $_GET['id'] : '';
                
            
            ?> 
        
        <form action="" method="POST">
        
            <table>
                <tr>
                    <td>Actual password : </td>
                    <td> <input type="password" name="old_password" placeholder="enter actual password" ></td>
                </tr>
                <tr>
                    <td>New password : </td>
                    <td> <input type="password" name="new_password" placeholder="enter the new password"  ></td>
                </tr>
                <tr>
                    <td>Confirm password : </td>
                    <td> <input type="password" name="confirm_password" placeholder="confirm the new password"  ></td>
                </tr>
                

                <tr> 
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>" class="add">
                        <input type="submit" name="submit" value="Change Password" class="add">
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
   $id=$_POST['id'];
   $opassword=md5($_POST['old_password']);
   $npassword=md5($_POST['new_password']);
   $cpassword=md5($_POST['confirm_password']);

   $sql="SELECT * FROM tb_admin WHERE id=$id";
   $res=mysqli_query($conn ,$sql);
            
           
   
   $sql2="UPDATE tb_admin SET 
   password='$npassword'
   WHERE id=$id
   "; 
   if($res==true){
                $count=mysqli_num_rows($res);
                
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);
                    $password =$row['password'];
                    if ($opassword==$password ){
                    if($npassword==$cpassword){
                        $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());
                        if($res2 ==true){
                            $_SESSION['add']="<div class='scc-message'>Password updated seccessfully</div>";
                            header("location:".SITEURL.'admin/manager-admin.php');
                        }
                        else{
                            $_SESSION['add']="<div class='fail-message'>Failed to update Password</div>";
                            header("location:".SITEURL.'admin/manager-admin.php');
                        }
                    }else{
                        $_SESSION['add']="<div class='fail-message'>password is not matching</div>";
                        header("location:".SITEURL.'admin/manager-admin.php');
                    }
                    }
                    else{
                        $_SESSION['add']="<div class='fail-message'>Your Current password is wrong</div>";
                        header("location:".SITEURL.'admin/manager-admin.php');
                    }
                }else
                {
                    header('location:'.SITEURL.'admin/manager-admin.php');
                }
            }
                
}
   
   

   
?>
<?php include('partials/footer.php')  ?>
<?php include('partials/header.php')  ?>
   <!-- main start -->
   <div class="main-container">
        <h1>Update Admin</h1>
        
            <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?> 
            <?php 
            $id=$_GET['id'];
            $sql="SELECT * FROM tb_admin WHERE id=$id";
            $res=mysqli_query($conn ,$sql);
            
            if($res==true){
                $count=mysqli_num_rows($res);
                
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);
                    $full_name =$row['full_name'];
                    $username =$row['username'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manager-admin.php');
                }
            }
            ?> 
        
        

        <form action="" method="POST">
            <table>
                <tr>
                    <td>Full Name : </td>
                    <td> <input type="text" name="full_name" value="<?php echo $full_name ?>" ></td>
                </tr>
                <tr>
                    <td>Username : </td>
                    <td> <input type="text" name="username" value="<?php echo $username ?>"  ></td>
                </tr>
                

                <tr> 
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>" class="add">
                        <input type="submit" name="submit" value="Update Admin" class="add">
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
      $full_name=$_POST['full_name'];
      $username=$_POST['username'];
      
      
      $sql="UPDATE tb_admin SET 
      full_name='$full_name',
      username='$username'
      WHERE id=$id
      ";

      

      $res = mysqli_query($conn, $sql) or die(mysqli_error());
      if($res ==true){
          $_SESSION['add']="<div class='scc-message'>Admin updated seccessfully</div>";
          header("location:".SITEURL.'admin/manager-orders.php');
      }
      else{
          $_SESSION['add']="<div class='fail-message'>Failed to update admin</div>";
          header("location:".SITEURL.'admin/manager-orders.php');
      }
   }
 ?>
  
<?php include('partials/footer.php')  ?>
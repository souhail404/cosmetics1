<?php include('partials/header.php')  ?>

     <!-- main section start -->
        <div class="main-container">
            <h1>Manager Admin</h1>
            <a href="add-admin.php" class="add" >Add Admin</a>
            
               <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            ?>  
            
            

            <table class="table-admin">
            <tr>
                <th>N.S</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Action</th>
            </tr>

            <?php
               $sql="SELECT * FROM tb_admin";
               $res= mysqli_query($conn ,$sql);
               if($res==true){
                  $rows=mysqli_num_rows($res);
                  if($rows>0)
                  {   $i=1;
                      while($rows=mysqli_fetch_assoc($res))
                      {
                          $id=$rows['id'];
                          $full_name=$rows['full_name'];
                          $username=$rows['username'];

                          ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td class="spcl-td-admin ">
                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="upd" >UPDATE</a>
                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="upd2" >CHANGE PASSWORD</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="del" >DELETE</a>
                            </td>
                          </tr>
                          <?php
                      }

                  }
                  
               }
            ?>
            
            </table> 


        </div>
     <!-- main section end -->
     <?php include('partials/footer.php')  ?>
</body>
</html>
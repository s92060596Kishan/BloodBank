<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOGIN | BBMS</title>
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
    <div id="bg"></div>
       
            <form action="<?php $_SERVER['PHP_SELF']; ?>"  method="post">
            <div class="form-field">
                <input type="text" placeholder="Username" name="username" value="" required/>
            </div>
            
            <div class="form-field">
                <input type="password" placeholder="Password" name="password" value="" required/>                        
            </div>
            
            <input class="btn" type="submit"
            name="login" value="login">
            </form>
                <?php
                    if(isset($_POST['login'])){
                      include "connection.php"; // db configuration
                      $username = mysqli_real_escape_string($conn, $_POST['username']);
                      $password  = mysqli_real_escape_string($conn,($_POST['password']));

                      $sql = "SELECT * FROM admin where username = '{$username}' AND password = '{$password}'";
                      $result = mysqli_query($conn, $sql);

                      if(mysqli_num_rows($result) > 0){
                        session_start(); //session start
                        while($row = mysqli_fetch_assoc($result)){
                          $_SESSION["username"] = $row['username'];
                          $_SESSION["user_id"] = $row['id'];
                        }
                        header("location: adminpage.php"); // redirect
                      }else{
                          echo "<div class='alert alert-danger'>Username and Password are not matched.</div>";
                      }
                    } ?>
  </body>
</html>

<?php
   include("config.php");
   session_start();
   $error ="";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT id FROM users WHERE user = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         //$_SESSION['myusername']="something";
         $_SESSION['login_user'] = $myusername;

         header("location: welcome.php");
      }else {
         $error = "Podałeś zły login lub hasło. Spróbuj jeszcze raz.";
      }
   }


?>
<html>

   <head>
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="style.css">

      

   </head>

   <body class = "login">

      <div>
         <div>
            <div class = "loginSign"><b>Login</b></div>

            <div class = "userBox">

               <form action = "" method = "post">
                  <label class = "classNameText">UserName  :</label>
                  <input type = "text" name = "username" class = "box1"/><br /><br />
                  <label class ="classNameText">Password  :</label>
                  <input type = "password" name = "password" class = "box2" /><br/><br />
                  <input type = "submit" value = " Submit " class = "submit"/><br />
               </form>

               <div class = "invalid"><?php echo $error; ?></div>

            </div>

         </div>

      </div>

   </body>
</html>

<?php
include('session.php');


$error ="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form

   $title = mysqli_real_escape_string($db,$_POST['title']);
   $desc = mysqli_real_escape_string($db,$_POST['description']);
   $user = mysqli_real_escape_string($db,$_POST['autor']);
    //echo $title;
   // echo $desc;

/*
    foreach ($_POST as $key => $value) {
      echo $key .'=>'. $value.'</br>';
    }
    */
   $sql = "SELECT id FROM users WHERE user = '$login_session'";
   //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $result = mysqli_query($db,$sql);
   //echo $row;
   $rows = mysqli_fetch_array($result);
   //echo "Petla <br/>";
/*
   foreach ($rows = mysqli_fetch_array($result) as $key => $value) {
     echo $key.' =>'.$value.'<br/>';
   }
   */
   /*foreach ($rows as $key => $value) {
     echo $key.' '.$value.'<br/>';
   }*/
   /*
   echo "Petla </br>";
   foreach ($username_array as $key => $value) {
     echo $key .'=>'. $value.'</br>';
   }
   */
   //$username_string = implode(",", $username_array); // implode the array to "stick together" all the usernames with a comma inbetween each

  // echo "Numer autora:";
  // echo $username_array[0]; // output the string to the display

   $idUsers = gettype($rows['id']);
   $numerid = intval($rows['id']);

   // echo "numer: ";

  // echo $numerid.'<br/>';
   var_dump($numerid);
   $sql = "INSERT INTO `zadania` (`tytul`, `opis`, `user`) VALUES ('$title', '$desc', '$numerid')";
   //$sql = "INSERT INTO 'zadania' (tytul,opis,user)VALUES('$title','$desc','$username_array[0]')";
   $result = mysqli_query($db,$sql);
   var_dump(mysqli_error($db));
 }
   /*
   $sql = "SELECT id FROM users WHERE user = '$myusername' and pass = '$mypassword'";


                */
 ?>
 <html>

    <head>
       
       <link rel="stylesheet" type="text/css" href="style.css">

    </head>

    <body class ="body">
    <h1 class = "container">Dodawanie zadań</h1>
    <h2 ><a class ="anotherText" href = "welcome.php">Powrot do poprzedniej strony</a></h2>

       <div class ="dodawanie">
         <form action = "" method = "post">
            <label>Tytuł  :</label><input type = "text" name = "title" class = "box3"/><br /><br />
            <label>Opis :</label><textarea type ="text "name = "description" class = "box4" /></textarea><br/><br />
            <label>Autor :</label><input type = "text" name = "autor" class = "box3" value="<?php echo $login_session;?>" /><br/><br />
            <input type = "submit" value = " Dodaj " class = "btn-link2"/><br />
         </form>
       </body>
</html>

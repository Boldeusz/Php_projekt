<?php
include('session.php');
echo "Dodaj zadanie </br>";

$error ="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form

   $title = mysqli_real_escape_string($db,$_POST['title']);
   $desc = mysqli_real_escape_string($db,$_POST['description']);
   $user = mysqli_real_escape_string($db,$_POST['autor']);
    echo $title;
    echo $desc;

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
   echo "Petla <br/>";
/*
   foreach ($rows = mysqli_fetch_array($result) as $key => $value) {
     echo $key.' =>'.$value.'<br/>';
   }
   */
   foreach ($rows as $key => $value) {
     echo $key.' =>'.$value.'<br/>';
   }
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

   echo "numer: ";

   echo $numerid.'<br/>';
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
       <title>Dodawanie Zadań</title>

    </head>

    <body bgcolor = "#FFFFFF">

       <div align = "center">
         <form action = "" method = "post">
            <label>Tytuł  :</label><input type = "text" name = "title" class = "box"/><br /><br />
            <label>Opis :</label><textarea rows="4" cols="50" name = "description" class = "box" /></textarea><br/><br />
            <label>Autor :</label><input type = "text" name = "autor" class = "box" value="<?php echo $login_session;?>" /><br/><br />
            <input type = "submit" value = " Submit "/><br />
         </form>
       </body>
</html>

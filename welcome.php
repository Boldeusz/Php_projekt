<?php
   include('session.php');



 //var_dump(mysqli_error($link));
   $sql = "SELECT * FROM `users` "; // select only the username field from the table "users_table"
   $result = mysqli_query($db,$sql);
   $username_array = array(); // start an array
   $ilosc = mysqli_num_rows($result);
   //echo $ilosc;
  // $row = mysqli_fetch_array($result);
   //echo $row[0];

while($row = mysqli_fetch_array($result)){ // cycle through each record returned
  $username_array[] = "\"".$row['user']."\""; // get the username field and add to the array above with surrounding quotes
}

$username_string = implode(",", $username_array); // implode the array to "stick together" all the usernames with a comma inbetween each

//echo $username_string; // output the string to the display
$keyUser = array_keys($username_array,"\"".$login_session."\"");
$keyUserRight = $keyUser[0] + 1;
$sql2 = "SELECT * FROM `zadania` ";
$result2 = mysqli_query($db,$sql2);

//$row2 = mysqli_fetch_array($result2);
//$row2 = mysqli_fetch_assoc($result2);

?>

<html>

   <head>
      
      <link rel="stylesheet" type="text/css" href="style.css">
   </head>

   <body class ="body">
      <h1 class = "container">Welcome <?php echo $login_session; ?> user</h1>
      <h2 ><a class ="anotherText" href = "dodajzadanie.php">Dodawanie zadań</a></h2>
      <h2><a class ="anotherText" href = "logout.php">Wyloguj</a></h2>
      <?php
      while($row3 = mysqli_fetch_assoc($result2)){
         if ($keyUser[0] == 0) {
         echo '<div class = "column">' .'User: ' . $username_array[$row3["user"]-1]. '<br/>';
         echo 'Rodzaj zadania: '. $row3["tytul"] .' ';
         echo '<br/>';
         echo 'Opis zadania: ' .$row3["opis"];
         echo '<br/>';
         
         
         echo '<form action="modify.php" method="post" class = "wiersz"><button type="submit" name="edytuj" value='.$row3["id"].' class="btn-link">Modyfikuj</button></form>';
         
         echo '<form action="delete.php" method="post" class = "wiersz"><button type="submit" name="usun" value='.$row3["id"].' class="btn-link">Usuń</button></form>';
         echo '<br/></div>';
         }
         elseif($keyUserRight == $row3["user"]){
            echo '<div class = "column">' . 'Rodzaj zadania: ' .$row3["tytul"] .' ';
            echo '<br/>';
            echo 'Opis zadania: ' .$row3["opis"];
            echo '<br/>';
            echo '<form action="modify.php" method="post" class = "wiersz"><button type="submit" name="edytuj" value='.$row3["id"].' class="btn-link">Modyfikuj</button></form>';
            echo '<form action="delete.php" method="post" class = "wiersz"><button type="submit" name="usun" value='.$row3["id"].' class="btn-link">Usuń</button></form>';
            echo '<br/></div>';
         }
      }


      ?>
      
      
   </body>

</html>

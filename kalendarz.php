<!DOCTYPE html>
<html lang="PL">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Mój kalendarz</title>
 <link rel="stylesheet" href="styl5.css">
</head>
<body>

   <header>
      <section>
        <img src="logo1.png" alt="Mój kalendarz">
      </section>

      <section>
       <h1>Kalendarz</h1> 
       <br>
       <?php
       $conn = mysqli_connect('localhost', 'root', '', 'egzamin5');
       $q1 = mysqli_query($conn, "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-07-01'");

       while($row = mysqli_fetch_assoc($q1)){
          echo "<h3>miesiąc: $row[miesiac], rok: $row[rok]</h3>";
       }
       ?>
      </section>
   </header>

   <main>
    
     <section class="main">
      <?php

    $q2 = mysqli_query($conn, "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'lipiec'");

     while($row2 = mysqli_fetch_assoc($q2)){
         echo "<section class='dni'>
         <h5>$row2[dataZadania]</h5>
         <p>$row2[wpis]</p>
         </section>";
      }
    ?>   
     </section>
   </main>

   <footer>
      <form action="kalendarz.php"method="POST">

        <label for="wpis">Dodaj wpis:</label>
        <input type="text" name="wpis" id="wpis">

        <button type="submit">DODAJ</button>
        
      </form>
      <?php
      @$wpis = $_POST['wpis'];
      if(isset($wpis)){
          mysqli_query($conn,"UPDATE `zadania` SET wpis = '$wpis' WHERE dataZadania = '2020-07-13'");
      }
      
       mysqli_close($conn);
      ?>
     
      <br>
      <p>Strone wykonal: PESEL</p>
   </footer>
</body>
</html>
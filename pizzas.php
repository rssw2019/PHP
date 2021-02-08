<html>
   <head>
      <title>Selecting Table in MySQLi Server</title>
   </head>

   <body>
      <?php
         $dbhost = 'localhost';
         $dbuser = 'raj';
         $dbpass = 'raj1234';
         $dbname = 'ninja_pizza';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
         if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
         }
         echo 'Connected successfully<br>';
         $sql = 'SELECT email FROM pizzas';
         $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               echo "Email: " . $row["email"]. "<br>";
            }
         } else {
            echo "0 results";
         }
         mysqli_close($conn);
      ?>
   </body>
</html>
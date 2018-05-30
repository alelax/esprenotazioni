<?php

   $guest_id = $_POST['id_inserted'];
   $reservation_id = $_POST['subject'];
   echo $guest_id;
   echo $reservation_id;

   $server = "localhost";
   $user = "root";
   $password = "13ottobre";
   $db_name = "hotel_booleana";

   $db_connection = new mysqli($server, $user, $password, $db_name);

   if ($db_connection->connect_error) {
      echo "Connection failed " . $db_connection->connect_error;
   } else {
      $reservation_query = "  INSERT INTO prenotazioni_has_ospiti(prenotazione_id, ospite_id, created_at, updated_at)
                              VALUES ($reservation_id , $guest_id ,NOW(),NOW())";

      $result = $db_connection->query($reservation_query);

   }
?>

<?php

   $guest_id = $_POST['id_inserted'];
   $reservation_id = $_POST['subject'];
   // echo $guest_id;
   // echo $reservation_id;

   $server = "localhost";
   $user = "root";
   $password = "13ottobre";
   $db_name = "hotel_booleana";

   $db_connection = new mysqli($server, $user, $password, $db_name);

   if ($db_connection->connect_error) {
      echo "Connection failed " . $db_connection->connect_error;
   } else {
      $check_ospiteId_query = "  SELECT *
                                 FROM ospiti
                                 WHERE id = $guest_id";

      $result_check_query = $db_connection->query($check_ospiteId_query);

      $check_ospiteInBooking_query =   "SELECT *
                                       FROM `prenotazioni_has_ospiti`
                                       WHERE id = $reservation_id
                                       AND ospite_id = $guest_id";

      $result_check_query2 = $db_connection->query($check_ospiteInBooking_query);

      if ($result_check_query->num_rows == 0 ) {
         echo "L'Id inserito non è presente nel database";
         die();

      } elseif ($result_check_query2->num_rows > 0) {
         echo "L'Id inserito fa già parte di questa prenotazione";
         die();
      }
      else {
         $reservation_query = "  INSERT INTO prenotazioni_has_ospiti(prenotazione_id, ospite_id, created_at, updated_at)
         VALUES ($reservation_id , $guest_id ,NOW(),NOW())";

         $result = $db_connection->query($reservation_query);

         echo "L'ospite con id $guest_id è stato inserito correttamente nella prenotazione  $reservation_id";
      }

   }
?>

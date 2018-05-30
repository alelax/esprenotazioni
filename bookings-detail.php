<?php

   $reservation_id = $_POST['subject'];

   $server = "localhost";
   $user = "root";
   $password = "13ottobre";
   $db_name = "hotel_booleana";

   $db_connection = new mysqli($server, $user, $password, $db_name);

   if ($db_connection->connect_error) {
      echo "Connection failed " . $db_connection->connect_error;
   } else {
      $reservation_query = "  SELECT prenotazioni_has_ospiti.prenotazione_id, prenotazioni_has_ospiti.created_at, ospiti.name, ospiti.lastname
                              FROM prenotazioni_has_ospiti
                              INNER JOIN ospiti
                              ON prenotazioni_has_ospiti.ospite_id = ospiti.id
                              WHERE prenotazioni_has_ospiti.prenotazione_id = $reservation_id";

      $result = $db_connection->query($reservation_query);
      //var_dump($result);

      if ( $result->num_rows > 0 ) {
         while ( $record = $result->fetch_assoc() ) {
            echo $record['prenotazione_id']; . "<br>"
            echo $record['created_at'];
            echo $record['name'];
            echo $record['lastname'];
            echo $record['room_number'];

         }
      }
   }

?>

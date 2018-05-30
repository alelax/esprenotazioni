<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="style.css">
      <title>Hotel Reservations</title>
   </head>
   <body>
      <h1>Prenotazioni 2018</h1>


      <div class="bookings_cnt">

            <div class="headers_cnt">
               <div class="inner_cnt_title">
                  Reservations ID
               </div>
               <div class="inner_cnt_title">
                  Rooms Numbers
               </div>
               <div class="inner_cnt_title">
                  Bookings date
               </div>
            </div>

         <?php
            $server = "localhost";
            $user = "root";
            $password = "13ottobre";
            $db_name = "hotel_booleana";

            $db_connection = new mysqli($server, $user, $password, $db_name);

            if ($db_connection->connect_error) {
               echo "Connection failed " . $db_connection->connect_error;
            } else {
               $reservation_query = "  SELECT prenotazioni.*, stanze.room_number
                                       FROM `prenotazioni`
                                       INNER JOIN `stanze`
                                       ON prenotazioni.stanza_id = stanze.id
                                       ORDER BY(`created_at`) DESC";

               $result = $db_connection->query($reservation_query);
               //var_dump($result);

               if ( $result->num_rows > 0 ) {
                  while ( $record = $result->fetch_assoc() ) { ?>

                     <div class="reservation_cnt">
                        <div class="db_data spaced-items">
                           <span class="reserv-id"><?php echo $record['id'] ?></span>
                           <form action="bookings-detail.php" method="post">
                              <button class="details-btn" name="subject" type="submit" value="<?php echo $record['id']; ?>">Show details</button>
                           </form>
                        </div>
                        <div class="db_data txt-center">
                           <?php echo $record['room_number']; ?>
                        </div>
                        <div class="db_data txt-center">
                           <?php echo $record['created_at']; ?>
                        </div>

                     </div>
            <?php }
               }
            }
            ?>

      </div>

   </body>
</html>

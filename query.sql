SELECT prenotazioni.*, stanze.room_number
FROM `prenotazioni`
INNER JOIN `stanze`
ON prenotazioni.stanza_id = stanze.id
ORDER BY(`created_at`) DESC


SELECT prenotazioni_has_ospiti.prenotazione_id, prenotazioni_has_ospiti.created_at, ospiti.name, ospiti.lastname, stanze.room_number
FROM prenotazioni_has_ospiti
INNER JOIN ospiti
ON prenotazioni_has_ospiti.ospite_id = ospiti.id
INNER JOIN stanze
ON prenotazioni_has_ospiti.prenotazione_id = stanze.id

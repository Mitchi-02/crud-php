<?php

require_once('Reservation.php');

class ReservationFileStorage
{
    const FILE_PATH = __DIR__ . '/../data/data.txt';

    static public function readAll(): array
    {
        $reservations = [];

        $fileContent = file_get_contents(self::FILE_PATH);

        $lines = explode("\n", $fileContent);

        foreach ($lines as $line) {

            $fields = explode(",", $line);

            if (isset($fields[0]) && isset($fields[1]) && isset($fields[2]) && isset($fields[3])) {
                $reservation = new Reservation((int)$fields[0], $fields[1], (int)$fields[2], (int)$fields[3]);
                $reservations[] = $reservation;
            }
        }

        return $reservations;
    }

    static public function readOne(int $id): ?Reservation
    {
        $reservations = self::readAll();

        foreach ($reservations as $reservation) {
            if ($reservation->id == $id) {
                return $reservation;
            }
        }
        return null;
    }

    //auto-increment id
    static public function getNextId(): int
    {
        $reservations = self::readAll();

        $maxId = 0;
        foreach ($reservations as $reservation) {
            if ($reservation->id > $maxId) {
                $maxId = $reservation->id;
            }
        }

        return $maxId + 1;
    }

    static public function save(Reservation $reservation): void
    {
        // Append reservation data to file
        $file = fopen(self::FILE_PATH, 'a');
        fwrite($file, $reservation . "\n");
        fclose($file);
    }

    static public function update(Reservation $reservationToUpdate): void
    {
        // Load all reservations
        $reservations = self::readAll();

        // Find and update the reservation
        $res = array_map(function ($reservation) use ($reservationToUpdate) {
            if ($reservation->id == $reservationToUpdate->id) {
                return $reservationToUpdate;
            }
            return $reservation;
        }, $reservations);

        // Save updated reservations back to file
        $file = fopen(self::FILE_PATH, 'w');
        foreach ($res as $reservation) {
            fwrite($file, $reservation . "\n");
        }
        fclose($file);
    }

    static public function delete(string $reservationToDelete): void
    {
        var_dump($reservationToDelete);
        // Load all reservations
        $reservations = self::readAll();

        // Find and remove the reservation to delete
        $filteredReservations = array_filter($reservations, function ($reservation) use ($reservationToDelete) {
            return $reservation->id != $reservationToDelete;
        });
        $reservations = array_values($filteredReservations);

        // Save updated reservations back to file
        $file = fopen(self::FILE_PATH, 'w');
        foreach ($reservations as $reservation) {
            fwrite($file, $reservation . "\n");
        }
        fclose($file);
    }
}

<?php

require_once('./utils/ReservationFileStorage.php');
require_once('./utils/Reservation.php');

if (isset($_POST['client_name']) && isset($_POST['room_size']) && isset($_POST['duration'])) {
	$client_name = $_POST['client_name'];
	$room_size = $_POST['room_size'];
	$duration = $_POST['duration'];

	$reservation = new Reservation(ReservationFileStorage::getNextId(), $client_name, $room_size, $duration);
	ReservationFileStorage::save($reservation);
}

header('Location: index.php?page=produits');

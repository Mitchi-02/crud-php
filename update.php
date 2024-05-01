<?php

require_once('./utils/ReservationFileStorage.php');
require_once('./utils/Reservation.php');

if (isset($_GET['id']) && isset($_POST['client_name']) && isset($_POST['room_size']) && isset($_POST['duration'])) {
	$client_name = $_POST['client_name'];
	$room_size = $_POST['room_size'];
	$duration = $_POST['duration'];

	ReservationFileStorage::update(new Reservation($_GET['id'], $client_name, $room_size, $duration));
}

header('Location: index.php?page=produits');

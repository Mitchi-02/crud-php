<?php

require_once('./utils/ReservationFileStorage.php');

if (isset($_GET['id'])) {
    ReservationFileStorage::delete($_GET['id']);
}

header("Location: index.php?page=produits");
exit();

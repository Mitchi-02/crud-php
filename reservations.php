<?php
require_once('./utils/ReservationFileStorage.php');

// Retrieve reservations data from your file storage
$reservations = ReservationFileStorage::readAll();
?>

<section class="py-10">
    <div class="flex flex-col md:flex-row justify-between gap-8 items-center pb-10">
        <h1 class="text-primary-blue text-center text-5xl font-bold ">Liste des réservations</h1>
        <div>
            <input type="text" id="filter" placeholder="filtre par taille de chambre" class="bg-main_bg border border-primary-black rounded-lg py-3 px-3 block w-full" />
        </div>
    </div>

    <!-- Reservation Cards -->
    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="list">
        <?php
        foreach ($reservations as $reservation) {
        ?>
            <li class="bg-white rounded-lg shadow-md p-4" id="<?php echo $reservation->id; ?>">
                <p class="text-2xl font-semibold">#ID: <?php echo $reservation->id; ?></p>
                <p class="text-xl font-semibold"><?php echo $reservation->client_name; ?></p>
                <p class="text-gray-700">Taille de la chambre: <span class="taille"><?php echo $reservation->room_size; ?></span> personne(s)</p>
                <p class="text-gray-700">Durée du séjour: <?php echo $reservation->duration; ?> jour(s)</p>
                <!-- Action Buttons -->
                <div class="mt-4">
                    <a href="index.php?page=modifprod&id=<?php echo $reservation->id; ?>" class="text-primary-blue pr-2">Modifier</a>
                    <a href="delete.php?id=<?php echo $reservation->id; ?>" class="text-error">Supprimer</a>
                </div>
            </li>
        <?php
        }
        ?>
    </ul>
</section>

<script>
    //empty filter
    document.getElementById('filter').value = '';
    //filter by room size
    document.getElementById('filter').addEventListener('input', function() {
        let filter = this.value;
        let list = document.getElementById('list');
        let items = list.getElementsByTagName('li');
        for (let i = 0; i < items.length; i++) {
            let item = items[i];
            let taille = item.getElementsByClassName('taille')[0].innerText;
            if (filter === '') {
                item.style.display = 'block';
            } else if (taille === filter) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        }
    });
</script>
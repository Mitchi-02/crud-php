<?php
require_once('./utils/ReservationFileStorage.php');

$id;
$client_name = '';
$room_size = '';
$duration = '';
if (isset($_GET['id'])) {
    $reservation = ReservationFileStorage::readOne($_GET['id']);
    if ($reservation) {
        $id = $_GET['id'];
        $client_name = $reservation->client_name;
        $room_size = $reservation->room_size;
        $duration = $reservation->duration;
    }
}
?>
<section class="py-10">
    <h1 class="text-primary-blue text-5xl font-bold pb-10">
        <?php echo isset($id) ? 'Modifier la réservation' : 'Ajouter une réservation'; ?>
    </h1>

    <form id="form" method="POST" action="<?php echo isset($id) ? 'update.php?id=' . $id : 'create.php'; ?>" class="grid sm:grid-cols-2 gap-4">
        <?php
        if (isset($id)) {
        ?>
            <div>
                <label for="id">ID</label>
                <input type="text" id="id" name="id" value="<?php echo $id; ?>" class="bg-main_bg rounded-lg py-3 px-3 block w-full" disabled="true" />
            </div>
        <?php
        }
        ?>
        <div>
            <label for="client_name">Nom du client</label>
            <input type="text" id="client_name" name="client_name" value="<?php echo $client_name; ?>" class="bg-main_bg border border-primary-black rounded-lg py-3 px-3 block w-full" />
            <p id="client_name_error" class="text-error text-sm pt-1">
            <p>
        </div>
        <div>
            <label for="room_size">Taille de la chambre</label>
            <input type="number" id="room_size" name="room_size" value="<?php echo $room_size; ?>" class="bg-main_bg border border-primary-black rounded-lg py-3 px-3 block w-full" />
            <p id="room_size_error" class="text-error text-sm pt-1">
            <p>
        </div>
        <div>
            <label for="duration">Durée du séjour</label>
            <input type="number" id="duration" name="duration" value="<?php echo $duration; ?>" class="bg-main_bg border border-primary-black rounded-lg py-3 px-3 block w-full" />
            <p id="duration_error" class="text-error text-sm pt-1">
            <p>
        </div>
        <button type="submit" class="px-4 py-3 block mt-10 sm:col-span-2 bg-primary-blue text-white rounded-lg" href="index.php?page=produits">
            <?php echo isset($id) ? 'Modifier' : 'Ajouter'; ?>
        </button>
    </form>
</section>

<script>
    document.getElementById('form').addEventListener('submit', function(event) {
        let client_name = document.getElementById('client_name').value;
        let room_size = document.getElementById('room_size').value;
        let duration = document.getElementById('duration').value;
        let client_name_error = document.getElementById('client_name_error');
        let room_size_error = document.getElementById('room_size_error');
        let duration_error = document.getElementById('duration_error');
        let hasError = false;

        if (client_name === '') {
            client_name_error.innerText = 'Le nom du client est obligatoire';
            hasError = true;
        } else {
            client_name_error.innerText = '';
        }

        if (room_size === '') {
            room_size_error.innerText = 'La taille de la chambre est obligatoire';
            hasError = true;
        } else if (parseInt(room_size) < 1 || parseInt(room_size) > 4) {
            room_size_error.innerText = 'La taille de la chambre doit être comprise entre 1 et 4';
            hasError = true;
        } else {
            room_size_error.innerText = '';
        }

        if (duration === '') {
            duration_error.innerText = 'La durée du séjour est obligatoire';
            hasError = true;
        } else if (parseInt(duration) < 1 || parseInt(duration) > 15) {
            duration_error.innerText = 'La taille de la chambre doit être comprise entre 1 et 15 jours';
            hasError = true;
        } else {
            duration_error.innerText = '';
        }

        if (hasError) {
            event.preventDefault();
        }
    });
</script>
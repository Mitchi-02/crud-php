<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation System</title> 
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body class="bg-white flex min-h-screen text-primary-black text-base">
    <aside class="bg-main_bg shrink-0 py-8 px-6 fixed -translate-x-full h-full lg:h-auto lg:static lg:translate-x-0 transition-transform duraiton-500">
        <nav class="flex-1">
            <div class="flex items-center justify-between pb-6">
                <h4 class="text-2xl font-bold">Menu</h4>
                <span class="lg:hidden text-error" role="button" id="close">Close</span>
            </div>
            <ul class="grid gap-4">
                <li class="px-4"><a href="index.php?page=init" class="block">Acceuil</a></li>
                <li class="px-4"><a href="index.php?page=produits" class="block">Voir les reservations</a></li>
                <li class="px-4"><a href="index.php?page=modifprod" class="block">Ajouter une reservation</a></li>
            </ul>
        </nav>
    </aside>
    <div class="grow flex flex-col">
        <header class="bg-main_bg py-5 shrink-0">
            <div class="flex items-center gap-8 page-container">
                <button class="lg:hidden" id="menu">
                    <img src="./assets/menu.svg" alt="logo" width="30" height="30" />
                </button>
                <div class="flex items-center gap-4">
                    <img src="./assets/logo.svg" alt="logo" width="30" height="30" />
                    <span class="text-xl font-bold">BookX</span>
                </div>
            </div>


        </header>
        <main class="page-container grow">
            <?php
            if (isset($_GET['page'])) {
                switch ($_GET['page']) {
                    case 'produits':
                        $page = 'reservations.php';
                        break;
                    case 'modifprod':
                        $page = 'modifresa.php';
                        break;
                    default:
                        $page = 'init.php';
                }
            } else {
                $page = 'init.php';
            }

            include($page);
            ?>
        </main>

        <footer class="bg-main_bg py-5 shrink-0">
            <div class="page-container">
                <nav class="grid sm:grid-cols-2 gap-10 pb-14">
                    <section>
                        <div class="flex items-center gap-4">
                            <img src="./assets/logo.svg" alt="logo" width="30" height="30" />
                            <span class="text-xl font-bold">BookX</span>
                        </div>
                        <p class="pt-5 text-base text-primary-gray">
                            Ce site est un travail TP réalisé par Ilyas BENHAMMADI. Il est destiné à la gestion des réservations d'un hôtel.
                        </p>
                    </section>
                    <section>
                        <h4 class="text-2xl font-medium">Menu</h4>
                        <ul class="mt-4 grid gap-3">
                            <li class="px-4"><a href="index.php?page=init" class="block">Acceuil</a></li>
                            <li class="px-4"><a href="index.php?page=produits" class="block">Voir les reservations</a></li>
                            <li class="px-4"><a href="index.php?page=modifprod" class="block">Ajouter une reservation</a></li>
                        </ul>
                    </section>
                </nav>
                <p class="text-center text-primary-gray">@ Copyright 2024 Ilyas BENHAMMADI. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
    <script>
        document.getElementById('menu').addEventListener('click', function() {
            document.querySelector('aside').classList.toggle('-translate-x-full');
        });
        document.getElementById('close').addEventListener('click', function() {
            document.querySelector('aside').classList.toggle('-translate-x-full');
        });
    </script>

</body>


</html>

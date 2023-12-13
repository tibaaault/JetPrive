<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir la finition</title>
</head>

<body>
    <div class="col-xl-12 col-sm" style="background-color :#DDDDDD;">
        <div class="d-flex" style="height:50px;"></div>
        <p class="h1 text-center text-dark">Sélection de la finition</p>
        <div class="d-flex" style="height:50px;"></div>
    </div>
    <?php
    $jet = $_SESSION['jet'];
    $color = $_SESSION['color'];
    foreach ($jet as $oneJet) {
        $jetPrice = $oneJet['prix'];
        $_SESSION['jetPrice'] = $jetPrice;
        $oneJet['price'] = number_format($oneJet['prix'], 0, ',', ' ');
    ?>
        <?php
        foreach ($color as $col) {
            $colorPrice = $col['prix'];
            $totalPrice = $jetPrice + $colorPrice;
            $totalPrice = number_format($totalPrice, 0, ',', '.');
        ?>
            <div class="col-xl-12 col-sm col-lg col-md">
                <div class="row">
                    <div class="col col-sm">
                        <div class="hover-overlay ripple p-5" data-mdb-ripple-color="light">
                            <img src="../pictures/<?= $oneJet['nom'] ?>.png" class="card-img-top rounded " alt="<?= $oneJet['nom'] ?>" />
                        </div>
                    </div>
                    <div class="col-sm">
                        <p class="h3 text-center pt-5 pb-2">Configuration actuelle</p>
                        <hr class="p-5">
                        <p class="lead" style="font-size: 26px;"><b>Modèle : </b> <?= $oneJet['nom'] ?></p>
                        <p class="lead" style="font-size: 26px;"><b>Couleur : </b><?= $col['couleur'] ?></p>
                        <p class="lead" style="font-size: 26px;"><b>Prix : </b> <?= $totalPrice . ' €' ?></p>
                    </div>
                </div>
            </div>
        <?php
        } ?>
        <div class="col-xl-12 col-sm col-lg col-md p-5" style="background-color :#DDDDDD;">
            <div class="col-xl-7 col-sm mx-auto mb-5">
                <p class="h2 text-center text-dark">Choix de la finition</p>
                <?php
                foreach ($finishings as $finishing) {
                    $finishing['prix'] = number_format($finishing['prix'], 0, ',', ' '); ?>
                    <div class="card col my-5 shadow-lg ">
                        <div class="card-body">
                            <div class="d-xl-flex justify-content-between">
                                <span class="h4 card-title justidy-content-between"><b><?= $finishing['categorie'] ?></b></span>
                                <span class="h5"><b>Prix : <?= $finishing['prix'] . ' €' ?></b></span>
                            </div>
                            <p class="card-text">
                                <?= $finishing['description'] ?></p>
                        </div>
                        <div class="mx-auto text-center">
                            <form action="./?action=fourthForm" method="post">
                                <button type="submit" class="mb-3 btn btn-primary" name="selectionFinishing" value="<?= $finishing['id'] ?>">Choisir</button><br>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>
            <?php
        }
            ?>
            </div>
        </div>
</body>

</html>
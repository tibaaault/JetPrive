<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir les options</title>
</head>

<body>

        <div class="col-xl-12 col-sm" style="background-color:#DDDDDD ;">
            <div class="d-flex" style="height:50px;"></div>
            <p class="h3 text-center text-dark">Sélection des options</p>
            <div class="d-flex" style="height:50px;"></div>
        </div>
        <?php
        $jet = $_SESSION['jet'];
        $color = $_SESSION['color'];
        $finishing = $_SESSION['finishing'];
        foreach ($jet as $unJet) {
            $jetPrice = $unJet['prix'];
            foreach ($color as $col) {
                $colorPrice = $col['prix'];
                foreach ($finishing as $finish) {
                    $finishingPrice = $finish['prix'];
                }
                $totalPrice = $jetPrice + $colorPrice + $finishingPrice;
                $totalPrice = number_format($totalPrice, 0, ',', '.');
        ?>
                <div class="col-xl-12 col-sm col-lg col-md">
                    <div class="row">
                        <div class="col-xl-6 col-sm">
                            <div class="hover-overlay ripple p-5" data-mdb-ripple-color="light">
                                <img src="../pictures/<?= $unJet['nom'] ?>.png" class="card-img-top rounded " alt="<?= $unJet['nom'] ?>" />
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm">
                            <p class="h3 text-center pt-5 pb-2">Configuration actuelle</p>
                            <hr class="p-xl-5">
                            <p class="lead" style="font-size: 26px;"><b>Modèle : </b> <?= $unJet['nom'] ?></p>
                            <p class="lead" style="font-size: 26px;"><b>Couleur : </b><?= $col['couleur'] ?></p>
                            <p class="lead" style="font-size: 26px;"><b>Finition : </b><?= $finish['categorie'] ?></p>
                            <p class="lead" style="font-size: 26px;"><b>Prix : </b> <?= $totalPrice . ' €' ?></p>
                        </div>
                    </div>
                </div>
            <?php
            } ?>

            <div class="col-xl-12 col-sm col-lg col-md p-5" style="background-color: #DDDDDD;">
                <div class="col-xl-9 col-sm mx-auto mb-5 ">
                    <p class="h2 text-center mb-4 text-dark">Choix des options</p>
                    <form action="./?action=fifthForm" method="post">
                        <div class="row d-flex align-items-stretch">
                            <?php foreach ($options as $option) {
                                $option['prix'] = number_format($option['prix'], 0, ',', '.');
                            ?>
                                <div class="col-xl-4 col-sm mb-4 d-flex">
                                    <div class="card w-100">
                                        <div class="card-body">
                                            <div class="d-xl-flex justify-content-between">
                                                <span class="h4 card-title justidy-content-between"><b><?= $option['nom'] ?></b></span>
                                                <span class="h5"><b><?= $option['prix'] . ' €' ?></b></span>
                                            </div>
                                            <p class="card-text"><?= $option['description'] ?></p>
                                        </div>
                                        <div class="card-body text-center d-flex align-items-center">
                                            <div class="form-check form-switch form-switch-lg mx-auto">
                                                <input class="form-check-input " type="checkbox" id="option<?= $option['id'] ?>" name="selectedOptions[]" value="<?= $option['id'] ?>">
                                                <label class="form-check-label" for="option<?= $option['id'] ?>">Sélectionner</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-xl-12 col-sm mx-auto text-center">
                            <button type="submit" class="btn btn-primary btn-lg" name="submitOptions">Valider</button>
                        </div>
                    </form>
                </div>
            </div>


        <?php
        }
        ?>


</body>

</html>